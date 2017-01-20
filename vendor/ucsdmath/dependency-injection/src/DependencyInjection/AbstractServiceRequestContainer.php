<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UCSDMath\DependencyInjection;

use ReflectionClass;
use ReflectionMethod;
use ReflectionException;
use UCSDMath\Functions\ServiceFunctions;
use UCSDMath\Functions\ServiceFunctionsInterface;
use UCSDMath\Configuration\ConfigurationInterface;

/**
 * AbstractServiceRequestContainer provides an abstract base class implementation of {@link ServiceRequestContainerInterface}.
 * Primarily, this services the fundamental implementations for all DependencyInjection classes.
 *
 * This component library is used to service other services and inject the required dependencies
 * that those services require. This is a very basic Inversion of Control (IoC) container or service
 * used within the UCSDMath Framework.
 *
 * Method list:
 *
 * @method ServiceRequestContainerInterface __construct();
 * @method void __destruct();
 * @method reset();
 * @method getNamespaces();
 * @method getReflection($class);
 * @method registerNamespaces(array $namespaces);
 * @method registerNamespace($namespace, $paths);
 * @method getPHPDocParams(ReflectionMethod $reflect);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractServiceRequestContainer implements ServiceRequestContainerInterface, ServiceFunctionsInterface
{
    /**
     * Constants.
     *
     * @var string VERSION  A version number
     *
     * @api
     */
    const VERSION = '1.5.0';

    // --------------------------------------------------------------------------

    /**
     * Properties
     *
     * @static ServiceRequestContainerInterface $iService            A ServiceRequestContainerInterface instance
     * @var    ConfigurationInterface           $config              A ConfigurationInterface instance
     * @var    ReflectionMethod                 $reflectionMethod    A ReflectionMethod instance
     * @var    ReflectionClass                  $reflectionClass     A ReflectionClass instance
     * @var    ReflectionException              $reflectionException A ReflectionException instance
     * @var    array                            $namespaces          A array for namespaces
     * @var    array                            $storageRegister     A set of validation stored data elements
     * @static ServiceRequestContainerInterface $instance            A ServiceRequestContainerInterface instance
     * @static integer                          $objectCount         A ServiceRequestContainerInterface instance count
     */
    protected $config              = null;
    protected $iService            = null;
    protected $namespaces          = array();
    protected $reflectionClass     = null;
    protected $reflectionMethod    = null;
    protected $reflectionException = null;
    protected $classParameters     = array();
    protected $storageRegister     = array();
    protected static $instance     = null;
    protected static $objectCount  = 0;

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @param ConfigurationInterface $config A ConfigurationInterface instance
     *
     * @api
     */
    public function __construct(ConfigurationInterface $config)
    {
        $this->setProperty('config', $config);
        $this->setProperty('iService', $this);
        $this->setRegister('Config', 'object', $config);
        static::$instance = $this;
        static::$objectCount++;
    }

    // --------------------------------------------------------------------------

    /**
     * Destructor.
     *
     * @api
     */
    public function __destruct()
    {
        static::$objectCount--;
    }

    // --------------------------------------------------------------------------

    /**
     * Returns a ReflectionClass for a named class.
     *
     * @param  string $class  A class to reflect on
     * @return ReflectionClass
     * @throws Exception\ReflectionFailure Could not reflect on the class.
     */
    protected function getReflection($class)
    {
        if (isset($this->reflection[$class])) {
            return $this->reflection[$class];
        }

        try {
            $this->reflection[$class] = new \ReflectionClass($class);
        } catch (ReflectionException $e) {
            throw new Exception\ReflectionFailure($class, 0, $e);
        }

        return $this->reflection[$class];
    }

    // --------------------------------------------------------------------------

    /**
     * Extracts method parameter types from the PHPDoc.
     *
     * @param \ReflectionMethod $reflect  A ReflectionMethod
     * @return array
     */
    public function getPHPDocParams(ReflectionMethod $reflect)
    {
        $comment = $reflect->getDocComment();

        if (trim($comment) === '') {
            return null;
        }

        /**
         * line-endings to UNIX format
         */
        $comment = trim(str_replace("\r\n", "\n", $comment));
        $comment = trim(str_replace("\r", "\n", $comment));

        /**
         * Remove leading DocBlock open
         */
        $comment = trim(preg_replace('/^(\s*\/\*\*|\s*\*{1,2}\/|\s*\* ?)/m', '', $comment));
        $comment = preg_split('/\n/', $comment);
        $comment = array_map('trim', $comment);

        /**
         * Remove blanks
         */
        $comment = array_filter($comment);

        foreach ($comment as $value) {
            if (strpos($value, '@param') !== false) {
                $value = preg_replace('/\h+/', ' ', $value);
                list($tag, $type, $var) = explode(' ', $value);
                $filtered[] = ['tag' => $tag, 'type' => $type, 'variable'=> $var];
            }

            if (strpos($value, '@return') !== false) {
                $value = preg_replace('/\h+/', ' ', $value);
                list($tag, $type) = explode(' ', $value);
                $filtered[] = ['tag' => $tag, 'type' => $type];
            }
        }

        return $filtered;
    }

    // --------------------------------------------------------------------------

    /**
     * Gets the configured namespaces.
     *
     * @return array The hash with namespaces as keys and directories as values
     */
    public function getNamespaces()
    {
        return $this->namespaces;
    }

    // --------------------------------------------------------------------------

    /**
     * Registers an array of namespaces
     *
     * @param array $namespaces An array of namespaces (namespaces as keys and locations as values)
     *
     * @api
     */
    public function registerNamespaces(array $namespaces)
    {
        foreach ($namespaces as $namespace => $locations) {
            $this->namespaces[$namespace] = (array) $locations;
        }
    }

    // --------------------------------------------------------------------------

    /**
     * Registers a namespace.
     *
     * @param string       $namespace  A namespace
     * @param array|string $paths      A location(s) of the namespace
     *
     * @api
     */
    public function registerNamespace($namespace, $paths)
    {
        $this->namespaces[$namespace] = (array) $paths;
    }

    // --------------------------------------------------------------------------

    abstract protected function newInstance($interface);

    // --------------------------------------------------------------------------

    /**
     * Reset (future implementation).
     *
     * @api
     */
    public function reset()
    {
        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Store an element value for later retrieval
     *
     * @param string $key      A key name
     * @param string $section  A element subname
     * @param mixed  $value    A assigned value
     *
     * @return ServiceRequestContainerInterface
     *
     * @throws \InvalidArgumentException if the key name is not defined
     *
     * @api
     */
    public function setRegister($key, $section, $value)
    {
        $this->{'storageRegister'}[$key][$section] = $value;

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Store parameter values for later retrieval
     *
     * @param string $class    A class name
     * @param string $section  A element subname
     * @param mixed  $value    A assigned value
     *
     * @return ServiceRequestContainerInterface
     *
     * @throws \InvalidArgumentException if the key name is not defined
     *
     * @api
     */
    public function setClassParameters($class, $section, $value)
    {
        $this->{'classParameters'}[$class][$section] = $value;

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Retrieve a stored element value
     *
     * @param string $class   The class name
     * @param string $section The element sub-element
     *
     * @return mixed The assigned value
     *
     * @throws \InvalidArgumentException if the key name is not defined
     *
     * @api
     */
    public function getClassParameters($class, $section = 'object')
    {
        /**
         * Check Arguments
         */
        if (!$this->isStringKey($class, $this->{'classParameters'})) {
            throw new \InvalidArgumentException(sprintf(
                'Required in "%s". Parameter %s must be type string and '.
                'exist in $this->{classParameters}. Input was "%s". %s',
                'ServiceRequestContainer::getClassParameter()',
                '{$class}',
                $class,
                '[x000945]'
            ));
        }

        return $this->{'classParameters'}[$class][$section];
    }

    // --------------------------------------------------------------------------

    /**
     * Method implementations inserted.
     *
     * The notation below illustrates visibility: (+) @api, (-) protected or private.
     *
     * @method all();
     * @method init();
     * @method get($key);
     * @method has($key);
     * @method version();
     * @method getClassName();
     * @method getConst($key);
     * @method set($key, $value);
     * @method isString($str);
     * @method getInstanceCount();
     * @method getClassInterfaces();
     * @method __call($callback, $parameters);
     * @method getProperty($name, $key = null);
     * @method doesFunctionExist($functionName);
     * @method isStringKey($str, array $keys);
     * @method throwExceptionError(array $error);
     * @method setProperty($name, $value, $key = null);
     * @method throwInvalidArgumentExceptionError(array $error);
     */
    use ServiceFunctions;
}

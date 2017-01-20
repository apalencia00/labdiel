<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UCSDMath\Functions;

/**
 * ServiceFunctions is the default implementation of {@link ServiceFunctionsInterface} which
 * provides routine service-functions methods that are commonly used throughout the framework.
 *
 * use UCSDMath\Functions\ServiceFunctions;
 *
 * Method list:
 *
 * @method array all();
 * @method object init();
 * @method string version();
 * @method boolean has($key);
 * @method mixed getConst($key);
 * @method string getClassName();
 * @method boolean isString($str);
 * @method array getClassInterfaces();
 * @method integer getInstanceCount();
 * @method boolean isValidUuid($uuid);
 * @method boolean isValidEmail($email);
 * @method boolean isValidSHA512($hash);
 * @method mixed get($key, $subkey = null);
 * @method mixed __call($callback, $parameters);
 * @method boolean isStringKey($str, array $keys);
 * @method boolean getProperty($name, $key = null);
 * @method object set($key, $value, $subkey = null);
 * @method boolean doesFunctionExist($functionName);
 * @method \Exception throwExceptionError(array $error);
 * @method object setProperty($name, $value, $key = null);
 * @method \InvalidArgumentException throwInvalidArgumentExceptionError(array $error);
 *
 * ServiceFunctions provides a common set of implementations where needed. The ServiceFunctions
 * trait and the ServiceFunctionsInterface should be paired together.
 *
 * Here is an example of how you should be able to use it:
 *
 *    <?php
 *
 *    namespace UCSDMath\Blog;
 *
 *    use UCSDMath\Functions\ServiceFunctions;
 *    use UCSDMath\Functions\ServiceFunctionsInterface;
 *
 *    /**
 *     * The Sftp class with trait methods and the interfaces added.
 *     * /
 *    class Sftp extends AbstractSftpAdapter implements SftpInterface, ServiceFunctionsInterface
 *    {
 *        /**
 *         * Properties.
 *         * /
 *        protected $host = 'math.ucsd.edu';
 *
 *        /**
 *         * Adding our Trait within this class.
 *         * /
 *        use ServiceFunctions;
 *
 *        /**
 *         * General use.
 *         * /
 *        public function getHost()
 *        {
 *            return $this->getProperty('host');
 *        }
 *     }
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
trait ServiceFunctions
{
    /**
     * Constants for use in traits can be defined in the interface.
     */

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getProperty($name, $key = null)
    {
        return $this->isString($key) ? $this->{$name}[$key] : $this->{$name};
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function __call($callback, $parameters)
    {
        return call_user_func_array($this->$callback, $parameters);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function setProperty($name, $value, $key = null)
    {
        if ($this->isString($key)) {
            $this->{$name}[$key] = $value;
        } else {
            $this->{$name} = $value;
        }

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function version()
    {
        return static::VERSION;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getClassName()
    {
        return get_class($this);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getClassInterfaces()
    {
        return class_implements($this);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getConst($key)
    {
        $constant = 'static::'.strtoupper($key);

        return defined($constant)
            ? constant($constant)
            : $this->throwInvalidArgumentExceptionError([
                'datatype|defined|{$key}',
                __METHOD__,
                __CLASS__,
                'ServiceFunctions [A103]'
            ]);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function init()
    {
        if (null === static::$instance) {
            static::$instance = new static;
            static::$objectCount++;
        }

        return static::$instance;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function getInstanceCount()
    {
        return (int) static::$objectCount;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function isString($str)
    {
        /**
         * Before using trim(), proxy the input; avoid type cast
         */
        $str = is_string($str) ? trim($str) : $str;

        return is_string($str) && !empty($str);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return array_key_exists($key, $this->getProperty('storageRegister'));
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function isStringKey($str, array $keys)
    {
        return $this->isString($str)
            && array_key_exists($str, $keys);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function get($key, $subkey = null)
    {
        return $this->isString($subkey)
            ? $this->{'storageRegister'}[$key][$subkey]
            : $this->{'storageRegister'}[$key];
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function set($key, $value, $subkey = null)
    {
        if ($this->isString($subkey)) {
            $this->{'storageRegister'}[$key][$subkey] = $value;
        } else {
            $this->{'storageRegister'}[$key] = $value;
        }

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->getProperty('storageRegister');
    }

    // --------------------------------------------------------------------------

    /**
     * Check if a required function exists.
     *
     * @param  string  $functionName  A function name to check.
     *
     * @return bool  A confirmation that the function exists.
     */
    protected static function doesFunctionExist($functionName)
    {
        return function_exists($functionName);
    }

    // --------------------------------------------------------------------------

    /**
     * Throw Exception Error.
     *
     * @param array $error  A array data representation for the exception.
     *
     * @return \Exception
     */
    protected function throwExceptionError(array $error)
    {
        throw new \Exception(sprintf(
            'Method in: %s. Class in: %s. Message: %s. Reference: %s.',
            $error[0],
            $error[1],
            $error[2],
            $error[3]
        ));
    }

    // --------------------------------------------------------------------------

    /**
     * Exception thrown if an argument is not of the expected type.
     *
     * @param array $error  A array data representation for the argument exception.
     *
     * @return \InvalidArgumentException
     */
    protected function throwInvalidArgumentExceptionError(array $error)
    {
        throw new \InvalidArgumentException(sprintf(
            'Provide valid: %s. See Method: %s. See Class: %s. See Reference: [%s]',
            $error[0],
            $error[1],
            $error[2],
            $error[3]
        ));
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function isValidEmail($email)
    {
        return filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL) !== false;
    }

    // --------------------------------------------------------------------------

    /**
     * Validate a UUID.
     *
     * @param string $uuid  A uuid string
     *
     * @return bool
     */
    public function isValidUuid($uuid)
    {
        return (bool) preg_match(static::UUID_PATTERN, $uuid);
    }

    // --------------------------------------------------------------------------

    /**
     * Basic SHA-512 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * return bool
     */
    public function isValidSHA512($hash)
    {
        return (bool) preg_match('/^[a-fA-F\d]{128}$/', $hash);
    }
}

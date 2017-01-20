<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UCSDMath\Configuration;

use UCSDMath\Functions\ServiceFunctions;
use Symfony\Component\HttpFoundation\ServerBag;
use UCSDMath\Functions\ServiceFunctionsInterface;
use UCSDMath\DependencyInjection\ServiceRequestContainer;
use UCSDMath\DependencyInjection\ServiceRequestContainerInterface;

/**
 * AbstractConfiguration provides an abstract base class implementation of {@link ConfigurationInterface}.
 * Primarily, this services the fundamental implementations for all Configuration classes.
 *
 * This component library is used to service configuration and framework bootstrapping.
 *
 * The class provides a declarative configuration method to bootstrapping into the application
 * environment.  Configuration provides both required settings and application services
 * needed by the UCSDMath Framework.
 *
 * Method list:
 *
 * @method ConfigurationInterface __construct();
 * @method boolean hasMinimumPHPVersion();
 * @method ConfigurationInterface combineStorageRegisters();
 * @method ConfigurationInterface setupConfigurationEnvironment();
 * @method ConfigurationInterface iNetServicesConfigurationStartup();
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractConfiguration implements ConfigurationInterface, ServiceFunctionsInterface
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
     * Properties.
     *
     * @var    array                  $storageRegister  A array of stored parameters
     * @static ConfigurationInterface $instance         A ConfigurationInterface instance
     * @static integer                $objectCount      A ConfigurationInterface instance count
     */
    protected $service            = null;
    protected static $instance    = null;
    protected static $objectCount = 0;
    protected $storageRegister    = [
        'description'       => 'Intranet Project',
        'organization'      => 'University of California, San Diego',
        'author'            => 'Math Computing Support',
        'administrator'     => 'Daryl Eisner',
        'category'          => 'Workflow Applications',
        'abstract'          => 'UCSD Mathematics Department Intranet Prototype',
        'keywords'          => ['Mathematics', 'UCSD', 'Department'],
        'copyright'         => '(c) ---- UCSD Mathematics Department',
        'contact'           => 'mathhelp@math.ucsd.edu, x44591',
        'publisher'         => 'Math Computing Support',
        'department'        => 'UCSD Mathematics',
        'support_group'     => 'Math Computing Support',
        'email'             => 'mathhelp@math.ucsd.edu',
        'phone'             => '(858) 534-4591',
        'domain_url'        => null,
        'redirect_logout_shibboleth' => null,
        'global_css'        => [''],
        'global_js'         => [

            ['source'       => '/sso/1/assets/js/ucsdmath-framework.min.js',
             'location'     => 'body'], // (e.g., head, body, disabled)

            ['source'       => '/sso/1/assets/js/TinyMCE/tinymce.min.js',
             'location'     => 'body'], // (e.g., head, body, disabled)

        ],
        'apple_touch_icons' => ['/sso/1/assets/img/apple-touch-icon-144x144-precomposed.png',
                                '/sso/1/assets/img/apple-touch-icon-114x114-precomposed.png',
                                '/sso/1/assets/img/apple-touch-icon-72x72-precomposed.png',
                                '/sso/1/assets/img/apple-touch-icon-57x57-precomposed.png',
                                '/sso/1/assets/img/apple-touch-icon-precomposed.png'],
    ];

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
        static::hasMinimumPHPVersion();

        $this->combineStorageRegisters()
            ->setupConfigurationEnvironment()
                ->iNetServicesConfigurationStartup();

        static::$instance = $this;
        static::$objectCount++;
    }

    /**
     * Combine storageRegister and storageRegisterSubset.
     *
     * @return ConfigurationInterface
     *
     * @throws \InvalidArgumentException if the property is not defined
     */
    private function combineStorageRegisters()
    {
        if (null === $this->storageRegisterSubset) {
            throw new \InvalidArgumentException(sprintf(
                'You must provide a valid array with some data subset. No data was given for %s. - %s',
                '$this->storageRegisterSubset',
                '[conf-A101]'
            ));
        }

        $this->setProperty(
            'storageRegister',
            array_merge(
                $this->getProperty('storageRegister'),
                $this->getProperty('storageRegisterSubset')
            )
        );

        unset($this->storageRegisterSubset);

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Setup environmental error reporting and charater set.
     *
     * @return ConfigurationInterface
     */
    private function setupConfigurationEnvironment()
    {
        /* Overriding php.ini settings (development) */
        ini_set('error_reporting', $this->getConst('ERROR_REPORTING'));
        ini_set('display_errors', (true === $this->getConst('DISPLAY_ERRORS')));
        ini_set('display_startup_errors', (true === $this->getConst('DISPLAY_STARTUP_ERRORS')));
        ini_set('log_errors', (true === $this->getConst('LOG_ERRORS')));

        /* string to ERROR_LOG: A path to the PHP error log (chmod 600) */
        ini_set('error_log', realpath(__DIR__.'/../../../../../../dev/php_errors.log'));
        ini_set('default_charset', $this->getConst('DEFAULT_CHARSET'));

        /* Set PHP internal character encoding */
        mb_internal_encoding($this->getConst('DEFAULT_CHARSET'));

        /* Set HTTP output character encoding */
        mb_http_output($this->getConst('DEFAULT_CHARSET'));

        /* Set the default timezone used by all date/time functions in the script */
        date_default_timezone_set($this->getConst('TIMEZONE_LOCAL'));

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Startup Intranet Base Services.
     *
     * @return ConfigurationInterface
     *
     * @throws \InvalidArgumentException if the property is not defined
     */
    private function iNetServicesConfigurationStartup()
    {
        /**
         * Request access to ServiceRequestContainer.
         */
        $this->setProperty('service', new ServiceRequestContainer($this));
        $this->registerAdusername($this->service);
        $this->set('domain_url', 'https://' . $this->service->get('Request')->server->get('SERVER_NAME'));
        $this->set('redirect_logout_shibboleth','/Shibboleth.sso/Logout?return=https://a4.ucsd.edu/tritON/logout?target='.$this->get('domain_url').'/sso/1/panel/');
        $this->service->get('Benchmark')->start();
        $this->service->get('Security')->requireSSL();
     // $this->service->get('Security')->checkReferer();
        $this->service->get('Session')->startSession();
        $this->service->get('Security')->runApplicationTurnKey();
        $this->service->get('dbh');
        $this->service->get('Session')->switchUserPassport($this->service->get('Persistence'));
        $this->service->get('ViewFactory');

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Setup default username for testing.
     *
     * @return ConfigurationInterface
     */
    private function registerAdusername(ServiceRequestContainerInterface $service)
    {
        if (true === $this->getConst('ADUSERNAME_ENABLE_OVERRIDE') && null !== $this->getConst('ADUSERNAME_DEFAULT_NAME')) {
            $service->get('Request')->server->set('ADUSERNAME', $this->getConst('ADUSERNAME_DEFAULT_NAME'));

        } elseif (false === $service->get('Request')->server->has('ADUSERNAME')) {
            $this->relayToRoute($this->getConst('REDIRECT_LOGOUT').'index.php?v=no_adusername_provided_by_shibboleth;');
        }

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function hasMinimumPHPVersion()
    {
        /* mandatory requirements */
        if (version_compare(PHP_VERSION, self::REQUIRED_PHP_VERSION, '<')) {
            throw new \Exception(sprintf(
                'The current version of PHP needs to be upgraded to at least'.
                'version %s or higher to meet minimum functionality. The current'.
                'PHP version is %s. - %s',
                self::REQUIRED_PHP_VERSION,
                PHP_VERSION,
                '[conf-A102]'
            ));
        }

        return true;
    }

    // --------------------------------------------------------------------------

    /**
     * Relay to location.
     *
     * @param string $destination  A routing location
     *
     * @return void
     */
    public function relayToRoute($destination)
    {
        header('Location: ' . $destination, true, 302);
        exit('Routing error...AbstractSession::relayToRoute()');
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function holodeck($items = null, $location = null)
    {
        $display  = null === $items
            ? ServiceRequestContainer::init()->get('Request')->request
            : $items;

        $location = null === $location
            ? ''
            : "> (location: $location)";

        print "<pre>\n-- Holodeck: Lefler's Law - ".
              ServiceRequestContainer::init()->get('Functions')->getLeflersLaw().
              "\n--$location\n".
              "----------------------------------------------------------\n\n";

        print_r($display);
        exit;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function systemInfo(array $settings = null)
    {
        return static::IS_DEBUG_ENABLED ? phpinfo() : exit('IS_DEBUG_ENABLED === false');
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
/**
 * Run-time Constants.
 */
if (!defined('FATAL')) {
    define('FATAL', E_USER_ERROR);
}
if (!defined('WARNING')) {
    define('WARNING', E_USER_WARNING);
}
if (!defined('NOTICE')) {
    define('NOTICE', E_USER_NOTICE);
}
/**
 *  CHEAT SHEET
 *  ----------------------------------------------------------------------------------------------------------------
 *  | Value of variable       |isset($var)|empty($var)|is_null($var)|is_string($var)|is_int($var)|is_numeric($var) |
 *  ----------------------------------------------------------------------------------------------------------------
 *  |"" empty string          |bool(true) |bool(true) |             |bool(true)     |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | " " (space)             |bool(true) |           |             |bool(true)     |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | FALSE                   |bool(true) |bool(true) |             |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | TRUE                    |bool(true) |           |             |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | array() (empty)         |bool(true) |bool(true) |             |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | NULL                    |           |bool(true) |bool(true)   |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | "0" (zero string)       |bool(true) |bool(true) |             |bool(true)     |            |bool(true)       |
 *  ----------------------------------------------------------------------------------------------------------------
 *  |  0 (zero integer)       |bool(true) |bool(true) |             |               |bool(true)  |bool(true)       |
 *  ----------------------------------------------------------------------------------------------------------------
 *  |  0.0 (0 float)          |bool(true) |bool(true) |             |               |            |bool(true)       |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | $var;Ê(declared no val) |           |bool(true) |bool(true)   |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 *  | NULLÊbyte ("\ 0")       |bool(true) |           |             |               |            |                 |
 *  ----------------------------------------------------------------------------------------------------------------
 */

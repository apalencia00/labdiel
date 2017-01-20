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
 * ServiceFunctionsInterface is the interface implemented by all ServiceFunction traits.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
interface ServiceFunctionsInterface
{
    /**
     * Constants.
     */
    const SERVICE_FUNCTION_VERSION = '1.5.0';

    // --------------------------------------------------------------------------

    /**
     * Get a property value.
     *
     * @param  string $name A property name
     * @param  string $key  A optional property key index
     *
     * @return mixed  A property value
     *
     * @throws \InvalidArgumentException if the property name is not defined
     *
     * @api
     */
    public function getProperty($name, $key = null);

    // --------------------------------------------------------------------------

    /**
     * Set a property value.
     *
     * @param string $name   A property name
     * @param mixed  $value  A property value
     * @param string $key    A optional key index
     *
     * @return ServiceFunctionsInterface
     *
     * @throws \InvalidArgumentException if the property name is not defined
     *
     * @api
     */
    public function setProperty($name, $value, $key = null);

    // --------------------------------------------------------------------------

    /**
     * Get the version number of the application.
     *
     * @return string
     *
     * @api
     */
    public function version();

    // --------------------------------------------------------------------------

    /**
     * Returns the current class name.
     *
     * @return string
     *
     * @api
     */
    public function getClassName();

    // --------------------------------------------------------------------------

    /**
     * Return class interfaces.
     *
     * @return array
     *
     * @api
     */
    public function getClassInterfaces();

    // --------------------------------------------------------------------------

    /**
     * Get constant property value.
     *
     * @param  string $key A constant property name
     *
     * @return mixed  A constant property value
     *
     * @throws \InvalidArgumentException if the property name is not defined
     *
     * @api
     */
    public function getConst($key);

    // --------------------------------------------------------------------------

    /**
     * Initialization (Singleton Pattern).
     *
     * @static
     *
     * @return ServiceFunctionsInterface
     *
     * @api
     */
    public static function init();

    // --------------------------------------------------------------------------

    /**
     * Returns instance count.
     *
     * @static
     *
     * @return integer
     *
     * @api
     */
    public static function getInstanceCount();

    // --------------------------------------------------------------------------

    /**
     * Basic string validation.
     *
     * @param string $str The input parameter
     *
     * @return bool
     */
    public function isString($str);

    // --------------------------------------------------------------------------

    /**
     * Return true if parameter is defined.
     *
     * @param  string $key The parameter name
     *
     * @return bool
     *
     * @api
     */
    public function has($key);

    // --------------------------------------------------------------------------

    /**
     * Basic string and array keys validation.
     *
     * @param string $str The input parameter
     * @param array  $keys   The associative array parameter
     *
     * @return bool
     */
    public function isStringKey($str, array $keys);

    // --------------------------------------------------------------------------

    /**
     * Get a storageRegister element.
     *
     * @param  string $key    A element name
     * @param  string $subkey A element subkey name
     *
     * @return mixed A element value
     *
     * @throws \throwInvalidArgumentExceptionError if the element name is not defined
     *
     * @api
     */
    public function get($key, $subkey = null);

    // --------------------------------------------------------------------------

    /**
     * Set a storageRegister element.
     *
     * @param string $key    A element name
     * @param mixed  $value  A element value
     * @param mixed  $subkey A element subkey name
     *
     * @return ServiceFunctionsInterface
     *
     * @throws \throwInvalidArgumentExceptionError if the element name is not defined
     *
     * @api
     */
    public function set($key, $value, $subkey = null);

    // --------------------------------------------------------------------------

    /**
     * Return the storageRegister array.
     *
     * @return array
     *
     * @api
     */
    public function all();

    // --------------------------------------------------------------------------

    /**
     * Forward to any callable, including anonymous functions
     * (or any instances of \Closure).
     *
     * @param string $callback    The named callable to be called.
     * @param mixed  $parameters  The parameters to be passed to the callback, as an indexed array.
     *
     * @return mixed  the return value of the callback, or false on error.
     *
     * @api
     */
    public function __call($callback, $parameters);
}

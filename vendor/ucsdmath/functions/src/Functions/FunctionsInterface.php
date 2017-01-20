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
 * FunctionsInterface is the interface implemented by all Functions classes.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
interface FunctionsInterface
{
    /**
     * Constants.
     */
    const REQUIRED_PHP_VERSION = '5.6.10';
    const DEFAULT_CHARSET = 'UTF-8';
    const UUID_PATTERN = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[0-9a-f]{4}-[0-9a-f]{12}$/i';

    // --------------------------------------------------------------------------

    /**
     * Initialization (Singleton Pattern).
     *
     * @static
     *
     * @return FunctionsInterface
     *
     * @api
     */
    public static function init();

    // --------------------------------------------------------------------------

    /**
     * Returns the instance count.
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
     * A Boolean converter.
     *
     * @param  mixed $value  A parameter value
     *
     * @return bool
     *
     * @api
     */
    public function getBoolean($value);

    // --------------------------------------------------------------------------

    /**
     * Return the seasonal quarter.
     *
     * @return string
     *
     * @api
     */
    public function getCurrentQuarter();

    // --------------------------------------------------------------------------

    /**
     * Return digits and commas only.
     *
     * @param  string $str  A string to filter
     *
     * @return string
     *
     * @api
     */
    public function sanitizeDigitCommas($str);

    // --------------------------------------------------------------------------

    /**
     * Sanitize a float.
     *
     * @param  string $number  A number to filter
     * @param  string $min     A optional minimum
     * @param  string $max     A optional maximum
     *
     * @return string|bool
     *
     * @api
     */
    public function sanitizeFloat($number);

    // --------------------------------------------------------------------------

    /**
     * Validate the email address.
     *
     * @param string $email  A email parameter
     *
     * return bool
     */
    public function isValidEmail($email);
}

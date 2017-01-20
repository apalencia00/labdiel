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

/**
 * ConfigurationInterface is the interface implemented by all Configuration classes.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
interface ConfigurationInterface
{
    /**
     * Constants (environmental/settings).
     *
     * @var string REQUIRED_PHP_VERSION          A minimum PHP version
     * @var string DEFAULT_CHARSET               A preferred character set
     * @var string CRLF                          A carriage return line feed
     * @var string TIMEZONE_LOCAL                A supported PHP primary timezone
     * @var string SITE_NAME                     A default name for the current site
     * @var string MYSQL_DATE_FORMAT             A MySQL date format
     * @var bool   REQUIRE_HTTPS                 A secure setting TLS/SSL site requirement
     * @var bool   DISPLAY_ERRORS                A option for displaying errors
     * @var bool   DISPLAY_STARTUP_ERRORS        A option for displaying startup errors
     * @var bool   LOG_ERRORS                    A option for logging errors
     * @var bool   ERROR_REPORTING               A option for turning on error reporting
     * @var string PHP_SESSION_NAME              A custom PHP session name
     * @var string PHP_SESSION_PREFIX            A prefix key for all PHP session handling
     * @var string PHP_SESSION_HASH_ALGOS        A default cryptographic hash used
     * @var int    PHP_SESSION_LIFE              A seconds to garbage of session (60x45 = 2700 sec = 45 min)
     * @var int    PHP_AUTO_LOGOUT_TIME          A seconds setting to a header logout
     * @var int    PHP_AUTO_REFRESH_TIME         A seconds setting to a meta refresh logout
     * @var string SMTP_SETTINGS_FILE            A SMTP settings file name
     * @var string ACCOUNT_SETTINGS_FILE         A account settings file name
     * @var string DATABASE_SETTINGS_FILE        A database settings file name
     * @var string ENCRYPTION_SETTINGS_FILE      A encryption settings file name
     * @var string ADMINISTRATION_SETTINGS_FILE  A administration settings file name
     */
    const REQUIRED_PHP_VERSION         = '5.6.10';
    const DEFAULT_CHARSET              = 'UTF-8';
    const CRLF                         = "\r\n";
    const TIMEZONE_LOCAL               = 'America/Los_Angeles';
    const SITE_NAME                    = 'Mathlink';
    const MYSQL_DATE_FORMAT            = 'Y-m-d H:i:s';
    const REQUIRE_HTTPS                = true;
    const DISPLAY_ERRORS               = true;
    const DISPLAY_STARTUP_ERRORS       = true;
    const LOG_ERRORS                   = true;
    const ERROR_REPORTING              = E_ALL;
    const PHP_SESSION_NAME             = 'MathlinkSession';
    const PHP_SESSION_PREFIX           = 'passport';
    const PHP_SESSION_HASH_ALGOS       = 'sha512';
    const PHP_SESSION_LIFE             = 3600;
    const PHP_AUTO_LOGOUT_TIME         = 3000;
    const PHP_AUTO_REFRESH_TIME        = 2700;
    const SMTP_SETTINGS_FILE           = 'configuration-settings-smtp.yml';
    const ACCOUNT_SETTINGS_FILE        = 'configuration-settings-account.yml';
    const DATABASE_SETTINGS_FILE       = 'configuration-settings-database.yml';
    const ENCRYPTION_SETTINGS_FILE     = 'configuration-settings-encryption.yml';
    const ADMINISTRATION_SETTINGS_FILE = 'configuration-settings-administrator.yml';

    // --------------------------------------------------------------------------

    /**
     * Constants (other).
     *
     * @var string UCSD_URL                    A url for the ucsd domain name
     * @var string REDIRECT_LOGIN              A root-relative path to login
     * @var string REDIRECT_PANEL              A root-relative path to panel
     * @var string AUTHOR                      A author for the site
     * @var string ADMINISTRATOR               A administator for the site
     * @var string REDIRECT_LOGOUT             A root-relative path to logout
     * @var string REDIRECT_LOGOUT_AUTO        A root-relative path to logout as auto
     * @var string GENERATOR                   A base sytem generator or framework
     * @var string DEFAULT_THEME               A default theme for UCSD
     * @var bool   MINIFY_HTML                 A option to minimize HTML view output
     * @var bool   TWIG_CACHE_ENABLED          A Twig preference for using cache or not
     * @var bool   TWIG_STRICT_VARIABLES       A setting for Twig's strict variables
     * @var bool   ADUSERNAME_ENABLE_OVERRIDE  A setting for testing a single adusername
     * @var string ADUSERNAME_DEFAULT_NAME     A setting for default adusername (e.g., 'mlove', null)
     */
    const UCSD_URL                     = 'http://www.ucsd.edu';
    const REDIRECT_LOGIN               = '/sso/1/login';
    const REDIRECT_PANEL               = '/sso/1/panel';
    const AUTHOR                       = 'Math Computing Support (MCS) [ www.math.ucsd.edu ]';
    const ADMINISTRATOR                = 'Daryl Eisner';
    const REDIRECT_LOGOUT              = '/sso/1/logout';
    const REDIRECT_LOGOUT_AUTO         = '/sso/1/logout/index.php?autologout=1;';
    const GENERATOR                    = 'UCSDMath Framework';
    const DEFAULT_THEME                = 'ucsd-decorator-4';
    const TWIG_EXTENSION_DEBUG         = true;

    const IS_DEBUG_ENABLED             = false;
    const MINIFY_HTML                  = true;
    const TWIG_STRICT_VARIABLES        = false;
    const TWIG_CACHE_ENABLED           = true;
    const ADUSERNAME_ENABLE_OVERRIDE   = false;
    const ADUSERNAME_DEFAULT_NAME      = null;

    // --------------------------------------------------------------------------

    /**
     * Checks the PHP version for a defined minimum requirement.
     *
     * @static
     *
     * @return bool|exception
     *
     * @throws \Exception if not running our defined PHP minimum.
     *
     * @api
     */
    public static function hasMinimumPHPVersion();
}

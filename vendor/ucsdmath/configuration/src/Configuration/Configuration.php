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

file_exists(realpath(__DIR__.'/../../../assets/php/vendor/autoload.php'))
    ? require_once(realpath(__DIR__.'/../../../assets/php/vendor/autoload.php'))
    : header('location: /sso/1/notify/assets/dev/no-autoloader/');

/**
 * Default implementation of {@link ConfigurationInterface} manages application-level
 * configuration settings for Panel.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
class Configuration extends AbstractConfiguration implements ConfigurationInterface
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
     * Constants.
     *
     * @var string  APPLICATION_NAME  A name for the current application
     * @var string  PAGE_TITLE        A html head metadata title
     * @var string  DESCRIPTION       A html head metadata description
     * @var string  KEYWORDS          A html head metadata keywords
     * @var string  SHORTCUT_ICON     A unique favorite icon (favicon) for this application
     * @var string  REL_ROOT_APP      A root–relative application path
     * @var string  APPLICATION_KEY   A unique assigned application uuid key
     * @var integer APPLICATION_ID    A unique assigned application id number
     * @var string  BODY_CLASS        A inline class designator for <body> tag (e.g., 'fluid')
     */
    const APPLICATION_NAME = 'Panel';
    const PAGE_TITLE       = 'Panel Updater';
    const DESCRIPTION      = 'Update department panel information.';
    const KEYWORDS         = 'mathematics, ucsd, panel, faculty portal';
    const SHORTCUT_ICON    = '/sso/1/panel/assets/img/favicon.png';
    const REL_ROOT_APP     = '/sso/1/panel';
    const APPLICATION_KEY  = 'Axxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    const APPLICATION_ID   =  1;
    const BODY_CLASS       =  '';

    // --------------------------------------------------------------------------

    /**
     * Properties.
     *
     * @var array $storageRegisterSubset  A dataset for storageRegister merge (@link parent::__construct()).
     */
    protected $storageRegisterSubset = [
        'application_css' => ['/sso/1/panel/assets/css/ucsdmath-app.min.css'],
        'application_js'  => [
                                 ['source'   => '/sso/1/panel/assets/js/ucsdmath-app.min.js',
                                  'location' => 'body'  // (e.g., head, body, disabled)
                                 ],
                             ],
        'head'            => ['keywords' => [
                                 'mathematics',
                                 'ucsd',
                                 'panel',
                                 'faculty portal'
                                 ],
                             ],
    ];

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     */
    public function __construct()
    {
        require(__DIR__.'/Database.php');
        require(__DIR__.'/Functions.php');
        require(__DIR__.'/ViewFactory.php');
        parent::__construct();
    }
}
/* Procures "side effect" {PSR-1} (loading and execution of code) */
new Config;

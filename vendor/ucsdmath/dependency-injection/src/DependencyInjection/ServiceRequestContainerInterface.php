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

/**
 * ServiceRequestContainerInterface is the interface implemented by all ServiceRequestContainer classes.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
interface ServiceRequestContainerInterface
{
    /**
     * Constants.
     */
    const REQUIRED_PHP_VERSION = '5.6.10';
    const DEFAULT_CHARSET = 'UTF-8';
    const TIMEZONE = 'America/Los_Angeles';
}

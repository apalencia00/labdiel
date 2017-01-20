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

use Carbon\Carbon;
use UCSDMath\Configuration\Config;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UCSDMath\DependencyInjection\ServiceRequestContainer;

/**
 * Functions is the default implementation of {@link FunctionsInterface} which
 * provides routine functions methods that are commonly used throughout the framework.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
class Functions extends AbstractFunctions implements FunctionsInterface
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
     */

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
        parent::__construct();
    }
}

<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UCSDMath\Pdf;

/**
 * Pdf is the default implementation of {@link PdfInterface} which
 * provides routine pdf methods that are commonly used throughout the framework.
 *
 * This is a adapter for the mPDF library.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
class Pdf extends AbstractPdfAdapter implements PdfInterface
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

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
 * PdfInterface is the interface implemented by all Pdf classes.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
interface PdfInterface
{
    /**
     * Constants.
     *
     * @var string DEFAULT_CHARSET           A default charater setting
     * @var string DEFAULT_PAGE_SIZE         A default page size
     * @var string DEFAULT_PAGE_ORIENTATION  A default page orientation
     */
    const DEFAULT_CHARSET = 'UTF-8';
    const DEFAULT_PAGE_SIZE = 'Letter';
    const DEFAULT_FILENAME = 'document.pdf';
    const DEFAULT_PAGE_ORIENTATION = 'Portrait';
    const DEFAULT_OUTPUT_DESTINATION = 'B';

    // --------------------------------------------------------------------------

    /**
     * Initialize a new PDF document by specifying page size and orientation.
     *
     * @param array $pageSize     A page size
     * @param array $orientation  A page orientation
     *
     * @return PdfInterface
     *
     * @api
     */
    public function initializePageSetup($pageSize = null, $orientation = null);

    // --------------------------------------------------------------------------

    /**
     * Set the page header.
     *
     * @param array $data  A list of header items ('left','right')
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setHeader(array $data);

    // --------------------------------------------------------------------------

    /**
     * Set the page footer.
     *
     * @param array $data  A list of footer items ('left','center','right')
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setFooter(array $data);

    // --------------------------------------------------------------------------

    /**
     * Set the output destination.
     *
     * @param array $destination  A destination to send the PDF
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setOutputDestination($destination);

    // --------------------------------------------------------------------------

    /**
     * Set the document filename.
     *
     * @param array $filename  A default document filename
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setFilename($filename);

    // --------------------------------------------------------------------------

    /**
     * Set the default document font.
     *
     * @param string $fontname  A font name ('Times','Helvetica','Courier')
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setFontType($fontname = null);

    // --------------------------------------------------------------------------

    /**
     * Append the HTML content.
     *
     * @param string $str  A string data used for render
     *
     * @return PdfInterface
     *
     * @api
     */
    public function appendPageContent($str);

    // --------------------------------------------------------------------------

    /**
     * Render the PDF to output.
     *
     * @return PdfInterface
     *
     * @api
     */
    public function render();

    // --------------------------------------------------------------------------

    /**
     * Set the default font size.
     *
     * @param int $size  A font size (pt.)
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setFontSize($size);

    // --------------------------------------------------------------------------

    /**
     * Set the top page margin.
     *
     * @param int $marginTop  A top page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginTop($marginTop);

    // --------------------------------------------------------------------------

    /**
     * Set the right page margin.
     *
     * @param int $marginRight  A right page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginRight($marginRight);

    // --------------------------------------------------------------------------

    /**
     * Set the bottom page margin.
     *
     * @param int $marginBottom  A bottom page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginBottom($marginBottom);

    // --------------------------------------------------------------------------

    /**
     * Set the left page margin.
     *
     * @param int $marginLeft  A left page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginLeft($marginLeft);

    // --------------------------------------------------------------------------

    /**
     * Set the header page margin.
     *
     * @param int $marginHeader  A header page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginHeader($marginHeader);

    // --------------------------------------------------------------------------

    /**
     * Set the footer page margin.
     *
     * @param int $marginFooter  A footer page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMarginFooter($marginFooter);

    // --------------------------------------------------------------------------

    /**
     * Set the page margins.
     *
     * @param int $marginTop     A top page margin
     * @param int $marginRight   A right page margin
     * @param int $marginBottom  A bottom page margin
     * @param int $marginLeft    A left page margin
     * @param int $marginHeader  A header page margin
     * @param int $marginFooter  A footer page margin
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setMargins(array $setting);

    // --------------------------------------------------------------------------

    /**
     * Set the page size.
     *
     * @param string $format  A page format type ['Letter','Legal', etc.]
     *
     * @return PdfInterface
     *
     * @api
     */
    public function setPageSize($pageSize);

    // --------------------------------------------------------------------------

    /**
     * Append a CSS style.
     *
     * @param string $str  A string data used for render
     *
     * @return PdfInterface
     *
     * @api
     */
    public function appendPageCSS($str);
}

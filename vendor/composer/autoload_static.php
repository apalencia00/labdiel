<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit313e8e702b379131deb17253a6f9142a
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'UCSDMath\\Pdf\\' => 13,
            'UCSDMath\\Functions\\' => 19,
            'UCSDMath\\DependencyInjection\\' => 29,
            'UCSDMath\\Configuration\\' => 23,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'UCSDMath\\Pdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/ucsdmath/pdf/src/Pdf',
        ),
        'UCSDMath\\Functions\\' => 
        array (
            0 => __DIR__ . '/..' . '/ucsdmath/functions/src/Functions',
        ),
        'UCSDMath\\DependencyInjection\\' => 
        array (
            0 => __DIR__ . '/..' . '/ucsdmath/dependency-injection/src/DependencyInjection',
        ),
        'UCSDMath\\Configuration\\' => 
        array (
            0 => __DIR__ . '/..' . '/ucsdmath/configuration/src/Configuration',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Smalot\\PdfParser\\' => 
            array (
                0 => __DIR__ . '/..' . '/smalot/pdfparser/src',
            ),
        ),
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'CGIF' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFCOLORTABLE' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFFILEHEADER' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFIMAGE' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFIMAGEHEADER' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFLZW' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'Datamatrix' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
        'INDIC' => __DIR__ . '/..' . '/mpdf/mpdf/classes/indic.php',
        'MYANMAR' => __DIR__ . '/..' . '/mpdf/mpdf/classes/myanmar.php',
        'OTLdump' => __DIR__ . '/..' . '/mpdf/mpdf/classes/otl_dump.php',
        'PDF417' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
        'PDFBarcode' => __DIR__ . '/..' . '/mpdf/mpdf/classes/barcode.php',
        'QRcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
        'SEA' => __DIR__ . '/..' . '/mpdf/mpdf/classes/sea.php',
        'SVG' => __DIR__ . '/..' . '/mpdf/mpdf/classes/svg.php',
        'TCPDF' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf.php',
        'TCPDF2DBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
        'TCPDFBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
        'TCPDF_COLORS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
        'TCPDF_FILTERS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
        'TCPDF_FONTS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
        'TCPDF_FONT_DATA' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
        'TCPDF_IMAGES' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_images.php',
        'TCPDF_IMPORT' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_import.php',
        'TCPDF_PARSER' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_parser.php',
        'TCPDF_STATIC' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_static.php',
        'TTFontFile' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ttfontsuni.php',
        'TTFontFile_Analysis' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ttfontsuni_analysis.php',
        'UCDN' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ucdn.php',
        'XMLSchema' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.xmlschema.php',
        'bmp' => __DIR__ . '/..' . '/mpdf/mpdf/classes/bmp.php',
        'cssmgr' => __DIR__ . '/..' . '/mpdf/mpdf/classes/cssmgr.php',
        'directw' => __DIR__ . '/..' . '/mpdf/mpdf/classes/directw.php',
        'grad' => __DIR__ . '/..' . '/mpdf/mpdf/classes/grad.php',
        'mPDF' => __DIR__ . '/..' . '/mpdf/mpdf/mpdf.php',
        'meter' => __DIR__ . '/..' . '/mpdf/mpdf/classes/meter.php',
        'mpdfform' => __DIR__ . '/..' . '/mpdf/mpdf/classes/mpdfform.php',
        'nusoap_base' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.nusoap_base.php',
        'nusoap_client' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soapclient.php',
        'nusoap_client_mime' => __DIR__ . '/..' . '/fergusean/nusoap/lib/nusoapmime.php',
        'nusoap_fault' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_fault.php',
        'nusoap_parser' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_parser.php',
        'nusoap_server' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_server.php',
        'nusoap_server_mime' => __DIR__ . '/..' . '/fergusean/nusoap/lib/nusoapmime.php',
        'nusoap_wsdlcache' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.wsdlcache.php',
        'nusoap_xmlschema' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.xmlschema.php',
        'nusoapservermime' => __DIR__ . '/..' . '/fergusean/nusoap/lib/nusoapmime.php',
        'otl' => __DIR__ . '/..' . '/mpdf/mpdf/classes/otl.php',
        'soap_fault' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_fault.php',
        'soap_parser' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_parser.php',
        'soap_server' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_server.php',
        'soap_transport_http' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_transport_http.php',
        'soapclient' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soapclient.php',
        'soapclientmime' => __DIR__ . '/..' . '/fergusean/nusoap/lib/nusoapmime.php',
        'soapval' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.soap_val.php',
        'tocontents' => __DIR__ . '/..' . '/mpdf/mpdf/classes/tocontents.php',
        'wmf' => __DIR__ . '/..' . '/mpdf/mpdf/classes/wmf.php',
        'wsdl' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.wsdl.php',
        'wsdlcache' => __DIR__ . '/..' . '/fergusean/nusoap/lib/class.wsdlcache.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit313e8e702b379131deb17253a6f9142a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit313e8e702b379131deb17253a6f9142a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit313e8e702b379131deb17253a6f9142a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit313e8e702b379131deb17253a6f9142a::$classMap;

        }, null, ClassLoader::class);
    }
}

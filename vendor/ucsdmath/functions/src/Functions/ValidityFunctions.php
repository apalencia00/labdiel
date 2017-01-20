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
 * ValidityFunctions is the default implementation of {@link ValidityFunctionsInterface} which
 * provides routine service-functions methods that are commonly used throughout the framework.
 *
 * use UCSDMath\Functions\ValidityFunctions;
 *
 * Method list:
 *
 * @method array getWeekdays();
 * @method boolean isValidIP($ip);
 * @method boolean isAlpha($value);
 * @method boolean isValidIP4($ip);
 * @method boolean isValidIP6($ip);
 * @method string getPostalStates();
 * @method boolean isValidMd5($hash);
 * @method boolean isZipcode($value);
 * @method array getCalendarMonths();
 * @method string cleanCurlies($str);
 * @method boolean getBoolean($value);
 * @method boolean isValidSHA1($hash);
 * @method boolean isValidURL($value);
 * @method string stripNonAlpha($str);
 * @method string getMySQLTimestamp();
 * @method string seoFriendlyUrl($str);
 * @method string stripNonNumeric($str);
 * @method boolean isMinimumPHPVersion();
 * @method array trimArray(array $array);
 * @method boolean isPostalState($value);
 * @method boolean isAlphaNumeric($value);
 * @method boolean isValidMacAddress($str);
 * @method string sanitizeDigitCommas($str);
 * @method boolean isValidIP4NoPrivate($ip);
 * @method boolean isValidIP6NoPrivate($ip);
 * @method string sanitizeAlphaNumeric($str);
 * @method string getFileExtension($filename);
 * @method boolean utf8Compliant($str = null);
 * @method string stripExcessWhitespace($str);
 * @method boolean isValidDate($datetime, $format = 'Y-m-d H:i:s');
 * @method string createHashFileName($filename, $extension = '.php');
 *
 * ValidityFunctions provides a common set of implementations where needed. The ValidityFunctions
 * trait and the ValidityFunctionsInterface should be paired together.
 *
 * Here is an example of how you should be able to use it:
 *
 *    <?php
 *
 *    namespace UCSDMath\Blog;
 *
 *    use UCSDMath\Functions\ValidityFunctions;
 *    use UCSDMath\Functions\ValidityFunctionsInterface;
 *
 *    /**
 *     * The Sftp class with trait methods and the interfaces added.
 *     * /
 *    class Sftp extends AbstractSftpAdapter implements SftpInterface, ValidityFunctionsInterface
 *    {
 *        /**
 *         * Properties.
 *         * /
 *        protected $host = 'math.ucsd.edu';
 *
 *        /**
 *         * Adding our Trait within this class.
 *         * /
 *        use ValidityFunctions;
 *
 *        /**
 *         * General use.
 *         * /
 *        public function getHost()
 *        {
 *            return $this->getProperty('host');
 *        }
 *     }
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
trait ValidityFunctions
{
    /**
     * Constants for use in traits can be defined in the interface.
     */

    // --------------------------------------------------------------------------

    /**
     * Properties.
     */

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getBoolean($value)
    {
        /**
         * Returns true for: '1', 'true', 'on', 'yes'.
         */
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function seoFriendlyUrl($str)
    {
        /* Lower case everything */
        $str = strtolower($str);

        /* Make alphanumeric (removes all other characters) */
        $str = preg_replace('/[^a-z0-9_\s-]/', '', $str);

        /* Clean up multiple dashes or whitespaces */
        $str = preg_replace('/[\s-]+/', ' ', $str);

        /* Convert whitespaces and underscore to dash */
        $str = preg_replace('/[\s_]/', '-', $str);

        return $str;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function sanitizeDigitCommas($str)
    {
        return preg_replace('/[^\d,]+$/', '', $str);
    }

    // --------------------------------------------------------------------------

    /**
     * Return the days of the week
     *
     * @return array
     */
    public function getWeekdays()
    {
        return [
            0 => ['Sun','Sunday'],
            1 => ['Mon','Monday'],
            2 => ['Tues','Tuesday'],
            3 => ['Wed','Wednesday'],
            4 => ['Thurs','Thursday'],
            5 => ['Fri','Friday'],
            6 => ['Sat','Saturday']
        ];
    }

    // --------------------------------------------------------------------------

    /**
     * Basic IP validation
     *
     * @param string $ip  A ip address
     *
     * return bool
     */
    public function isValidIP($ip)
    {
        return (bool) filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE);
    }

    // --------------------------------------------------------------------------

    /**
     * Validate only alphabetic characters
     *
     * @param string $value The input parameter
     *
     * @return bool
     */
    public function isAlpha($value)
    {
        return (bool) preg_match('/^[a-z]+$/i', $value);
    }

    // --------------------------------------------------------------------------

    /**
     * Basic IP4 validation, private and reserved ranges.
     *
     * @param string $ip The ip address
     *
     * return bool
     */
    public function isValidIP4($ip)
    {
        return (bool) filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_RES_RANGE);
    }

    // --------------------------------------------------------------------------

    /**
     * Basic IP6 validation
     *
     * @param string $ip The ip address
     *
     * return bool
     */
    public function isValidIP6($ip)
    {
        return (bool) filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 | FILTER_FLAG_NO_RES_RANGE);
    }

    // --------------------------------------------------------------------------

    /**
     * Basic MD5 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * return bool
     */
    public function isValidMd5($hash)
    {
        return (bool) preg_match('/^[a-fA-F\d]{32}$/', $hash);
    }

    // --------------------------------------------------------------------------

    /**
     * Validate a postal zipcode
     *
     * @param string $value The zipcode parameter
     *
     * @return bool
     */
    public function isZipcode($value)
    {
        return (bool) preg_match('/^\d{5}(-\d{4})?$/', $value);
    }

    // --------------------------------------------------------------------------

    /**
     * Return US State names
     *
     * @return string
     */
    public static function getPostalStates()
    {
        return [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];
    }

    // --------------------------------------------------------------------------

    /**
     * Basic SHA-1 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * return bool
     */
    public function isValidSHA1($hash)
    {
        return (bool) preg_match('/^[a-fA-F\d]{40}$/', $hash);
    }

    // --------------------------------------------------------------------------

    /**
     * Validate a URL address
     *
     * @param string $value The URL parameter
     *
     * return bool
     */
    public function isValidURL($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    // --------------------------------------------------------------------------

    /**
     * Get the file extention
     *
     * @param string $filename A file name
     *
     * return string
     */
    public function getFileExtension($filename)
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }

    // --------------------------------------------------------------------------

    /**
     * Return the months of the year
     *
     * @return array
     */
    public function getCalendarMonths()
    {
        return [
             1 => ['Jan','January'],
             2 => ['Feb','February'],
             3 => ['Mar','March'],
             4 => ['Apr','April'],
             5 => ['May','May'],
             6 => ['June','June'],
             7 => ['July','July'],
             8 => ['Aug','August'],
             9 => ['Sept','September'],
            10 => ['Oct','October'],
            11 => ['Nov','November'],
            12 => ['Dec','December']
        ];
    }

    // --------------------------------------------------------------------------

    /**
     * PHP Version check
     *
     * @return bool
     */
    public static function isMinimumPHPVersion()
    {
        return version_compare(PHP_VERSION, static::REQUIRED_PHP_VERSION, '>=');
    }

    // --------------------------------------------------------------------------

    /**
     * Clean curly quotes (Replace UTF-8, Windows-1252 curly quotes characters).
     *
     * Replace all instances of smart quotes, the en dash, em dash, and
     * ellipsis with straight quotes, one or two dashes, or three dots.
     *
     * @param  string $str  A string to strip curly quotes
     *
     * @return string
     *
     * @api
     */
    public function cleanCurlies($str)
    {
        $curlyQuotes = [
            'UTF8' => ["\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"],
            "Windows1252" => [chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)],
            "clean" => ["'", "'", '"', '"', '-', '--', '...']
        ];

        return str_replace(
            [
                $curlyQuotes['UTF8'],
                $curlyQuotes['Windows1252']
            ],
            [
                $curlyQuotes['clean'],
                $curlyQuotes['clean']
            ],
            $str
        );
    }

    // --------------------------------------------------------------------------

    /**
     * Validate only alphabetic numeric characters
     *
     * @param string $value The input parameter
     *
     * @return bool
     */
    public function isAlphaNumeric($value)
    {
        return (bool) preg_match('/^[a-z\d]+$/i', $value);
    }

    // --------------------------------------------------------------------------

    /**
     * Applies a given callback to every value of an array
     * and returns the results as a new array
     *
     * @param  array $array  A associated array
     *
     * @return array
     *
     * @api
     */
    public function trimArray(array $array)
    {
        return (array_map('trim', $array));
    }

    // --------------------------------------------------------------------------

    /**
     * Basic IP4 validation; exclude private range.
     *
     * @param string $ip The ip address
     *
     * @return bool
     */
    public function isValidIP4NoPrivate($ip)
    {
        return (bool) filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4
            | FILTER_FLAG_NO_PRIV_RANGE
            | FILTER_FLAG_NO_RES_RANGE
        );
    }

    // --------------------------------------------------------------------------

    /**
     * Basic IP6 validation, private and reserved ranges.
     *
     * @param string $ip The ip address
     *
     * @return bool
     */
    public function isValidIP6NoPrivate($ip)
    {
        return (bool) filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV6
            | FILTER_FLAG_NO_PRIV_RANGE
            | FILTER_FLAG_NO_RES_RANGE
        );
    }

    // --------------------------------------------------------------------------

    /**
     * utf8_compliant()
     *
     * Test whether a string complies as UTF-8. This will be much faster than
     * utf8_is_valid but will pass five and six octet UTF-8 sequences, which
     * are not supported by Unicode and so cannot be displayed correctly in
     * a browser. In other words it is not as strict as utf8_is_valid but
     * it's faster. If you use is to validate user input, you place yourself
     * at the risk that attackers will be able to inject 5 and 6 byte sequences
     * (which may or may not be a significant risk, depending on your application)
     *
     * @param  string $str  A UTF-8 string to check
     *
     * @return bool true if string is valid UTF-8
     */
    public function utf8Compliant($str = null)
    {
        if (0 === mb_strlen($str, 'UTF-8')) {
            return true;
        }

        /**
         * If even the first character can be matched, when the /u modifier is used,
         * then it's valid UTF-8. If the UTF-8 is somehow invalid, nothing at all
         * will match, even if the string contains some valid sequences.
         */
        return (1 === preg_match('/^.{1}/us', $str, $ar));
    }

    // --------------------------------------------------------------------------

    /**
     * Validation Postal State Address
     *
     * @param string $value  A state abbreviation whitelist (e.g., CA, AZ, TX)
     *
     * @return bool
     */
    public static function isPostalState($value)
    {
        $states = array_keys($this->getPostalStateList());

        return in_array(strtoupper(trim($value)), $states) !== false;
    }

    // --------------------------------------------------------------------------

    /**
     * Check the format and the validity of a date
     *
     * @param string $date   The date or timestamp
     * @param string $format The format
     *
     * @return bool
     *
     * @api
     */
    public function isValidDate($datetime, $format = 'Y-m-d H:i:s')
    {
        $d = \DateTime::createFromFormat($format, $datetime);
        return $d && $d->format($format) === $datetime;
    }

    // --------------------------------------------------------------------------

    /**
     * Generate a hash file name
     *
     * @param  array  $filename   A file name or key
     * @param  string $extension  A file extension
     *
     * @return string  A hash filename
     *
     * @api
     */
    public function createHashFileName($filename, $extension = '.php')
    {
        return sprintf('%s%s', hash('sha256', $filename, false), $extension);
    }

    // --------------------------------------------------------------------------

    /**
     * Sanitize alphanumeric string.
     *
     * @param  string $str  A string to filter
     *
     * @return string
     *
     * @api
     */
    public function sanitizeAlphaNumeric($str)
    {
        return preg_replace('/[^a-z\d]/i', '', $str);
    }

    // --------------------------------------------------------------------------

    /**
     * Remove all characters except numbers.
     *
     * @param  string $str  A input string
     *
     * @return string
     */
    public function stripNonNumeric($str)
    {
        return preg_replace('/[^0-9]/', '', $str);
    }

    // --------------------------------------------------------------------------

    /**
     * Remove all characters except letters.
     *
     * @param  string $str  A input string
     *
     * @return string
     */
    public function stripNonAlpha($str)
    {
        return preg_replace('/[^a-z]/i', '', $str);
    }

    // --------------------------------------------------------------------------

    /**
     * Transform two or more spaces into just one space.
     *
     * @param  string $str  A input string
     *
     * @return string
     */
    public function stripExcessWhitespace($str)
    {
        return preg_replace('/  +/', ' ', $str);
    }

    // --------------------------------------------------------------------------

    /**
     * Validate a valid MAC Address (LAN/network).
     *
     * @throws \InvalidArgumentException on non string value for $str
     * @param  string $str  A MAC address
     *
     * @return bool
     */
    public function isValidMacAddress($str)
    {
        return (preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $str) === 1);
    }

    // --------------------------------------------------------------------------

    /**
     * Return a current MySQL timestamp.
     *
     * @return string  A MySQL datetime (e.g., 2015-12-05 07:09:08)
     */
    public function getMySQLTimestamp()
    {
        return Carbon::now();
    }
}

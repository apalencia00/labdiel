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

/**
 * AbstractFunctions provides an abstract base class implementation of {@link FunctionsInterface}.
 * Primarily, this services the fundamental implementations for all Functions classes.
 *
 * This component library is used to service common routines not found in other services.
 *
 * Method list:
 *
 * @method FunctionsInterface __construct();
 * @method void __destruct();
 * @method sanitizeString($str, $min = null, $max = null);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractFunctions implements FunctionsInterface, ServiceFunctionsInterface
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
     *
     * @var    ReflectionMethod    $reflectionMethod     A ReflectionMethod instance
     * @var    ReflectionClass     $reflectionClass      A ReflectionClass instance
     * @var    ReflectionException $reflectionException  A ReflectionException instance
     * @var    array               $storageRegister      A set of validation stored data elements
     * @static FunctionsInterface  $instance             A FunctionsInterface instance
     * @static integer             $objectCount          A FunctionsInterface instance count
     */
    protected $reflectionClass = null;
    protected $reflectionMethod = null;
    protected $reflectionException = null;
    protected $storageRegister = array();
    protected $omnilockCategoryCode = [
        'Academic Student Assistant' => 'MW_',
        'Adjunct Professor'          => 'MF_',
        'Associated Office'          => 'MS_',
        'Emeriti'                    => 'ME_',
        'Faculty'                    => 'MF_',
        'Graduate Student'           => 'MG_',
        'Graduate Student (CSME MS)' => 'MCM_',
        'Postdoc'                    => 'MP_',
        'Project Scientist'          => 'MVS_',
        'Research Scientist'         => 'MVS_',
        'Research Student Assistant' => 'MW_',
        'SEW Assistant Professor'    => 'MTV_',
        'Staff Student Assistant'    => 'MS_',
        'Staff'                      => 'MS_',
        'Teaching Visitor'           => 'MTV_',
        'Visiting Graduate'          => 'MTV_',
        'Visiting Scholar'           => 'MVS_',
        'default'                    => 'MZ_'
    ];

    protected $preferredOmnilockIdCardUsed = [
        'Academic Student Assistant' => 'pid',
        'Graduate Student (CSME MS)' => 'pid',
        'Research Student Assistant' => 'pid',
        'Graduate Student'           => 'pid',
        'Staff Student Assistant'    => 'pid',
        'Visiting Graduate'          => 'pid',
        'Adjunct Professor'          => 'eid',
        'Associated Office'          => 'eid',
        'Faculty'                    => 'eid',
        'Postdoc'                    => 'eid',
        'Project Scientist'          => 'eid',
        'Research Scientist'         => 'eid',
        'SEW Assistant Professor'    => 'eid',
        'Staff'                      => 'eid',
        'Teaching Visitor'           => 'eid',
        'Emeriti'                    => 'aid',
        'Visiting Scholar'           => 'aid',
        'default'                    => 'pid'
    ];

    protected static $instance = null;
    protected static $objectCount = 0;

    // --------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
        static::$objectCount++;
    }

    // --------------------------------------------------------------------------

    /**
     * Destructor.
     *
     * @api
     */
    public function __destruct()
    {
        static::$objectCount--;
    }

    // --------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function sanitizeFloat($number)
    {
        return (float) preg_replace('/[^\d.]*/', '', $number);
    }

    // --------------------------------------------------------------------------

    /**
     * Find file path of current script
     *
     * @param string $url The url
     *
     * @return string
     *
     * @api
     */
    public static function urlDirectory($url)
    {
        /**
         * Avoid parse errors on strange query strings
         */
        if (false !== $p = strpos($url, '?')) {
            $url = substr($url, 0, $p);
        }

        $p = parse_url($url, PHP_URL_PATH);

        if ($p === '') {
            return '/';
        }

        if (substr($p, -1) === '/') {
            return $p;
        }

        if (false !== $pos = strrpos($p, '/')) {
            return substr($p, 0, $pos + 1);
        }
        return '/';
    }

    // --------------------------------------------------------------------------

    /**
     * Validate as integer.
     *
     * @param string $value  A integer to check
     * @param string $min    A minimum integer value
     * @param string $max    A maximum integer value
     *
     * @return bool
     */
    public function isInteger($value, $min = null, $max = null)
    {
        $options = array('default' => false);
        $options['min_range'] = isset($min) && is_int($min) ? $min : null;
        $options['max_range'] = isset($max) && is_int($max) ? $max : null;

        return filter_var($value, FILTER_VALIDATE_INT, $options) !== false;
    }

    // --------------------------------------------------------------------------

    /**
     * Search for a key in a multidimensional array.
     *
     * @param  string $needle   The key name to search for
     * @param  mixed  $haystack The array of key names
     *
     * @return bool
     *
     * @api
     */
    public function arrayKeyExistsR($needle, $haystack)
    {
        $result = array_key_exists($needle, $haystack);

        if ($result === true) {
            return $result;
        }

        foreach ($haystack as $item) {
            if (is_array($item)) {
                $result = arrayKeyExistsR($needle, $item);
            }

            if ($result === true) {
                return $result;
            }
        }

        return $result;
    }

    // --------------------------------------------------------------------------

    /**
     * Sanitize a string
     *
     * @param string  $str The string to sanitize
     *
     * @return string|bool  return false if not valid string
     *
     * @api
     */
    public function sanitizeString($str, $min = null, $max = null)
    {
        /**
         * no piping, passing possible environment variables ($),
         * seperate commands, nested execution, file redirection,
         * background processing, special commands (backspace, etc.), quotes
         * newlines, or some other special characters
         *
         * Example: $firstname = sanitizeString($request->get('firstname'), 2, 44);
         */
        $pattern = '/(;|\||`|>|<|&|^|"|' . "\n|\r|'" . '|{|}|[|]|\)|\()/i';
        $str  = preg_replace($pattern, '', $str);

        /* Ensuring only one argument */
        $str  = preg_replace('/\$/', '\\\$', $str);

        if ($this->isValidStringLength($str, $min, $max)) {
            return $str;
        }

        return false;
    }

    // --------------------------------------------------------------------------

    /**
     * Checking string length, max and minimum
     *
     * @param string   $str  A string to check
     * @param integer  $min  A minimum string size
     * @param integer  $max  A maximum string size
     *
     * @return bool
     *
     * @api
     */
    public function isValidStringLength($str, $min = null, $max = null)
    {
        $len = mb_strlen($str, 'UTF-8');

        return (($min !== null) && ($len >= $min)) || (($max !== null) && ($len <= $max));
    }

    // --------------------------------------------------------------------------

    /**
     * Sanitize an integer
     *
     * @param  integer $number The number to filter
     *
     * @return integer
     *
     * @api
     */
    public function sanitizeInteger($number, $min = null, $max = null)
    {
        /**
         * Only integers
         */
        $int = (int) preg_replace('/[^\d]+/', '', $number);

        /**
         * Checking range
         */
        if (((null !== $min) && ($int < $min)) || ((null !== $max) && ($int > $max))) {
            return false;
        }

        return $int;
    }

    // --------------------------------------------------------------------------

    /**
     * Generate options for <select> via array.
     *
     * @param array  $valueList  A selected value list array
     * @param string $selection  A selection option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderOptionsDrop(array $valueList, $selection = null)
    {
        /**
         * Initialize.
         */
        $droplist = '';
        $line     = '&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;';

        foreach ($valueList['options'] as $k) {
            $theDisplayValue = trim($k) !== '' ? trim($k) : '&nbsp;' ;

            if ('-' === $k) {
                $droplist .= '<option value="-" disabled="disabled">'.$line.'</option>'."\n";

            } elseif ($selection === $k) {
                $droplist .= '<option value="'.$k.'" selected="selected">'.$theDisplayValue.'</option>'."\n";

            } elseif (($selection === null || trim($selection) === '') && ($valueList['default'] === $k)) {
                $droplist .= '<option value="'.$valueList['default'].'" selected="selected">'.$valueList['default'].'</option>'."\n";

            } else {
                $droplist .= '<option value="'.$k.'">'.$theDisplayValue.'</option>'."\n";
            }
        }

        if (true === $valueList['is_editable']) {
            $droplist .= '<option value="-" disabled="disabled">'.$line.'</option>'."\n";
            $droplist .= '<option value="edit">Edit...</option>'."\n";
        }

        return $droplist;
    }

    // --------------------------------------------------------------------------

    /**
     * Generate options for <select> via associative array.
     *
     * @param array  $valueList  A selected value list
     * @param string $selection  A selection option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderOptionsDropArray(array $valueList, $selection = null)
    {
        /**
         * Initialize.
         */
        $droplist = '';
        $line = '&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;';

        foreach ($valueList as $k => $v) {
            $theDisplayValue = 'edit' === strtolower($k) ? 'Edit...' : $v ;

            if ('-' === $k) {
                $droplist .= '<option value="-" disabled="disabled">'.$line.'</option>'."\n";

            } elseif ($selection === $k) {
                $droplist .= '<option value="'.$k.'" selected="selected">'.$theDisplayValue.'</option>'."\n";

            } else {
                $droplist .= '<option value="'.$k.'">'.$theDisplayValue.'</option>'."\n";
            }
        }

        return $droplist;
    }

    // --------------------------------------------------------------------------

    /**
     * Generate degree options for <select>
     *
     * @param  array  $options    A selected options
     * @param  string $selection  A selection option in the array
     * @param  string $pad        A space indented setting
     *
     * @return string
     *
     * @api
     */
    public function renderDegreeOptionsDrop(array $options, $selection = null, $pad = 28)
    {
        /**
         * Setup Degree Options
         */
        $pad = str_repeat(chr(32), $pad);

        $droplist =
            (!isset($selection) || $selection === "" || $selection === "-")
            ? sprintf("<option value='-' selected='selected'>%s</option>\n%s", '&mdash;', $pad)
            : sprintf("<option value='-'>%s</option>\n%s", '&mdash;', $pad);

        foreach ($options as $k => $v) {
            $droplist .= ($selection === $k)
                ? sprintf("<option value='%s' selected='selected'>%s</option>\n%s", $k, htmlentities($v, ENT_HTML5, 'UTF-8'), $pad)
                : sprintf("<option value='%s'>%s</option>\n%s", $k, htmlentities($v, ENT_HTML5, 'UTF-8'), $pad);
        }

        return trim($droplist);
    }

    // --------------------------------------------------------------------------

    /**
     * Generate AP&M Offices options for <select>
     *
     * @param array  $options    The selected options
     * @param string $selection  The selection option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderAPMOptionsDrop(array $options, $selection = null)
    {
        $droplist = '';
        $floorLabel = [
            'AP&M B402' => '<optgroup label="Basement Floor">',
            'AP&M 2313' => '</optgroup><optgroup label="2nd Floor">',
            'AP&M 5016' => '</optgroup><optgroup label="5th Floor">',
            'AP&M 6016' => '</optgroup><optgroup label="6th Floor">',
            'AP&M 7016' => '</optgroup><optgroup label="7th Floor">'
        ];

        $labels = array_keys($floorLabel);

        foreach ($options as $k => $v) {

            $droplist .= in_array($labels, $k) ? $v : null;

            $droplist .= ($k === $selection)
                ? '<option value="'.$k.'" selected>'.htmlentities($v, ENT_HTML5, 'UTF-8').'</option>'
                : '<option value="'.$k.'">'.htmlentities($v, ENT_HTML5, 'UTF-8').'</option>';

            $droplist .= ($k === 'AP&M 7456') ? '</optgroup>' : null ;
        }

        return $droplist;
    }

    // --------------------------------------------------------------------------

    /**
     * Parameter type check
     *
     * @param mixed  $param The input parameter
     * @param string $type  The type of parameter [bool, float, int, string, array, object]
     *
     * @return bool
     *
     * @api
     */
    public function parameterTypeCheck($param, $type = 'string')
    {
        $type = 'is_'.$type;

        if (!$type($param)) {
            return false;
        }

        if (empty($param)) {
            return false;
        }

        return true;
    }

    // --------------------------------------------------------------------------

    /**
     * Format a phone number to a set mask.
     *
     * @param  string $phone   A phone number to format
     * @param  string $format  A format pattern or mask
     *
     * @return string
     */
    public function formatPhone($phone, $format = '(###) ###-####')
    {
        /**
         * Remove all characters except numbers
         */
        $phone  = $this->stripNonNumeric($phone);
        $length = strlen($phone);
        $phoneFormat = '';

        if (7 === $length && 1 === substr_count($format, '-')) {
            /* mask: ###-#### */
            $phoneFormat = preg_replace('/([0-9]{3})([0-9]{4})/', '$1-$2', $phone);

        } elseif (10 === $length && 1 === substr_count($format, '(###)')) {
            /* mask: (###) ###-#### */
            $phoneFormat = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $phone);

        } elseif (10 === $length && 2 === substr_count($format, '-')) {
            /* mask: ###-###-#### */
            $phoneFormat = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '$1-$2-$3', $phone);

        } else {
            /* numbers only: ########## */
            $phoneFormat = $phone;
        }

        return $phoneFormat;
    }

    // --------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted EID number.
     *
     * @throws \InvalidArgumentException on non string value for $employeeID
     * @param  string $employeeID  A employee id number
     * @param  string $format      A format pattern or mask
     *
     * @return string  A formatted UCSD EID number
     */
    public function formatEID($employeeID, $format = '#########')
    {
        /* Create a integer out of the string */
        $employeeID = (int) $this->stripNonNumeric($employeeID) * 1;
        $length     = strlen($format);

        /* returns EID (e.g., 000085225) */
        return str_pad($employeeID, $length, '0', STR_PAD_LEFT);
    }

    // --------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted PID number (Teaching Faculty, Students).
     *
     * @throws \InvalidArgumentException on non string value for $employeeID
     * @param  string $personalID  A id number for enforcing a mask
     * @param  string $format      A format pattern or mask
     *
     * @return string  A formatted UCSD EID number
     */
    public function formatPID($personalID, $format = 'A########')
    {
        /* Create a integer out of the string */
        $personalID = (int) $this->stripNonNumeric($personalID) * 1;
        $preset     = preg_replace("/[^a-zA-Z]/", '', $format);
        $length     = strlen($format) - strlen($preset);

        /* returns PID (e.g., A00085225) */
        return ($preset . str_pad($personalID, $length, '0', STR_PAD_LEFT));
    }

    // --------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted AID number (Emeritus, others).
     *
     * @throws \InvalidArgumentException on non string value for $employeeID
     * @param  string $affiliateID  A id number for enforcing a mask
     * @param  string $format       A format pattern or mask
     *
     * @return string  A formatted UCSD AID number
     */
    public function formatAID($affiliateID, $format = '#########')
    {
        /* Create a integer out of the string */
        $affiliateID = (int) $this->stripNonNumeric($affiliateID) * 1;
        $length      = strlen($format);

        /* returns AID (e.g., 990085225) */
        return str_pad($affiliateID, $length, '0', STR_PAD_LEFT);
    }

    // --------------------------------------------------------------------------

    /**
     * Add or replace MAC address delimiters/separators.
     *
     * @throws \InvalidArgumentException on non string value for $str
     * @param  string $str        A MAC address
     * @param  string $separator  A delimiter
     *
     * @return string  A MAC addres with delimiter/separator [':','-']
     */
    public function addMacAddressSeparator($str, $separator = ':')
    {
        $str = preg_replace('/[^a-f0-9]/i', '', $str);

        return join($separator, str_split($str, 2));
    }

    // --------------------------------------------------------------------------

    /**
     * Returns a single CSV record for the OMNILOCK System.
     *
     * Provides record-level Omnilock formatting for group access.
     * Notes on Configuration Settings:
     *
     * Each group in the Personnel DB has a 'primary' magstripe card
     * to enter the building during weekends, after hours, or holidays.
     *
     * The primary card types for the groups are:
     *
     *    + Employee ID     _eid   000232555
     *    + Personal ID     _pid   A00232555
     *    + Affiliated ID   _aid   991007227
     *
     * Category codes will be used to help group the OMNILOCK records.
     * The 'default' primary category for Mathematics is the letter "M".
     * Other departments in AP&M will use a different letter.
     *
     * Sub-category codes (e.g., F, E, G, S, V, W) will also be used to
     * organize MATH internal groups. Including the 'default' category,
     * these groups are ordered as such:
     *
     *    + MF_  Faculty
     *    + ME_  Emeriti
     *    + MG_  Graduate Student, Graduate Student (CSME MS)
     *    + MS_  Staff, Associated Office
     *    + MV_  Teaching Visitor, SEW Assistant Professor, Postdoc,
     *           Adjunct Professor, Project Scientist, Research Scientist,
     *           Visiting Graduate, Visiting Scholar
     *    + MW_  Academic Student Assistant, Research Student Assistant
     *
     * The OMNILOCK cards used by the specific groups are:
     *
     *    GROUP                           CARD      SORTED-BY
     *    -----------------------------  -------   -----------
     *    + Academic Student Assistant    _pid        MW_
     *    + Adjunct Professor             _eid        MF_
     *    + Associated Office             _eid        MS_
     *    + Emeriti                       _aid        ME_
     *    + Faculty                       _eid        MF_
     *    + Graduate Student              _pid        MG_
     *    + Graduate Student (CSME MS)    _pid        MCM_
     *    + Postdoc                       _eid        MP_
     *    + Project Scientist             _eid        MVS_
     *    + Research Scientist            _eid        MVS_
     *    + Research Student Assistant    _pid        MW_
     *    + SEW Assistant Professor       _eid        MP_
     *    + Staff                         _eid        MS_
     *    + Staff Student Assistant       _pid        MS_
     *    + Teaching Visitor              _eid        MTV_
     *    + Visiting Graduate             _aid        MVG_
     *    + Visiting Scholar              _aid        MVS_
     *
     * Example output:
     *
     *    + ME_FitzGerald,Carl,91007227
     *    + MF_Bank,Randolph,00037308
     *    + MG_Aisenberg,James,50063379
     *    + MS_Richards,Diane,00696466
     *    + MTV_Puha,Amber,00675277
     *
     * Please note that this CSV file has structural limitations for each field:
     *    + Last Name    -- 20 characters
     *    + First Name   -- 20 characters
     *    + Access Code  --  8 characters
     *
     * Note that the Last Name field also includes the "Sub-category codes" (e.g., MF_, ME_, etc.).
     * So, the lastname will be limited to 17 characters (or 20 characters minus 3) to include these
     * "Sub-category codes" to the lastname field.
     *
     * @param array $identity  A array of data specific to Omnilock.
     *
     * @return string  A omnilock record
     */
    public function getOmnilockFormat(array $identity)
    {
        return (
            substr($this->getOmnilockSubCategoryCode($identity).trim($identity['lastname']), 0, 20).','.
            substr(trim($identity['firstname']), 0, 20).','.
            $this->getOmnilockFormatCardType($identity)."\n"
        );
    }

    // --------------------------------------------------------------------------

    /**
     * Provide a subcategory code for Mathematic's Omnilocks.
     *
     * @param array $identity  A array of data specific to Omnilock.
     *
     * @return string  A omnilock subcategory group
     */
    protected function getOmnilockSubCategoryCode(array $identity)
    {
        return in_array($identity['group'], array_keys($this->omnilockCategoryCode))
            ? $this->omnilockCategoryCode[$identity['group']]
            : $this->omnilockCategoryCode['default'];
    }

    // --------------------------------------------------------------------------

    /**
     * Provide Omnilock id formatting.
     *
     * @param array $identity  A array of data specific to Omnilock.
     *
     * @return string  A omnilock formatted id
     */
    protected function getOmnilockFormatCardType(array $identity)
    {
        /**
         * A special rule made for our Visiting Graduates for Omnilocks.
         * Use the PID. However, if no PID is available, use the AID.
         */
        $identity['pid'] =
            $identity['group'] === 'Visiting Graduate' || trim($identity['pid']) === ''
            ? $identity['aid']
            : $identity['pid'];

        $omniCardUsed = in_array($identity['group'], array_keys($this->preferredOmnilockIdCardUsed))
            ? $this->preferredOmnilockIdCardUsed[$identity['group']]
            : 0 ;

        return sprintf('%08d', preg_replace('/\D/', '', (int) $identity[$omniCardUsed]) * 1);
    }

    // --------------------------------------------------------------------------

    /**
     * Return a correctly formatted UCSD office location.
     *
     * @throws \InvalidArgumentException on non string value for $office
     * @param  string $office  A office location.
     *
     * @return string  A formatted office location
     */
    public function formatOfficeLocation($office)
    {
        $office = strtoupper(trim($office));

        /* return the last character in uppercase (AP&M 5880c <=> 'C') */
        $rightAlpha = preg_replace('/[^A-Z]/', '', substr($office, -1));

        /* return the office numbers */
        $numbersOnly = substr('0000'.(preg_replace('/\D/', '', $office) * 1), -4);

        /* return the office alpha parts */
        $alpha = preg_replace('/[^A-Za-z&]/', '', $office);

        /* return the subcategory code */
        switch ($office) {
            case '':
                $returnOffice = 'None';
                break;
            case 'NONE':
                $returnOffice = 'None';
                break;
            case ($numbersOnly === '0402'):
                $returnOffice = 'AP&M B402';
                break;
            case ($numbersOnly === '0412'):
                $returnOffice = 'AP&M B412';
                break;
            case (substr_count($office, 'APM') > 0):
                $returnOffice = 'AP&M '.$numbersOnly.$rightAlpha;
                break;
            case (substr_count($office, 'AP&M') > 0):
                $returnOffice = 'AP&M '.$numbersOnly.$rightAlpha;
                break;
            case (strlen($office) < 6):
                $returnOffice = 'AP&M '.$numbersOnly.$rightAlpha;
                break;
            default:
                $returnOffice = $office;
                break;
        }

        return $returnOffice;
    }

    // --------------------------------------------------------------------------

    /**
     * Recursive version of array_key_exists.
     *
     * The PHP funcction 'array_key_exists' does NOT work recursively, so this
     * can be used to find a key nested in a multidimensional array.
     * Another option is to use the 'array_walk_recursive' function since PHP 5.3.
     *
     * @param  string $needle    A search string
     * @param  array  $haystack  A space indented setting
     *
     * @return string  A set of formatted <link> stylesheet tags
     *
     * @throws \InvalidArgumentException if the property name is not defined
     *
     * @api
     */
    public function arrayKeyExistsRecursive($needle, array $haystack)
    {
        $result = array_key_exists($needle, $haystack);

        if ($result) {
            return $result;
        }

        foreach ($haystack as $v) {
            if (is_array($v)) {
                $result = arrayKeyExistsRecursive($needle, $v);
            }

            if ($result) {
                return $result;
            }
        }

        return $result;
    }

    // --------------------------------------------------------------------------

    /**
     * A parser for title delimited data.
     *
     * @param string $str        A string data used to parse
     * @param string $item       A defined title item to find
     * @param string $delimiter  A default ending delimiter
     *
     * @return string
     *
     * @api
     */
    public function getTitledItem($str, $item = null, $delimiter = ';')
    {
        if (null === $item) {
            return trim(substr(trim(substr($str, 0)), 0, $this->getStringPositionX(trim(substr($str, 0)), $delimiter, 1)));
        } else {
            return trim(substr(trim(substr($str, $this->getStringPositionX($str, $item, 1) + strlen($item))), 0, $this->getStringPositionX(trim(substr($str, $this->getStringPositionX($str, $item, 1) + strlen($item))), $delimiter, 1)));
        }
    }

    // --------------------------------------------------------------------------

    /**
     * Find the position of the Xth occurrence of a substring in a string.
     *
     * @param string $haystack  A string data used to find the occurrence
     * @param string $needle    A item occurrence to find
     * @param string $number    A number describing the offset
     *
     * @return integer
     *
     * @api
     */
    public function getStringPositionX($haystack, $needle, $number = 1)
    {
        if (1 === $number) {
            return strpos($haystack, $needle);

        } elseif (1 < $number) {
            return strpos($haystack, $needle, $this->getStringPositionX($haystack, $needle, $number - 1) + strlen($needle));
        }

        return false;
    }

    // --------------------------------------------------------------------------

    /**
     * Method implementations inserted.
     *
     * The notation below illustrates visibility: (+) @api, (-) protected or private.
     *
     * @method all();
     * @method init();
     * @method get($key);
     * @method has($key);
     * @method version();
     * @method getClassName();
     * @method getConst($key);
     * @method set($key, $value);
     * @method isString($str);
     * @method getInstanceCount();
     * @method getClassInterfaces();
     * @method __call($callback, $parameters);
     * @method getProperty($name, $key = null);
     * @method doesFunctionExist($functionName);
     * @method isStringKey($str, array $keys);
     * @method throwExceptionError(array $error);
     * @method setProperty($name, $value, $key = null);
     * @method throwInvalidArgumentExceptionError(array $error);
     */
    use ServiceFunctions;

    // --------------------------------------------------------------------------

    /**
     * Method implementations inserted.
     *
     * The notation below illustrates visibility: (+) @api, (-) protected or private.
     *
     * @method getBoolean($value);
     */
    use ValidityFunctions;

    // --------------------------------------------------------------------------

    /**
     * Method implementations inserted.
     *
     * The notation below illustrates visibility: (+) @api, (-) protected or private.
     *
     * @method getLeflersLaw($number = null);
     */
    use EasterEggFunctions;

    // --------------------------------------------------------------------------

    /**
     * Method implementations inserted.
     *
     * The notation below illustrates visibility: (+) @api, (-) protected or private.
     *
     * @method getAPMOptGroups();
     */
    use DepartmentSpecificFunctions;
}

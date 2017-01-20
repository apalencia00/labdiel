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
 * DepartmentSpecificFunctions is the default implementation of {@link DepartmentSpecificFunctionsInterface} which
 * provides routine service-functions methods that are commonly used throughout the framework.
 *
 * use UCSDMath\Functions\DepartmentSpecificFunctions;
 *
 * Method list:
 *
 * @method getCurrentQuarter();
 *
 * DepartmentSpecificFunctions provides a common set of implementations where needed. The DepartmentSpecificFunctions
 * trait and the DepartmentSpecificFunctionsInterface should be paired together.
 *
 * Here is an example of how you should be able to use it:
 *
 *    <?php
 *
 *    namespace UCSDMath\Blog;
 *
 *    use UCSDMath\Functions\DepartmentSpecificFunctions;
 *    use UCSDMath\Functions\DepartmentSpecificFunctionsInterface;
 *
 *    /**
 *     * The Sftp class with trait methods and the interfaces added.
 *     * /
 *    class Sftp extends AbstractSftpAdapter implements SftpInterface, DepartmentSpecificFunctionsInterface
 *    {
 *        /**
 *         * Properties.
 *         * /
 *        protected $host = 'math.ucsd.edu';
 *
 *        /**
 *         * Adding our Trait within this class.
 *         * /
 *        use DepartmentSpecificFunctions;
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
trait DepartmentSpecificFunctions
{
    /**
     * Constants for use in traits can be defined in the interface.
     */

    // --------------------------------------------------------------------------

    protected $officeLocations = [
        'AP&M B402' => 'AP&M B402',
            'AP&M B412' => 'AP&M B412',
            'AP&M B432' => 'AP&M B432',
            'AP&M 2313' => 'AP&M 2313',
            'AP&M 2325' => 'AP&M 2325',
            'AP&M 2402' => 'AP&M 2402',
            'AP&M 2420' => 'AP&M 2420',
            'AP&M 5016' => 'AP&M 5016',
            'AP&M 5018' => 'AP&M 5018',
            'AP&M 5101' => 'AP&M 5101',
            'AP&M 5111' => 'AP&M 5111',
            'AP&M 5121' => 'AP&M 5121',
            'AP&M 5131' => 'AP&M 5131',
            'AP&M 5132' => 'AP&M 5132',
            'AP&M 5141' => 'AP&M 5141',
            'AP&M 5151' => 'AP&M 5151',
            'AP&M 5157' => 'AP&M 5157',
            'AP&M 5161' => 'AP&M 5161',
            'AP&M 5202' => 'AP&M 5202',
            'AP&M 5210' => 'AP&M 5210',
            'AP&M 5218' => 'AP&M 5218',
            'AP&M 5220' => 'AP&M 5220',
            'AP&M 5230' => 'AP&M 5230',
            'AP&M 5240' => 'AP&M 5240',
            'AP&M 5250' => 'AP&M 5250',
            'AP&M 5256' => 'AP&M 5256',
            'AP&M 5260' => 'AP&M 5260',
            'AP&M 5301' => 'AP&M 5301',
            'AP&M 5402' => 'AP&M 5402',
            'AP&M 5412' => 'AP&M 5412',
            'AP&M 5601' => 'AP&M 5601',
            'AP&M 5701' => 'AP&M 5701',
            'AP&M 5702' => 'AP&M 5702',
            'AP&M 5707' => 'AP&M 5707',
            'AP&M 5712' => 'AP&M 5712',
            'AP&M 5715' => 'AP&M 5715',
            'AP&M 5720' => 'AP&M 5720',
            'AP&M 5723' => 'AP&M 5723',
            'AP&M 5731' => 'AP&M 5731',
            'AP&M 5739' => 'AP&M 5739',
            'AP&M 5747' => 'AP&M 5747',
            'AP&M 5748' => 'AP&M 5748',
            'AP&M 5755' => 'AP&M 5755',
            'AP&M 5760' => 'AP&M 5760',
            'AP&M 5763' => 'AP&M 5763',
            'AP&M 5768' => 'AP&M 5768',
            'AP&M 5771' => 'AP&M 5771',
            'AP&M 5801' => 'AP&M 5801',
            'AP&M 5802' => 'AP&M 5802',
            'AP&M 5804' => 'AP&M 5804',
            'AP&M 5808' => 'AP&M 5808',
            'AP&M 5816' => 'AP&M 5816',
            'AP&M 5824' => 'AP&M 5824',
            'AP&M 5829' => 'AP&M 5829',
            'AP&M 5832' => 'AP&M 5832',
            'AP&M 5839' => 'AP&M 5839',
            'AP&M 5840' => 'AP&M 5840',
            'AP&M 5848' => 'AP&M 5848',
            'AP&M 5856' => 'AP&M 5856',
            'AP&M 5864' => 'AP&M 5864',
            'AP&M 5871' => 'AP&M 5871',
            'AP&M 5872' => 'AP&M 5872',
            'AP&M 5880' => 'AP&M 5880',
            'AP&M 5880C' => 'AP&M 5880C',
            'AP&M 6016' => 'AP&M 6016',
            'AP&M 6018' => 'AP&M 6018',
            'AP&M 6101' => 'AP&M 6101',
            'AP&M 6108' => 'AP&M 6108',
            'AP&M 6111' => 'AP&M 6111',
            'AP&M 6121' => 'AP&M 6121',
            'AP&M 6131' => 'AP&M 6131',
            'AP&M 6132' => 'AP&M 6132',
            'AP&M 6141' => 'AP&M 6141',
            'AP&M 6151' => 'AP&M 6151',
            'AP&M 6157' => 'AP&M 6157',
            'AP&M 6161' => 'AP&M 6161',
            'AP&M 6202' => 'AP&M 6202',
            'AP&M 6210' => 'AP&M 6210',
            'AP&M 6218' => 'AP&M 6218',
            'AP&M 6220' => 'AP&M 6220',
            'AP&M 6230' => 'AP&M 6230',
            'AP&M 6240' => 'AP&M 6240',
            'AP&M 6250' => 'AP&M 6250',
            'AP&M 6256' => 'AP&M 6256',
            'AP&M 6260' => 'AP&M 6260',
            'AP&M 6301' => 'AP&M 6301',
            'AP&M 6303' => 'AP&M 6303',
            'AP&M 6305' => 'AP&M 6305',
            'AP&M 6307' => 'AP&M 6307',
            'AP&M 6311' => 'AP&M 6311',
            'AP&M 6321' => 'AP&M 6321',
            'AP&M 6331' => 'AP&M 6331',
            'AP&M 6333' => 'AP&M 6333',
            'AP&M 6341' => 'AP&M 6341',
            'AP&M 6343' => 'AP&M 6343',
            'AP&M 6351' => 'AP&M 6351',
            'AP&M 6353' => 'AP&M 6353',
            'AP&M 6402' => 'AP&M 6402',
            'AP&M 6414' => 'AP&M 6414',
            'AP&M 6422' => 'AP&M 6422',
            'AP&M 6432' => 'AP&M 6432',
            'AP&M 6434' => 'AP&M 6434',
            'AP&M 6436' => 'AP&M 6436',
            'AP&M 6442' => 'AP&M 6442',
            'AP&M 6444' => 'AP&M 6444',
            'AP&M 6446' => 'AP&M 6446',
            'AP&M 6452' => 'AP&M 6452',
            'AP&M 6454' => 'AP&M 6454',
            'AP&M 7016' => 'AP&M 7016',
            'AP&M 7018' => 'AP&M 7018',
            'AP&M 7101' => 'AP&M 7101',
            'AP&M 7108' => 'AP&M 7108',
            'AP&M 7121' => 'AP&M 7121',
            'AP&M 7131' => 'AP&M 7131',
            'AP&M 7132' => 'AP&M 7132',
            'AP&M 7141' => 'AP&M 7141',
            'AP&M 7151' => 'AP&M 7151',
            'AP&M 7157' => 'AP&M 7157',
            'AP&M 7161' => 'AP&M 7161',
            'AP&M 7202' => 'AP&M 7202',
            'AP&M 7210' => 'AP&M 7210',
            'AP&M 7218' => 'AP&M 7218',
            'AP&M 7220' => 'AP&M 7220',
            'AP&M 7230' => 'AP&M 7230',
            'AP&M 7240' => 'AP&M 7240',
            'AP&M 7250' => 'AP&M 7250',
            'AP&M 7256' => 'AP&M 7256',
            'AP&M 7260' => 'AP&M 7260',
            'AP&M 7301' => 'AP&M 7301',
            'AP&M 7313' => 'AP&M 7313',
            'AP&M 7319' => 'AP&M 7319',
            'AP&M 7325' => 'AP&M 7325',
            'AP&M 7331' => 'AP&M 7331',
            'AP&M 7337' => 'AP&M 7337',
            'AP&M 7343' => 'AP&M 7343',
            'AP&M 7349' => 'AP&M 7349',
            'AP&M 7355' => 'AP&M 7355',
            'AP&M 7356' => 'AP&M 7356',
            'AP&M 7402' => 'AP&M 7402',
            'AP&M 7408' => 'AP&M 7408',
            'AP&M 7409' => 'AP&M 7409',
            'AP&M 7414' => 'AP&M 7414',
            'AP&M 7420' => 'AP&M 7420',
            'AP&M 7421' => 'AP&M 7421',
            'AP&M 7426' => 'AP&M 7426',
            'AP&M 7431' => 'AP&M 7431',
            'AP&M 7432' => 'AP&M 7432',
            'AP&M 7437' => 'AP&M 7437',
            'AP&M 7438' => 'AP&M 7438',
            'AP&M 7444' => 'AP&M 7444',
            'AP&M 7450' => 'AP&M 7450',
            'AP&M 7456' => 'AP&M 7456'
        ];

    /**
     * {@inheritdoc}
     */
    public function getCurrentQuarter()
    {
        $quarter = [
             1 => 'Winter',
             2 => 'Winter',
             3 => 'Winter',
             4 => 'Spring',
             5 => 'Spring',
             6 => 'Spring',
             7 => 'Summer',
             8 => 'Summer',
             9 => 'Fall',
            10 => 'Fall',
            11 => 'Fall',
            12 => 'Fall'
        ];

        return $quarter[Carbon::now()->month];
    }

    // --------------------------------------------------------------------------

    /**
     * Return an array of degrees
     *
     * @return array
     */
    public static function getEducationDegrees()
    {
        return [
            'Ph.D.' => 'Ph.D.',
            'M.S.'  => 'M.S.',
            'M.Sc.' => 'M.Sc.',
            'M.A.'  => 'M.A.',
            'B.S.'  => 'B.S.',
            'B.Sc.' => 'B.Sc.',
            'B.A.'  => 'B.A.'
        ];
    }

    // --------------------------------------------------------------------------

    /**
     * Return math department offices
     *
     * @return array
     */
    public static function getMathOffices()
    {
        return $this->officeLocations;
    }

    // --------------------------------------------------------------------------

    /**
     * Return the OptGroup Mapping of AP&M for Mathematics
     *
     * @return string
     */
    public function getAPMOptGroups()
    {
        return [
            'AP&M B402' => 'Basement Floor',
            'AP&M 2313' => '2nd Floor',
            'AP&M 5016' => '5th Floor',
            'AP&M 6016' => '6th Floor',
            'AP&M 7016' => '7th Floor'
        ];
    }
}

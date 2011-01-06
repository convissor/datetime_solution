<?php /** @package DateTimeSolution_Test */

/**
 * Get the DateTimeSolution and DateIntervalSolution for Userland tests
 */
require_once dirname(__FILE__) . '/classes_userland.php';

/**
 * Tests the DateTime Solution's diff() method then passes the resulting
 * interval to the DateTime Solution's add()/sub() method as a double check
 *
 * Usage:  phpunit Userland_DiffTest
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Userland_DiffTest extends DateTimeSolution_Test_Abstract_Diff {
}

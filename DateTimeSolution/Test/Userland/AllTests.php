<?php /** @package DateTimeSolution_Test */

/**
 * Runs all DateTime Solution tests against the DateTime Solution's
 * functionality
 *
 * Usage:  phpunit Userland_AllTests
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Userland_AllTests {
	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('DateTime Solution Userland Tests');

		$suite->addTestSuite('DateTimeSolution_Test_Userland_AddTest');
		$suite->addTestSuite('DateTimeSolution_Test_Userland_BogusTest');
		$suite->addTestSuite('DateTimeSolution_Test_Userland_DiffTest');
		$suite->addTestSuite('DateTimeSolution_Test_Userland_ModifyTest');
		$suite->addTestSuite('DateTimeSolution_Test_Userland_SubTest');

		return $suite;
	}
}

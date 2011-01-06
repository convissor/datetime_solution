<?php /** @package DateTimeSolution_Test */

/**
 * Runs all DateTime Solution tests against PHP's native functionality
 *
 * Usage:  phpunit Native_AllTests
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Native_AllTests {
	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('DateTime Solution Native PHP Tests');

		$suite->addTestSuite('DateTimeSolution_Test_Native_AddTest');
		$suite->addTestSuite('DateTimeSolution_Test_Native_BogusTest');
		$suite->addTestSuite('DateTimeSolution_Test_Native_DiffTest');
		$suite->addTestSuite('DateTimeSolution_Test_Native_ModifyTest');
		$suite->addTestSuite('DateTimeSolution_Test_Native_SubTest');

		return $suite;
	}
}

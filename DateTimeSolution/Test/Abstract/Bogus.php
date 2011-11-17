<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for bogus situations
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Bogus extends PHPUnit_Framework_TestCase {
	/**
	 * Invalid date
	 */
	public function test_bogus_date() {
		try {
			$date = new DateTimeSolution('2008-33-33');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
}

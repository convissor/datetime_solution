<?php /** @package DateTimeSolution_Test */

/**
 * Get the DateTimeSolution and DateIntervalSolution for native PHP tests
 */
require_once dirname(__FILE__) . '/classes_native.php';

/**
 * Tests PHP's diff() method
 *
 * Usage:  phpunit Native_DiffTest
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Native_DiffTest extends DateTimeSolution_Test_Abstract_Diff {
	public function setUp() {
		if (version_compare(phpversion(), '5.3.3', '<')) {
			$this->markTestSkipped('Native diff() buggy until PHP 5.3.3');
		}
	}
}

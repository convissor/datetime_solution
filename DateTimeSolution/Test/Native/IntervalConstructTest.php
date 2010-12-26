<?php /** @package DateTimeSolution_Test */

/**
 * Get the DateTimeSolution and DateIntervalSolution for native PHP tests
 */
require_once dirname(__FILE__) . '/classes_native.php';

/**
 * Tests PHP's DateInterval constructor
 *
 * Usage:  phpunit Native_IntervalConstructTest
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Native_IntervalConstructTest extends DateTimeSolution_Test_Abstract_IntervalConstruct {
	protected $expect_base = array(
		'y' => 0,
		'm' => 0,
		'd' => 0,
		'h' => 0,
		'i' => 0,
		's' => 0,
		'invert' => 0,
		'days' => false,
	);
}

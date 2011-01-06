<?php /** @package DateTimeSolution_Test */

/**
 * Get the DateTimeSolution and DateIntervalSolution for userland tests
 */
require_once dirname(__FILE__) . '/classes_userland.php';

/**
 * Tests the DateIntervalSolution's constructor
 *
 * Usage:  phpunit Userland_IntervalConstructTest
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
class DateTimeSolution_Test_Userland_IntervalConstructTest extends DateTimeSolution_Test_Abstract_IntervalConstruct {
	protected $expect_base = array(
		'y' => 0,
		'm' => 0,
		'd' => 0,
		'h' => 0,
		'i' => 0,
		's' => 0,
		'invert' => 0,
		'days' => false,
		'datetime_solution_level' => '52',
	);
}

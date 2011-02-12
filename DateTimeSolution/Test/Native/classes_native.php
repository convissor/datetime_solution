<?php

/**
 * Declares the DateTimeSolution and DateIntervalSolution appropriate
 * for testing of PHP's native date/time methods
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */

/**
 * @ignore
 * @package DateTimeSolution_Test
 */
class DateTimeSolution extends DateTime {
	public function get_datetime_solution_level() {
		return 'native';
	}
}

/**
 * @ignore
 * @package DateTimeSolution_Test
 */
class DateIntervalSolution extends DateInterval {
	public function get_datetime_solution_level() {
		return 'native';
	}
}

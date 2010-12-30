<?php

/**
 * Declares the DateIntervalSolution class based on the PHP version being used
 *
 * PHP Version:
 * + all: DateIntervalSolution extends DateTimeSolution_DateInterval
 *
 * DateTime Solution is a trademark of The Analysis and Solutions Company.
 *
 * @package DateTimeSolution
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 * @link http://www.analysisandsolutions.com/software/datetime_solution/
 */

/**
 * Provide our own interval class for all PHP versions
 *
 * PHP 5.2 lacks DateInterval, bug 53634 in PHP 5.3 means $days can't
 * be written to, plus I just found a bunch of other issues.
 *
 * @package DateTimeSolution
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 * @link http://www.analysisandsolutions.com/software/datetime_solution/
 */
class DateIntervalSolution extends DateTimeSolution_DateInterval {}

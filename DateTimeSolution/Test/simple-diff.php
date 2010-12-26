<?php

/**
 * A simple test for use by profilers and debugers
 *
 * Xdebug usage:  php -d xdebug.profiler_enable=1 diff.php
 *
 * @package CalendarSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */

/**
 * Obtain the Calendar Solution's settings and autoload function
 *
 * Uses dirname(__FILE__) because "./" can be stripped by PHP's safety
 * settings and __DIR__ was introduced in PHP 5.3.
 */
require dirname(__FILE__) . '/../../taasc_autoload.php';

/**
 * Manually declare DateTime Solution classes so we run our code instead of
 * possibly using native PHP functions
 */
require dirname(__FILE__) . '/Userland/classes_userland.php';


$date1 = new DateTimeSolution('2010-09-08 07:06:05');
$date2 = new DateTimeSolution('2011-12-13 14:15:16');

$interval = $date1->diff($date2);
echo $interval->format('%R %yY %mM %dD %hH %iM %sS  %aDays') . "\n";

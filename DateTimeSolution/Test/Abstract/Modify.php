<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the modify() method
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Modify extends PHPUnit_Framework_TestCase {
	/**
	 * @var DateTimeSolution
	 */
	protected $date;

	/**
	 * Sets the $date property to DateTimeSolution('2010-12-15') for each test
	 */
	protected function setUp() {
		$this->date = new DateTimeSolution('2010-12-15');
	}


	/**#@+
	 * Plus x days
	 */
	public function test_plus_1_day() {
		$this->date->modify('+1 day');
		$this->assertEquals('2010-12-16', $this->date->format('Y-m-d'));
	}
	public function test_plus_2_day() {
		$this->date->modify('+2 day');
		$this->assertEquals('2010-12-17', $this->date->format('Y-m-d'));
	}
	public function test_plus_3_day() {
		$this->date->modify('+3 day');
		$this->assertEquals('2010-12-18', $this->date->format('Y-m-d'));
	}
	public function test_plus_4_day() {
		$this->date->modify('+4 day');
		$this->assertEquals('2010-12-19', $this->date->format('Y-m-d'));
	}
	public function test_plus_5_day() {
		$this->date->modify('+5 day');
		$this->assertEquals('2010-12-20', $this->date->format('Y-m-d'));
	}
	public function test_plus_6_day() {
		$this->date->modify('+6 day');
		$this->assertEquals('2010-12-21', $this->date->format('Y-m-d'));
	}
	public function test_plus_7_day() {
		$this->date->modify('+7 day');
		$this->assertEquals('2010-12-22', $this->date->format('Y-m-d'));
	}
	public function test_plus_8_day() {
		$this->date->modify('+8 day');
		$this->assertEquals('2010-12-23', $this->date->format('Y-m-d'));
	}
	public function test_plus_9_day() {
		$this->date->modify('+9 day');
		$this->assertEquals('2010-12-24', $this->date->format('Y-m-d'));
	}
	public function test_plus_10_day() {
		$this->date->modify('+10 day');
		$this->assertEquals('2010-12-25', $this->date->format('Y-m-d'));
	}
	public function test_plus_11_day() {
		$this->date->modify('+11 day');
		$this->assertEquals('2010-12-26', $this->date->format('Y-m-d'));
	}
	public function test_plus_12_day() {
		$this->date->modify('+12 day');
		$this->assertEquals('2010-12-27', $this->date->format('Y-m-d'));
	}
	public function test_plus_13_day() {
		$this->date->modify('+13 day');
		$this->assertEquals('2010-12-28', $this->date->format('Y-m-d'));
	}
	public function test_plus_14_day() {
		$this->date->modify('+14 day');
		$this->assertEquals('2010-12-29', $this->date->format('Y-m-d'));
	}
	public function test_plus_15_day() {
		$this->date->modify('+15 day');
		$this->assertEquals('2010-12-30', $this->date->format('Y-m-d'));
	}
	public function test_plus_16_day() {
		$this->date->modify('+16 day');
		$this->assertEquals('2010-12-31', $this->date->format('Y-m-d'));
	}
	public function test_plus_17_day() {
		$this->date->modify('+17 day');
		$this->assertEquals('2011-01-01', $this->date->format('Y-m-d'));
	}
	public function test_plus_730_day() {
		$this->date->modify('+730 day');
		$this->assertEquals('2012-12-14', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Minus x days
	 */
	public function test_minus_1_day() {
		$this->date->modify('-1 day');
		$this->assertEquals('2010-12-14', $this->date->format('Y-m-d'));
	}
	public function test_minus_2_day() {
		$this->date->modify('-2 day');
		$this->assertEquals('2010-12-13', $this->date->format('Y-m-d'));
	}
	public function test_minus_3_day() {
		$this->date->modify('-3 day');
		$this->assertEquals('2010-12-12', $this->date->format('Y-m-d'));
	}
	public function test_minus_4_day() {
		$this->date->modify('-4 day');
		$this->assertEquals('2010-12-11', $this->date->format('Y-m-d'));
	}
	public function test_minus_5_day() {
		$this->date->modify('-5 day');
		$this->assertEquals('2010-12-10', $this->date->format('Y-m-d'));
	}
	public function test_minus_6_day() {
		$this->date->modify('-6 day');
		$this->assertEquals('2010-12-09', $this->date->format('Y-m-d'));
	}
	public function test_minus_7_day() {
		$this->date->modify('-7 day');
		$this->assertEquals('2010-12-08', $this->date->format('Y-m-d'));
	}
	public function test_minus_8_day() {
		$this->date->modify('-8 day');
		$this->assertEquals('2010-12-07', $this->date->format('Y-m-d'));
	}
	public function test_minus_9_day() {
		$this->date->modify('-9 day');
		$this->assertEquals('2010-12-06', $this->date->format('Y-m-d'));
	}
	public function test_minus_10_day() {
		$this->date->modify('-10 day');
		$this->assertEquals('2010-12-05', $this->date->format('Y-m-d'));
	}
	public function test_minus_11_day() {
		$this->date->modify('-11 day');
		$this->assertEquals('2010-12-04', $this->date->format('Y-m-d'));
	}
	public function test_minus_12_day() {
		$this->date->modify('-12 day');
		$this->assertEquals('2010-12-03', $this->date->format('Y-m-d'));
	}
	public function test_minus_13_day() {
		$this->date->modify('-13 day');
		$this->assertEquals('2010-12-02', $this->date->format('Y-m-d'));
	}
	public function test_minus_14_day() {
		$this->date->modify('-14 day');
		$this->assertEquals('2010-12-01', $this->date->format('Y-m-d'));
	}
	public function test_minus_15_day() {
		$this->date->modify('-15 day');
		$this->assertEquals('2010-11-30', $this->date->format('Y-m-d'));
	}
	public function test_minus_730_day() {
		$this->date->modify('-730 day');
		$this->assertEquals('2008-12-15', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Plus x months
	 */
	public function test_plus_1_month() {
		$this->date->modify('+1 month');
		$this->assertEquals('2011-01-15', $this->date->format('Y-m-d'));
	}
	public function test_plus_2_month() {
		$this->date->modify('+2 month');
		$this->assertEquals('2011-02-15', $this->date->format('Y-m-d'));
	}
	public function test_plus_13_month() {
		$this->date->modify('+13 month');
		$this->assertEquals('2012-01-15', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Minus x months
	 */
	public function test_minus_1_month() {
		$this->date->modify('-1 month');
		$this->assertEquals('2010-11-15', $this->date->format('Y-m-d'));
	}
	public function test_minus_2_month() {
		$this->date->modify('-2 month');
		$this->assertEquals('2010-10-15', $this->date->format('Y-m-d'));
	}
	public function test_minus_13_month() {
		$this->date->modify('-13 month');
		$this->assertEquals('2009-11-15', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Plus x years
	 */
	public function test_plus_1_year() {
		$this->date->modify('+1 year');
		$this->assertEquals('2011-12-15', $this->date->format('Y-m-d'));
	}
	public function test_plus_2_year() {
		$this->date->modify('+2 year');
		$this->assertEquals('2012-12-15', $this->date->format('Y-m-d'));
	}
	public function test_plus_13_year() {
		$this->date->modify('+13 year');
		$this->assertEquals('2023-12-15', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Minus x years
	 */
	public function test_minus_1_year() {
		$this->date->modify('-1 year');
		$this->assertEquals('2009-12-15', $this->date->format('Y-m-d'));
	}
	public function test_minus_2_year() {
		$this->date->modify('-2 year');
		$this->assertEquals('2008-12-15', $this->date->format('Y-m-d'));
	}
	public function test_minus_13_year() {
		$this->date->modify('-13 year');
		$this->assertEquals('1997-12-15', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * First weekday of this month
	 */
	public function test_first_wednesday() {
		$this->date->modify('first wednesday of this month');
		$this->assertEquals('2010-12-01', $this->date->format('Y-m-d'));
	}
	public function test_first_thursday() {
		$this->date->modify('first thursday of this month');
		$this->assertEquals('2010-12-02', $this->date->format('Y-m-d'));
	}
	public function test_first_friday() {
		$this->date->modify('first friday of this month');
		$this->assertEquals('2010-12-03', $this->date->format('Y-m-d'));
	}
	public function test_first_saturday() {
		$this->date->modify('first saturday of this month');
		$this->assertEquals('2010-12-04', $this->date->format('Y-m-d'));
	}
	public function test_first_sunday() {
		$this->date->modify('first sunday of this month');
		$this->assertEquals('2010-12-05', $this->date->format('Y-m-d'));
	}
	public function test_first_monday() {
		$this->date->modify('first monday of this month');
		$this->assertEquals('2010-12-06', $this->date->format('Y-m-d'));
	}
	public function test_first_tuesday() {
		$this->date->modify('first tuesday of this month');
		$this->assertEquals('2010-12-07', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Second weekday of this month
	 */
	public function test_second_wednesday() {
		$this->date->modify('second wednesday of this month');
		$this->assertEquals('2010-12-08', $this->date->format('Y-m-d'));
	}
	public function test_second_thursday() {
		$this->date->modify('second thursday of this month');
		$this->assertEquals('2010-12-09', $this->date->format('Y-m-d'));
	}
	public function test_second_friday() {
		$this->date->modify('second friday of this month');
		$this->assertEquals('2010-12-10', $this->date->format('Y-m-d'));
	}
	public function test_second_saturday() {
		$this->date->modify('second saturday of this month');
		$this->assertEquals('2010-12-11', $this->date->format('Y-m-d'));
	}
	public function test_second_sunday() {
		$this->date->modify('second sunday of this month');
		$this->assertEquals('2010-12-12', $this->date->format('Y-m-d'));
	}
	public function test_second_monday() {
		$this->date->modify('second monday of this month');
		$this->assertEquals('2010-12-13', $this->date->format('Y-m-d'));
	}
	public function test_second_tuesday() {
		$this->date->modify('second tuesday of this month');
		$this->assertEquals('2010-12-14', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Third  weekday of this month
	 */
	public function test_third_wednesday() {
		$this->date->modify('third wednesday of this month');
		$this->assertEquals('2010-12-15', $this->date->format('Y-m-d'));
	}
	public function test_third_thursday() {
		$this->date->modify('third thursday of this month');
		$this->assertEquals('2010-12-16', $this->date->format('Y-m-d'));
	}
	public function test_third_friday() {
		$this->date->modify('third friday of this month');
		$this->assertEquals('2010-12-17', $this->date->format('Y-m-d'));
	}
	public function test_third_saturday() {
		$this->date->modify('third saturday of this month');
		$this->assertEquals('2010-12-18', $this->date->format('Y-m-d'));
	}
	public function test_third_sunday() {
		$this->date->modify('third sunday of this month');
		$this->assertEquals('2010-12-19', $this->date->format('Y-m-d'));
	}
	public function test_third_monday() {
		$this->date->modify('third monday of this month');
		$this->assertEquals('2010-12-20', $this->date->format('Y-m-d'));
	}
	public function test_third_tuesday() {
		$this->date->modify('third tuesday of this month');
		$this->assertEquals('2010-12-21', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Fourth weekday of this month
	 */
	public function test_fourth_wednesday() {
		$this->date->modify('fourth wednesday of this month');
		$this->assertEquals('2010-12-22', $this->date->format('Y-m-d'));
	}
	public function test_fourth_thursday() {
		$this->date->modify('fourth thursday of this month');
		$this->assertEquals('2010-12-23', $this->date->format('Y-m-d'));
	}
	public function test_fourth_friday() {
		$this->date->modify('fourth friday of this month');
		$this->assertEquals('2010-12-24', $this->date->format('Y-m-d'));
	}
	public function test_fourth_saturday() {
		$this->date->modify('fourth saturday of this month');
		$this->assertEquals('2010-12-25', $this->date->format('Y-m-d'));
	}
	public function test_fourth_sunday() {
		$this->date->modify('fourth sunday of this month');
		$this->assertEquals('2010-12-26', $this->date->format('Y-m-d'));
	}
	public function test_fourth_monday() {
		$this->date->modify('fourth monday of this month');
		$this->assertEquals('2010-12-27', $this->date->format('Y-m-d'));
	}
	public function test_fourth_tuesday() {
		$this->date->modify('fourth tuesday of this month');
		$this->assertEquals('2010-12-28', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * Last weekday of this month
	 */
	public function test_last_saturday() {
		$this->date->modify('last saturday of this month');
		$this->assertEquals('2010-12-25', $this->date->format('Y-m-d'));
	}
	public function test_last_sunday() {
		$this->date->modify('last sunday of this month');
		$this->assertEquals('2010-12-26', $this->date->format('Y-m-d'));
	}
	public function test_last_monday() {
		$this->date->modify('last monday of this month');
		$this->assertEquals('2010-12-27', $this->date->format('Y-m-d'));
	}
	public function test_last_tuesday() {
		$this->date->modify('last tuesday of this month');
		$this->assertEquals('2010-12-28', $this->date->format('Y-m-d'));
	}
	public function test_last_wednesday() {
		$this->date->modify('last wednesday of this month');
		$this->assertEquals('2010-12-29', $this->date->format('Y-m-d'));
	}
	public function test_last_thursday() {
		$this->date->modify('last thursday of this month');
		$this->assertEquals('2010-12-30', $this->date->format('Y-m-d'));
	}
	public function test_last_friday() {
		$this->date->modify('last friday of this month');
		$this->assertEquals('2010-12-31', $this->date->format('Y-m-d'));
	}
	/**#@-*/

	/**#@+
	 * First and last day of this month
	 */
	public function test_first_day() {
		$this->date->modify('first day of this month');
		$this->assertEquals('2010-12-01', $this->date->format('Y-m-d'));
	}
	public function test_last_day() {
		$this->date->modify('last day of this month');
		$this->assertEquals('2010-12-31', $this->date->format('Y-m-d'));
	}
	/**#@-*/
}

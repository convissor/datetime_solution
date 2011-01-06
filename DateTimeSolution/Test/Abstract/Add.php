<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the add() method
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Add extends PHPUnit_Framework_TestCase {
	/**
	 * @var DateTimeSolution
	 */
	protected $date;

	/**
	 * Sets the $date property to 2010-12-15 16:17:18 UTC for each test
	 */
	protected function setUp() {
		$this->date = new DateTimeSolution('2010-12-15 16:17:18', new DateTimeZone('UTC'));
	}


	/**#@+
	 * Seconds
	 */
	public function test_1_second() {
		$this->date->add(new DateIntervalSolution('PT1S'));
		$this->assertEquals('2010-12-15 16:17:19', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_second() {
		$this->date->add(new DateIntervalSolution('PT2S'));
		$this->assertEquals('2010-12-15 16:17:20', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_120_second() {
		$this->date->add(new DateIntervalSolution('PT120S'));
		$this->assertEquals('2010-12-15 16:19:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Minutes
	 */
	public function test_1_minute() {
		$this->date->add(new DateIntervalSolution('PT1M'));
		$this->assertEquals('2010-12-15 16:18:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_minute() {
		$this->date->add(new DateIntervalSolution('PT2M'));
		$this->assertEquals('2010-12-15 16:19:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_120_minute() {
		$this->date->add(new DateIntervalSolution('PT120M'));
		$this->assertEquals('2010-12-15 18:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Hours
	 */
	public function test_1_hour() {
		$this->date->add(new DateIntervalSolution('PT1H'));
		$this->assertEquals('2010-12-15 17:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_hour() {
		$this->date->add(new DateIntervalSolution('PT2H'));
		$this->assertEquals('2010-12-15 18:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_48_hour() {
		$this->date->add(new DateIntervalSolution('PT48H'));
		$this->assertEquals('2010-12-17 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Days
	 */
	public function test_1_day() {
		$this->date->add(new DateIntervalSolution('P1D'));
		$this->assertEquals('2010-12-16 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_day() {
		$this->date->add(new DateIntervalSolution('P2D'));
		$this->assertEquals('2010-12-17 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_3_day() {
		$this->date->add(new DateIntervalSolution('P3D'));
		$this->assertEquals('2010-12-18 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_4_day() {
		$this->date->add(new DateIntervalSolution('P4D'));
		$this->assertEquals('2010-12-19 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_5_day() {
		$this->date->add(new DateIntervalSolution('P5D'));
		$this->assertEquals('2010-12-20 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_6_day() {
		$this->date->add(new DateIntervalSolution('P6D'));
		$this->assertEquals('2010-12-21 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_7_day() {
		$this->date->add(new DateIntervalSolution('P7D'));
		$this->assertEquals('2010-12-22 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_8_day() {
		$this->date->add(new DateIntervalSolution('P8D'));
		$this->assertEquals('2010-12-23 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_9_day() {
		$this->date->add(new DateIntervalSolution('P9D'));
		$this->assertEquals('2010-12-24 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_10_day() {
		$this->date->add(new DateIntervalSolution('P10D'));
		$this->assertEquals('2010-12-25 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_11_day() {
		$this->date->add(new DateIntervalSolution('P11D'));
		$this->assertEquals('2010-12-26 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_12_day() {
		$this->date->add(new DateIntervalSolution('P12D'));
		$this->assertEquals('2010-12-27 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_13_day() {
		$this->date->add(new DateIntervalSolution('P13D'));
		$this->assertEquals('2010-12-28 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_14_day() {
		$this->date->add(new DateIntervalSolution('P14D'));
		$this->assertEquals('2010-12-29 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_15_day() {
		$this->date->add(new DateIntervalSolution('P15D'));
		$this->assertEquals('2010-12-30 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_16_day() {
		$this->date->add(new DateIntervalSolution('P16D'));
		$this->assertEquals('2010-12-31 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_17_day() {
		$this->date->add(new DateIntervalSolution('P17D'));
		$this->assertEquals('2011-01-01 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_730_day() {
		$this->date->add(new DateIntervalSolution('P730D'));
		$this->assertEquals('2012-12-14 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Months
	 */
	public function test_1_month() {
		$this->date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2011-01-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_month() {
		$this->date->add(new DateIntervalSolution('P2M'));
		$this->assertEquals('2011-02-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_13_month() {
		$this->date->add(new DateIntervalSolution('P13M'));
		$this->assertEquals('2012-01-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Negative months
	 */
	public function test_negative_1_month() {
		$interval = new DateIntervalSolution('P1M');
		$interval->invert = 1;
		$this->date->add($interval);
		$this->assertEquals('2010-11-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	public function test_negative_2_month() {
		$interval = new DateIntervalSolution('P2M');
		$interval->invert = 1;
		$this->date->add($interval);
		$this->assertEquals('2010-10-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	public function test_negative_13_month() {
		$interval = new DateIntervalSolution('P13M');
		$interval->invert = 1;
		$this->date->add($interval);
		$this->assertEquals('2009-11-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	/**#@-*/

	/**#@+
	 * Years
	 */
	public function test_1_year() {
		$this->date->add(new DateIntervalSolution('P1Y'));
		$this->assertEquals('2011-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_year() {
		$this->date->add(new DateIntervalSolution('P2Y'));
		$this->assertEquals('2012-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_13_year() {
		$this->date->add(new DateIntervalSolution('P13Y'));
		$this->assertEquals('2023-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_300000_year() {
		$this->date->add(new DateIntervalSolution('P300000Y'));
		$this->assertEquals('302010-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Month tricky
	 */
	public function test_month_tricky__31_plus_1_to_jun_round_first() {
		$date = new DateTimeSolution('2008-05-31');
		$date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2008-07-01', $date->format('Y-m-d'));
	}
	public function test_month_tricky__29_plus_1_to_feb_no_leap_round_first() {
		$date = new DateTimeSolution('2007-01-29');
		$date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2007-03-01', $date->format('Y-m-d'));
	}
	public function test_month_tricky__29_plus_1_to_feb_leap_round_first() {
		$date = new DateTimeSolution('2008-01-29');
		$date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2008-02-29', $date->format('Y-m-d'));
	}
	public function test_month_tricky__29_plus_1_to_feb_leap_round_last() {
		$date = new DateTimeSolution('2008-01-29');
		$date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2008-02-29', $date->format('Y-m-d'));
	}
	public function test_month_tricky__30_plus_1_to_feb_leap_round_first() {
		$date = new DateTimeSolution('2008-01-30');
		$date->add(new DateIntervalSolution('P1M'));
		$this->assertEquals('2008-03-01', $date->format('Y-m-d'));
	}
	/**#@-*/
}

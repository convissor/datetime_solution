<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the sub() method
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Sub extends PHPUnit_Framework_TestCase {
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
		$this->date->sub(new DateIntervalSolution('PT1S'));
		$this->assertEquals('2010-12-15 16:17:17', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_second() {
		$this->date->sub(new DateIntervalSolution('PT2S'));
		$this->assertEquals('2010-12-15 16:17:16', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_120_second() {
		$this->date->sub(new DateIntervalSolution('PT120S'));
		$this->assertEquals('2010-12-15 16:15:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Minutes
	 */
	public function test_1_minute() {
		$this->date->sub(new DateIntervalSolution('PT1M'));
		$this->assertEquals('2010-12-15 16:16:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_minute() {
		$this->date->sub(new DateIntervalSolution('PT2M'));
		$this->assertEquals('2010-12-15 16:15:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_120_minute() {
		$this->date->sub(new DateIntervalSolution('PT120M'));
		$this->assertEquals('2010-12-15 14:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Hours
	 */
	public function test_1_hour() {
		$this->date->sub(new DateIntervalSolution('PT1H'));
		$this->assertEquals('2010-12-15 15:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_hour() {
		$this->date->sub(new DateIntervalSolution('PT2H'));
		$this->assertEquals('2010-12-15 14:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_48_hour() {
		$this->date->sub(new DateIntervalSolution('PT48H'));
		$this->assertEquals('2010-12-13 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/

	/**#@+
	 * Days
	 */
	public function test_1_day() {
		$this->date->sub(new DateIntervalSolution('P1D'));
		$this->assertEquals('2010-12-14 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_day() {
		$this->date->sub(new DateIntervalSolution('P2D'));
		$this->assertEquals('2010-12-13 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_3_day() {
		$this->date->sub(new DateIntervalSolution('P3D'));
		$this->assertEquals('2010-12-12 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_4_day() {
		$this->date->sub(new DateIntervalSolution('P4D'));
		$this->assertEquals('2010-12-11 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_5_day() {
		$this->date->sub(new DateIntervalSolution('P5D'));
		$this->assertEquals('2010-12-10 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_6_day() {
		$this->date->sub(new DateIntervalSolution('P6D'));
		$this->assertEquals('2010-12-09 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_7_day() {
		$this->date->sub(new DateIntervalSolution('P7D'));
		$this->assertEquals('2010-12-08 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_8_day() {
		$this->date->sub(new DateIntervalSolution('P8D'));
		$this->assertEquals('2010-12-07 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_9_day() {
		$this->date->sub(new DateIntervalSolution('P9D'));
		$this->assertEquals('2010-12-06 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_10_day() {
		$this->date->sub(new DateIntervalSolution('P10D'));
		$this->assertEquals('2010-12-05 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_11_day() {
		$this->date->sub(new DateIntervalSolution('P11D'));
		$this->assertEquals('2010-12-04 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_12_day() {
		$this->date->sub(new DateIntervalSolution('P12D'));
		$this->assertEquals('2010-12-03 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_13_day() {
		$this->date->sub(new DateIntervalSolution('P13D'));
		$this->assertEquals('2010-12-02 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_14_day() {
		$this->date->sub(new DateIntervalSolution('P14D'));
		$this->assertEquals('2010-12-01 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_15_day() {
		$this->date->sub(new DateIntervalSolution('P15D'));
		$this->assertEquals('2010-11-30 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_730_day() {
		$this->date->sub(new DateIntervalSolution('P730D'));
		$this->assertEquals('2008-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
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
	 * Months
	 */
	public function test_negative_1_month() {
		$interval = new DateIntervalSolution('P1M');
		$interval->invert = 1;
		$this->date->sub($interval);
		$this->assertEquals('2011-01-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	public function test_negative_2_month() {
		$interval = new DateIntervalSolution('P2M');
		$interval->invert = 1;
		$this->date->sub($interval);
		$this->assertEquals('2011-02-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	public function test_negative_13_month() {
		$interval = new DateIntervalSolution('P13M');
		$interval->invert = 1;
		$this->date->sub($interval);
		$this->assertEquals('2012-01-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
		// Make sure invert property didn't get flipped.
		$this->assertEquals(1, $interval->invert);
	}
	/**#@-*/

	/**#@+
	 * Years
	 */
	public function test_1_year() {
		$this->date->sub(new DateIntervalSolution('P1Y'));
		$this->assertEquals('2009-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_2_year() {
		$this->date->sub(new DateIntervalSolution('P2Y'));
		$this->assertEquals('2008-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_13_year() {
		$this->date->sub(new DateIntervalSolution('P13Y'));
		$this->assertEquals('1997-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	public function test_300000_year() {
		$this->date->sub(new DateIntervalSolution('P300000Y'));
		$this->assertEquals('-297990-12-15 16:17:18', $this->date->format('Y-m-d H:i:s'));
	}
	/**#@-*/
}

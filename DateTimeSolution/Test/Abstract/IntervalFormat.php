<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the DateInterval format() method
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_IntervalFormat extends PHPUnit_Framework_TestCase {
	protected function setUp() {
		$this->interval = new DateIntervalSolution('P1Y2M3DT4H5M6S');
	}

	/**#@+
	 * format()
	 */
	public function test_y() {
		$this->assertEquals(1, $this->interval->format('%y'));
	}
	public function test_m() {
		$this->assertEquals(2, $this->interval->format('%m'));
	}
	public function test_d() {
		$this->assertEquals(3, $this->interval->format('%d'));
	}
	public function test_h() {
		$this->assertEquals(4, $this->interval->format('%h'));
	}
	public function test_i() {
		$this->assertEquals(5, $this->interval->format('%i'));
	}
	public function test_s() {
		$this->assertEquals(6, $this->interval->format('%s'));
	}
	public function test_r_lower_positive() {
		$this->assertEquals('', $this->interval->format('%r'));
	}
	public function test_R_upper_postive() {
		$this->assertEquals('+', $this->interval->format('%R'));
	}
	public function test_r_lower_negative() {
		$this->interval->invert = 1;
		$this->assertEquals('-', $this->interval->format('%r'));
	}
	public function test_R_upper_negative() {
		$this->interval->invert = 1;
		$this->assertEquals('-', $this->interval->format('%R'));
	}
	public function test_a() {
		$this->assertEquals('', $this->interval->format('%a'));
	}
	/**#@-*/
}

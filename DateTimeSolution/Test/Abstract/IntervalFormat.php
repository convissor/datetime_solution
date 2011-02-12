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
	protected $interval;
	protected $interval_inverted;

	protected function setUp() {
		$date1 = new DateTimeSolution('2000-01-01 00:00:00');
		$date2 = new DateTimeSolution('2001-03-04 04:05:06');
		$this->interval = $date1->diff($date2);
		$this->interval_inverted = $date2->diff($date1);
	}

	/**#@+
	 * format()
	 */
	public function test_y() {
		$this->assertEquals(1, $this->interval->format('%y'));
	}
	public function test_y_upper() {
		$this->assertEquals('01', $this->interval->format('%Y'));
	}
	public function test_y_upper_long() {
		$date1 = new DateTimeSolution('2000-01-01');
		$date2 = new DateTimeSolution('2123-01-01');
		$interval = $date1->diff($date2);
		$this->assertEquals('123', $interval->format('%Y'));
	}
	public function test_m() {
		$this->assertEquals(2, $this->interval->format('%m'));
	}
	public function test_m_upper() {
		$this->assertEquals('02', $this->interval->format('%M'));
	}
	public function test_d() {
		$this->assertEquals(3, $this->interval->format('%d'));
	}
	public function test_d_upper() {
		$this->assertEquals('03', $this->interval->format('%D'));
	}
	public function test_h() {
		$this->markTestSkipped();
		$this->assertEquals(4, $this->interval->format('%h'));
	}
	public function test_h_upper() {
		$this->markTestSkipped();
		$this->assertEquals('04', $this->interval->format('%H'));
	}
	public function test_i() {
		$this->markTestSkipped();
		$this->assertEquals(5, $this->interval->format('%i'));
	}
	public function test_i_upper() {
		$this->markTestSkipped();
		$this->assertEquals('05', $this->interval->format('%I'));
	}
	public function test_s() {
		$this->markTestSkipped();
		$this->assertEquals(6, $this->interval->format('%s'));
	}
	public function test_s_upper() {
		$this->markTestSkipped();
		$this->assertEquals('06', $this->interval->format('%S'));
	}
	public function test_r() {
		$this->assertEquals('', $this->interval->format('%r'));
	}
	public function test_r_upper() {
		$this->assertEquals('+', $this->interval->format('%R'));
	}
	public function test_r_inverted() {
		$this->assertEquals('-', $this->interval_inverted->format('%r'));
	}
	public function test_r_upper_inverted() {
		$this->assertEquals('-', $this->interval_inverted->format('%R'));
	}
	public function test_a() {
		$this->assertEquals(428, $this->interval->format('%a'));
	}
	public function test_a_inverted() {
		$this->assertEquals(428, $this->interval_inverted->format('%a'));
	}
	/**#@-*/

	/**#@+
	 * format() for unset elements
	 */
	public function test_unset_y() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals(0, $interval->format('%y'));
	}
	public function test_unset_y_upper() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('00', $interval->format('%Y'));
	}
	public function test_unset_m() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals(0, $interval->format('%m'));
	}
	public function test_unset_m_upper() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('00', $interval->format('%M'));
	}
	public function test_unset_d() {
		$interval = new DateIntervalSolution('P1Y');
		$this->assertEquals(0, $interval->format('%d'));
	}
	public function test_unset_d_upper() {
		$interval = new DateIntervalSolution('P1Y');
		$this->assertEquals('00', $interval->format('%D'));
	}
	public function test_unset_h() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals(0, $interval->format('%h'));
	}
	public function test_unset_h_upper() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('00', $interval->format('%H'));
	}
	public function test_unset_i() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals(0, $interval->format('%i'));
	}
	public function test_unset_i_upper() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('00', $interval->format('%I'));
	}
	public function test_unset_s() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals(0, $interval->format('%s'));
	}
	public function test_unset_s_upper() {
		$this->markTestSkipped();
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('00', $interval->format('%S'));
	}
	public function test_unset_r() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('', $interval->format('%r'));
	}
	public function test_unset_r_upper() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('+', $interval->format('%R'));
	}
	public function test_unset_a() {
		$interval = new DateIntervalSolution('P1D');
		$this->assertEquals('(unknown)', $interval->format('%a'));
	}
	/**#@-*/

	/**#@+
	 * Compound formats
	 */
	public function test_compound_1() {
		$expect = 'lower 2 and upper 02 in one';
		$actual = $this->interval->format('lower %m and upper %M in one');
		$this->assertEquals($expect, $actual);
	}
	/**#@-*/
}

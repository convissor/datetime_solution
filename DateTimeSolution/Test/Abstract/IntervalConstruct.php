<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the DateInterval constructor
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_IntervalConstruct extends PHPUnit_Framework_TestCase {
	protected $expect;

	protected function setUp() {
		$this->expect = $this->expect_base;
	}

	/**#@+
	 * Normal single values
	 */
	public function test_y() {
		$interval = new DateIntervalSolution('P23Y');
		$this->expect['y'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_m() {
		$interval = new DateIntervalSolution('P23M');
		$this->expect['m'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_d() {
		$interval = new DateIntervalSolution('P23D');
		$this->expect['d'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_w() {
		$interval = new DateIntervalSolution('P23W');
		$this->expect['d'] = 161;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_h() {
		$interval = new DateIntervalSolution('PT23H');
		$this->expect['h'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_i() {
		$interval = new DateIntervalSolution('PT23M');
		$this->expect['i'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	public function test_s() {
		$interval = new DateIntervalSolution('PT23S');
		$this->expect['s'] = 23;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}
	/**#@-*/

	public function test_large_s() {
		$interval = new DateIntervalSolution('PT21872183S');
		$this->expect['s'] = 21872183;
		$this->assertEquals($this->expect, get_object_vars($interval));
	}

	/**#@+
	 * Bad patterns
	 */
	public function test_bad_b() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('P6B');
	}
	public function test_bad_tb() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('PT2B');
	}
	public function test_bad_s_no_t() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('P2S');
	}
	public function test_bad_d_no_p() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('2D');
	}
	public function test_bad_h_no_p() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('T2H');
	}
	public function test_bad_order() {
		$this->setExpectedException('Exception');
		$interval = new DateIntervalSolution('P2D3YT2S');
	}
	/**#@=*/

//	public function test_y() {
//		$interval = new DateIntervalSolution('P2Y');
//		$this->expect['y'] = 2;
//		$this->assertEquals($this->expect, get_object_vars($interval));
//	}
}

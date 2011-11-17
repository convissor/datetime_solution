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
		try {
			$interval = new DateIntervalSolution('P6B');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	public function test_bad_tb() {
		try {
			$interval = new DateIntervalSolution('PT2B');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	public function test_bad_s_no_t() {
		try {
			$interval = new DateIntervalSolution('P2S');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	public function test_bad_d_no_p() {
		try {
			$interval = new DateIntervalSolution('2D');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	public function test_bad_h_no_p() {
		try {
			$interval = new DateIntervalSolution('T2H');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	public function test_bad_order() {
		try {
			$interval = new DateIntervalSolution('P2D3YT2S');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Exception was not thrown.');
	}
	/**#@=*/

//	public function test_y() {
//		$interval = new DateIntervalSolution('P2Y');
//		$this->expect['y'] = 2;
//		$this->assertEquals($this->expect, get_object_vars($interval));
//	}
}

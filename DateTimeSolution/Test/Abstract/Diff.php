<?php /** @package DateTimeSolution_Test */

/**
 * Tests the diff() method then passes the resulting
 * interval to the add()/sub() method as a double check
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2011
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Diff extends PHPUnit_Framework_TestCase {
	/**#@+
	 * The kinds of checks that can be done (bitwise integers)
	 */
	const CHECK_DIFF = 1;
	const CHECK_DAYS = 2;
	const CHECK_ADD = 4;
	/**#@-*/

	/**
	 * The type of checks that should be done (bitwise integer)
	 *
	 * @var int
	 * @see DateTimeSolution_Test_Abstract_Diff::CHECK_DIFF
	 * @see DateTimeSolution_Test_Abstract_Diff::CHECK_DAYS
	 * @see DateTimeSolution_Test_Abstract_Diff::CHECK_ADD
	 */
	public $check_level = 7;


	/**
	 * Automatically sets time zone to America/New_York before each test
	 */
	public static function setUpBeforeClass() {
		date_default_timezone_set('America/New_York');
	}

	/**
	 * Provides a consistent interface for executing date diff tests
	 *
	 * Tests the diff() method then passes the resulting
	 * interval to the add()/sub() method as a double check
	 *
	 * @param string|DateTimeSolution $end_date  the end date in YYYY-MM-DD
	 *                                format (can include time HH:MM:SS)
	 *                                or a DateTimeSolution object
	 * @param string|DateTimeSolution $start_date  the starting date in YYYY-MM-DD
	 *                                format (can include time HH:MM:SS)
	 *                                or a DateTimeSolution object
	 * @param string $expect_spec  the expected result of the tests, in
	 *               the special interval specification used for this test suite.
	 *               This spec includes a "+" or "-" after the "P" in order to
	 *               indicate which direction to go.
	 * @param int $expect_days  the number of days to compare with the
	 *            interval's "days" property
	 * @param bool $absolute  should the result always be a positive number?
	 *
	 * @return void
	 */
	protected function examine_diff($end_date, $start_date, $expect_spec, $expect_days, $absolute = false) {
		if (is_string($start_date)) {
			$start = new DateTimeSolution($start_date);
		} else {
			$start = $start_date;
		}
		$start_date = $start->format('Y-m-d');

		if (is_string($end_date)) {
			$end = new DateTimeSolution($end_date);
		} else {
			$end = $end_date;
		}
		$end_date = $end->format('Y-m-d');

		$force_sub = false;
		if ($absolute) {
			$tmp_interval = $start->diff($end);
			if ($tmp_interval->format('%r')) {
				$force_sub = true;
			}
		}

		$result_interval = $start->diff($end, $absolute);
		$result_spec = $result_interval->format('P%R%yY%mM%dDT%hH%iM%sS');

		// Also make sure add()/sub() works the same way as diff().
		if ($force_sub) {
			$start->sub($result_interval);
			$sign = '-';
		} else {
			$start->add($result_interval);
			$sign = '+';
		}
		$result_end_date = $start->format('Y-m-d');

		/*
		 * Highlights for problems.
		 */

		if ($expect_spec == $result_spec) {
			$spec_highlight = '  ';
		} else {
			$spec_highlight = '**';
		}

		if ($expect_days == $result_interval->days) {
			$days_highlight = '  ';
		} else {
			$days_highlight = '**';
		}

		if ($end_date == $result_end_date) {
			$date_highlight = '  ';
		} else {
			$date_highlight = '**';
		}

		/*
		 * Compose and compare results.
		 */

		$expect_full = '';
		if ($this->check_level & self::CHECK_DIFF) {
			$expect_full .= "FWD: $end_date - $start_date = "
				. "$spec_highlight$expect_spec$spec_highlight";
		}
		if ($this->check_level & self::CHECK_DAYS) {
			$expect_full .= " | DAYS: $days_highlight$expect_days$days_highlight";
		}
		if ($this->check_level & self::CHECK_ADD) {
			$expect_full .= " | BACK: $start_date $sign $expect_spec = "
				. "$date_highlight$end_date$date_highlight";
		}

		$result_full = '';
		if ($this->check_level & self::CHECK_DIFF) {
			$result_full .= "FWD: $end_date - $start_date = "
				. "$spec_highlight$result_spec$spec_highlight";
		}
		if ($this->check_level & self::CHECK_DAYS) {
			$result_full .= " | DAYS: $days_highlight$result_interval->days$days_highlight";
		}
		if ($this->check_level & self::CHECK_ADD) {
			$result_full .= " | BACK: $start_date $sign $result_spec = "
				. "$date_highlight$result_end_date$date_highlight";
		}

		$this->assertEquals($expect_full, $result_full);
	}


	/**#@+
	 * Particular days
	 */
	public function test__7() {
		$this->examine_diff('2009-01-14', '2009-01-07', 'P+0Y0M7DT0H0M0S', 7);
	}
	public function test_years_positive__7_by_0_day() {
		$this->examine_diff('2007-02-07', '2000-02-07', 'P+7Y0M0DT0H0M0S', 2557);
	}
	public function test_years_positive__7_by_1_day() {
		$this->examine_diff('2007-02-08', '2000-02-07', 'P+7Y0M1DT0H0M0S', 2558);
	}
	public function test_years_positive__6_shy_1_day() {
		$this->examine_diff('2007-02-06', '2000-02-07', 'P+6Y11M30DT0H0M0S', 2556);
	}
	public function test_years_positive__7_by_1_month() {
		$this->examine_diff('2007-03-07', '2000-02-07', 'P+7Y1M0DT0H0M0S', 2585);
	}
	public function test_years_positive__6_shy_1_month() {
		$this->examine_diff('2007-01-07', '2000-02-07', 'P+6Y11M0DT0H0M0S', 2526);
	}
	public function test_years_positive__7_by_1_month_split_newyear() {
		$this->examine_diff('2007-01-07', '1999-12-07', 'P+7Y1M0DT0H0M0S', 2588);
	}
	public function test_years_positive__6_shy_1_month_split_newyear() {
		$this->examine_diff('2006-12-07', '2000-01-07', 'P+6Y11M0DT0H0M0S', 2526);
	}
	/**#@-*/

	/**#@+
	 * Particular days, negative
	 */
	public function test_negative__7() {
		$this->examine_diff('2009-01-07', '2009-01-14', 'P-0Y0M7DT0H0M0S', 7);
	}
	public function test_years_negative__7_by_0_day() {
		$this->examine_diff('2000-02-07', '2007-02-07', 'P-7Y0M0DT0H0M0S', 2557);
	}
	public function test_years_negative__7_by_1_day() {
		$this->examine_diff('2000-02-07', '2007-02-08', 'P-7Y0M1DT0H0M0S', 2558);
	}
	public function test_years_negative__6_shy_1_day() {
		$this->examine_diff('2000-02-07', '2007-02-06', 'P-6Y11M28DT0H0M0S', 2556);
	}
	public function test_years_negative__7_by_1_month() {
		$this->examine_diff('2000-02-07', '2007-03-07', 'P-7Y1M0DT0H0M0S', 2585);
	}
	public function test_years_negative__6_shy_1_month() {
		$this->examine_diff('2000-02-07', '2007-01-07', 'P-6Y11M0DT0H0M0S', 2526);
	}
	public function test_years_negative__7_by_1_month_split_newyear() {
		$this->examine_diff('1999-12-07', '2007-01-07', 'P-7Y1M0DT0H0M0S', 2588);
	}
	public function test_years_negative__6_shy_1_month_split_newyear() {
		$this->examine_diff('2000-01-07', '2006-12-07', 'P-6Y11M0DT0H0M0S', 2526);
	}
	/**#@-*/

	/**#@+
	 * Check PHP bug 49081
	 */
	public function test_bug_49081__1() {
		$this->examine_diff('2010-03-31', '2010-03-01', 'P+0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081__2() {
		$this->examine_diff('2010-04-01', '2010-03-01', 'P+0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081__3() {
		$this->examine_diff('2010-04-01', '2010-03-31', 'P+0Y0M1DT0H0M0S', 1);
	}
	public function test_bug_49081__4() {
		$this->examine_diff('2010-04-29', '2010-03-31', 'P+0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081__5() {
		$this->examine_diff('2010-04-30', '2010-03-31', 'P+0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081__6() {
		$this->examine_diff('2010-04-30', '2010-03-30', 'P+0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081__7() {
		$this->examine_diff('2010-04-30', '2010-03-29', 'P+0Y1M1DT0H0M0S', 32);
	}
	public function test_bug_49081__8() {
		$this->examine_diff('2010-01-29', '2010-01-01', 'P+0Y0M28DT0H0M0S', 28);
	}
	public function test_bug_49081__9() {
		$this->examine_diff('2010-01-30', '2010-01-01', 'P+0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081__10() {
		$this->examine_diff('2010-01-31', '2010-01-01', 'P+0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081__11() {
		$this->examine_diff('2010-02-01', '2010-01-01', 'P+0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081__12() {
		$this->examine_diff('2010-02-01', '2010-01-31', 'P+0Y0M1DT0H0M0S', 1);
	}
	public function test_bug_49081__13() {
		$this->examine_diff('2010-02-27', '2010-01-31', 'P+0Y0M27DT0H0M0S', 27);
	}
	public function test_bug_49081__14() {
		$this->examine_diff('2010-02-28', '2010-01-31', 'P+0Y0M28DT0H0M0S', 28);
	}
	public function test_bug_49081__15() {
		$this->examine_diff('2010-02-28', '2010-01-30', 'P+0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081__16() {
		$this->examine_diff('2010-02-28', '2010-01-29', 'P+0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081__17() {
		$this->examine_diff('2010-02-28', '2010-01-28', 'P+0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081__18() {
		$this->examine_diff('2010-02-28', '2010-01-27', 'P+0Y1M1DT0H0M0S', 32);
	}
	public function test_bug_49081__19() {
		$this->examine_diff('2010-03-01', '2010-01-01', 'P+0Y2M0DT0H0M0S', 59);
	}
	public function test_bug_49081__20() {
		$this->examine_diff('2010-03-01', '2010-01-31', 'P+0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081__21() {
		$this->examine_diff('2010-03-27', '2010-01-31', 'P+0Y1M24DT0H0M0S', 55);
	}
	public function test_bug_49081__22() {
		$this->examine_diff('2010-03-28', '2010-01-31', 'P+0Y1M25DT0H0M0S', 56);
	}
	public function test_bug_49081__23() {
		$this->examine_diff('2010-03-29', '2010-01-31', 'P+0Y1M26DT0H0M0S', 57);
	}
	public function test_bug_49081__24() {
		$this->examine_diff('2010-03-30', '2010-01-31', 'P+0Y1M27DT0H0M0S', 58);
	}
	public function test_bug_49081__25() {
		$this->examine_diff('2010-03-31', '2010-01-31', 'P+0Y2M0DT0H0M0S', 59);
	}
	public function test_bug_49081__26() {
		$this->examine_diff('2010-03-31', '2010-01-30', 'P+0Y2M1DT0H0M0S', 60);
	}
	public function test_bug_49081__27() {
		$this->examine_diff('2009-01-31', '2009-01-01', 'P+0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081__28() {
		$this->examine_diff('2010-03-27', '2010-02-28', 'P+0Y0M27DT0H0M0S', 27);
	}
	public function test_bug_49081__29() {
		$this->examine_diff('2010-03-28', '2010-02-28', 'P+0Y1M0DT0H0M0S', 28);
	}
	public function test_bug_49081__30() {
		$this->examine_diff('2010-03-29', '2010-02-28', 'P+0Y1M1DT0H0M0S', 29);
	}
	public function test_bug_49081__31() {
		$this->examine_diff('2010-03-27', '2010-02-27', 'P+0Y1M0DT0H0M0S', 28);
	}
	public function test_bug_49081__32() {
		$this->examine_diff('2010-03-27', '2010-02-26', 'P+0Y1M1DT0H0M0S', 29);
	}
	/**#@-*/

	/**#@+
	 * Check PHP bug 49081, negative
	 */
	public function test_bug_49081_negative__1() {
		$this->examine_diff('2010-03-01', '2010-03-31', 'P-0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081_negative__2() {
		$this->examine_diff('2010-03-01', '2010-04-01', 'P-0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081_negative__3() {
		$this->examine_diff('2010-03-31', '2010-04-01', 'P-0Y0M1DT0H0M0S', 1);
	}
	public function test_bug_49081_negative__4() {
		$this->examine_diff('2010-03-31', '2010-04-29', 'P-0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081_negative__5() {
		$this->examine_diff('2010-03-31', '2010-04-30', 'P-0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081_negative__6() {
		$this->examine_diff('2010-03-30', '2010-04-30', 'P-0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081_negative__7() {
		$this->examine_diff('2010-03-29', '2010-04-30', 'P-0Y1M1DT0H0M0S', 32);
	}
	public function test_bug_49081_negative__8() {
		$this->examine_diff('2010-01-01', '2010-01-29', 'P-0Y0M28DT0H0M0S', 28);
	}
	public function test_bug_49081_negative__9() {
		$this->examine_diff('2010-01-01', '2010-01-30', 'P-0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081_negative__10() {
		$this->examine_diff('2010-01-01', '2010-01-31', 'P-0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081_negative__11() {
		$this->examine_diff('2010-01-01', '2010-02-01', 'P-0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081_negative__12() {
		$this->examine_diff('2010-01-31', '2010-02-01', 'P-0Y0M1DT0H0M0S', 1);
	}
	public function test_bug_49081_negative__13() {
		$this->examine_diff('2010-01-31', '2010-02-27', 'P-0Y0M27DT0H0M0S', 27);
	}
	public function test_bug_49081_negative__14() {
		$this->examine_diff('2010-01-31', '2010-02-28', 'P-0Y0M28DT0H0M0S', 28);
	}
	public function test_bug_49081_negative__15() {
		$this->examine_diff('2010-01-30', '2010-02-28', 'P-0Y0M29DT0H0M0S', 29);
	}
	public function test_bug_49081_negative__16() {
		$this->examine_diff('2010-01-29', '2010-02-28', 'P-0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081_negative__17() {
		$this->examine_diff('2010-01-28', '2010-02-28', 'P-0Y1M0DT0H0M0S', 31);
	}
	public function test_bug_49081_negative__18() {
		$this->examine_diff('2010-01-27', '2010-02-28', 'P-0Y1M1DT0H0M0S', 32);
	}
	public function test_bug_49081_negative__19() {
		$this->examine_diff('2010-01-01', '2010-03-01', 'P-0Y2M0DT0H0M0S', 59);
	}
	public function test_bug_49081_negative__20() {
		$this->examine_diff('2010-01-31', '2010-03-01', 'P-0Y1M1DT0H0M0S', 29);
	}
	public function test_bug_49081_negative__21() {
		$this->examine_diff('2010-01-31', '2010-03-27', 'P-0Y1M27DT0H0M0S', 55);
	}
	public function test_bug_49081_negative__22() {
		$this->examine_diff('2010-01-31', '2010-03-28', 'P-0Y1M28DT0H0M0S', 56);
	}
	public function test_bug_49081_negative__23() {
		$this->examine_diff('2010-01-31', '2010-03-29', 'P-0Y1M29DT0H0M0S', 57);
	}
	public function test_bug_49081_negative__24() {
		$this->examine_diff('2010-01-31', '2010-03-30', 'P-0Y1M30DT0H0M0S', 58);
	}
	public function test_bug_49081_negative__25() {
		$this->examine_diff('2010-01-31', '2010-03-31', 'P-0Y2M0DT0H0M0S', 59);
	}
	public function test_bug_49081_negative__26() {
		$this->examine_diff('2010-01-30', '2010-03-31', 'P-0Y2M1DT0H0M0S', 60);
	}
	public function test_bug_49081_negative__27() {
		$this->examine_diff('2009-01-01', '2009-01-31', 'P-0Y0M30DT0H0M0S', 30);
	}
	public function test_bug_49081_negative__28() {
		$this->examine_diff('2010-02-28', '2010-03-27', 'P-0Y0M27DT0H0M0S', 27);
	}
	public function test_bug_49081_negative__29() {
		$this->examine_diff('2010-02-28', '2010-03-28', 'P-0Y1M0DT0H0M0S', 28);
	}
	public function test_bug_49081_negative__30() {
		$this->examine_diff('2010-02-28', '2010-03-29', 'P-0Y1M1DT0H0M0S', 29);
	}
	public function test_bug_49081_negative__31() {
		$this->examine_diff('2010-02-27', '2010-03-27', 'P-0Y1M0DT0H0M0S', 28);
	}
	public function test_bug_49081_negative__32() {
		$this->examine_diff('2010-02-26', '2010-03-27', 'P-0Y1M1DT0H0M0S', 29);
	}
	/**#@-*/

	/**#@+
	 * Massive dates
	 */
	public function test_massive_positive() {
		$end = new DateTimeSolution;
		$end->setDate(333333, 1, 1);

		$start = new DateTimeSolution;
		$start->setDate(-333333, 1, 1);

		$this->examine_diff($end, $start, 'P+666666Y0M0DT0H0M0S', 243494757);
	}
	public function test_massive_negative() {
		$end = new DateTimeSolution;
		$end->setDate(-333333, 1, 1);

		$start = new DateTimeSolution;
		$start->setDate(333333, 1, 1);

		$this->examine_diff($end, $start, 'P-666666Y0M0DT0H0M0S', 243494757);
	}
	/**#@-*/

	/**#@+
	 * Absolute
	 */
	public function test_absolute_7() {
		$this->examine_diff('2009-01-14', '2009-01-07', 'P+0Y0M7DT0H0M0S', 7, true);
	}
	public function test_absolute_negative_7() {
		$this->examine_diff('2009-01-07', '2009-01-14', 'P+0Y0M7DT0H0M0S', 7, true);
	}
	/**#@-*/

	/**#@+
	 * Straight up days calculations
	 */
	public function test_days_with_time() {
		$date1 = new DateTimeSolution('2000-01-01 00:00:00');
		$date2 = new DateTimeSolution('2001-03-04 04:05:06');
		$interval = $date1->diff($date2);
		$this->assertEquals(428, $interval->format('%a'));
	}
	public function test_days_with_time_inverted() {
		$date1 = new DateTimeSolution('2000-01-01 00:00:00');
		$date2 = new DateTimeSolution('2001-03-04 04:05:06');
		$interval = $date2->diff($date1);
		$this->assertEquals(428, $interval->format('%a'));
	}
	public function test_days_without_time() {
		$date1 = new DateTimeSolution('2000-01-01 00:00:00');
		$date2 = new DateTimeSolution('2001-03-04 00:00:00');
		$interval = $date1->diff($date2);
		$this->assertEquals(428, $interval->format('%a'));
	}
	public function test_days_without_time_inverted() {
		$date1 = new DateTimeSolution('2000-01-01 00:00:00');
		$date2 = new DateTimeSolution('2001-03-04 00:00:00');
		$interval = $date2->diff($date1);
		$this->assertEquals(428, $interval->format('%a'));
	}
	/**#@-*/
}

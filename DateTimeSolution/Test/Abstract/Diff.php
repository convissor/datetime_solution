<?php /** @package DateTimeSolution_Test */

/**
 * Contains tests for the diff() method
 *
 * @package DateTimeSolution_Test
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2009-2010
 * @license http://www.analysisandsolutions.com/software/license.htm Simple Public License
 */
abstract class DateTimeSolution_Test_Abstract_Diff extends PHPUnit_Framework_TestCase {
	/**
	 * Automatically sets time zone to America/New_York before each test
	 */
	public static function setUpBeforeClass() {
		date_default_timezone_set('America/New_York');
	}

	/**
	 * Provides a consistent interface for executing date diff tests
	 *
	 * @param string|DateTimeSolution $end_date  the end date in YYYY-MM-DD
	 *                                format (can include time HH:MM:SS)
	 *                                or a DateTimeSolution object
	 * @param string|DateTimeSolution $start_date  the starting date in YYYY-MM-DD
	 *                                format (can include time HH:MM:SS)
	 *                                or a DateTimeSolution object
	 * @param string $expect_interval_spec  the expected result of the tests, in
	 *               the special interval specification used for this test suite.
	 *               This spec includes a "+" or "-" after the "P" in order to
	 *               indicate which direction to go.
	 * @param int $expect_days  the number of days to compare with the
	 *            interval's "days" property
	 * @param bool $absolute  should the result always be a positive number?
	 *
	 * @return void
	 */
	protected function examine_diff($end_date, $start_date, $expect_interval_spec, $expect_days, $absolute = false) {
		if (is_string($start_date)) {
			$start = new DateTimeSolution($start_date);
		} else {
			$start = clone $start_date;
			$start_date = $start->format('Y-m-d H:i:s T');
		}
		if (is_string($end_date)) {
			$end = new DateTimeSolution($end_date);
		} else {
			$end = clone $end_date;
			$end_date = $end->format('Y-m-d H:i:s T');
		}

		$result_interval = $start->diff($end, $absolute);
		$result_interval_spec = $result_interval->format('P%R%yY%mM%dDT%hH%iM%sS');

		// Also make sure add()/sub() works the same way as diff().
		$end_date_from_expect = $this->arithmatic_from_interval($start, $expect_interval_spec);
		$end_date_from_result = $this->arithmatic_from_interval($start, $result_interval_spec);

		$expect_full = "$end_date - $start_date = $expect_interval_spec. "
			. "$start_date + $expect_interval_spec = $end_date_from_expect";
		$result_full = "$end_date - $start_date = $result_interval_spec. "
			. "$start_date + $result_interval_spec = $end_date_from_result";

		$this->assertEquals($expect_full, $result_full);
		$this->assertEquals($expect_days, $result_interval->days, 'Days do not match.');
	}

	/**
	 * Provides a consistent interface for addition or subtraction
	 * using our interval format
	 *
	 * @param DateTimeSolution $start_date  the starting date
	 * @param string $custom_interval_spec  the special interval specification
	 *               used for this test suite.  This spec includes a "+" or "-"
	 *               after the "P" in order to indicate which direction to go.
	 *
	 * @return string   the date in YYYY-MM-DD HH:MM:SS format
	 */
	protected function arithmatic_from_interval($start_date, $custom_interval_spec) {
		$start = clone $start_date;

		preg_match('/^P([+-])(.+)$/', $custom_interval_spec, $atom);
		$interval = new DateIntervalSolution('P' . $atom[2]);
		if ($atom[1] == '+') {
			$date = $start->add($interval);
		} else {
			$date = $start->sub($interval);
		}
		return $date->format('Y-m-d H:i:s T');
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
}

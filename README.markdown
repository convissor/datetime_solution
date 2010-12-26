Overview
========
The DateTime Solution is a compatibility layer for PHP's DateTime
functionality.  It addresses bugs in diff() and modify().  It also
provides add(), sub(), and DateInterval functionality to users of
PHP 5.2.

NOTE: the diff() function only deals with date components at the moment.

Time components will be enabled once approaches are determined for
fixing bugs in PHP's C libraries regarding daylight/standard time
transitions.


Installation
============
Location
--------
Copy all files and directories found *inside* the `datetime_solution`
to your include directory.  Do not copy the `datetime_solution` directory.

Autoload
--------
The DateTime Solution's files follow the PEAR naming convention, where the
"_" in class names become "/" in the file paths.  So, for example, the
DateTimeSolution_Diff class can be found in the file named
`<include_dir>/DateTimeSolution/Diff.php`.  This permits the use of a
standard autoload function.

In fact, the DateTime Solution requires the use of an autoloader.  A sample
function is provided in `datetime_solution/taasc_autoload.php`.  The given
function checks the current directory and subdirectories first, then tries
via the include_path.

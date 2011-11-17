#! /bin/bash

# Executes the same set of phpunit tests against both PHP's native DateTime
# methods and the DateTime Solution's userland methods
#
# Usage:  ./AllTests.sh
#
# Using shell script instead of creating a PHPUnit AllTests script because
# the Native and Userland tests declare parent classes with the same name.
#
# Author: Daniel Convissor <danielc@analysisandsolutions.com>
# Copyright: The Analysis and Solutions Company, 2009-2011
# License: http://www.analysisandsolutions.com/software/license.htm Simple Public License
# Link: http://www.analysisandsolutions.com/software/datetime_solution/


echo ""
echo "=============   ABOUT TO RUN NATIVE TESTS   ============="
phpunit Native_AllTests

echo ""
echo "============   ABOUT TO RUN USERLAND TESTS   ============"
phpunit Userland_AllTests

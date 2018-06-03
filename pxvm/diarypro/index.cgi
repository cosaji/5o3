#!/usr/local/bin/perl

#Web Diary Professional
#
#Copyright(C) 2002-2008 Knight, All rights reserved.
#Mail ... support@web-liberty.net
#Home ... http://www.web-liberty.net/

package main;

use strict;
use lib qw(./lib);
use webliberty::App;

my $app_ins = new webliberty::App;
$app_ins->run;

exit;

<?php
# Checks current directory for year and assumes that
# launch happens on first of April, so it should work
# from year to year. Change anything if needed.
# Time is ISO 8601 formatted, example:
# 2020-04-01T00:00:00+03:00
$config = include("config.php");
if ($config["debug"] == 1 && $config["test_launch"] == true) {
    return $config["test_launch_date"];
}
$current_year = require("current_year.php");
$launch_month = "04";
$launch_date = "01";
$hours = "00";
$minutes = "00";
$seconds = "00";
$date_string = $current_year . "-" . $launch_month . "-" . $launch_date;
$time_string = $hours . ":" . $minutes . ":" . $seconds;
$time_difference = "+03:00";  # East European DST, hopefully we won't have to change to DST and back twice a year in a few years...
$date_object = date_create($date_string . "T" . $time_string . $time_difference);
return $date_object;
?>

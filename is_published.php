<?php
$launch_date = require "launch_date.php";
$current_date = new DateTime();
$published = $current_date->getTimestamp() >= $launch_date->getTimestamp();
return $published;
?>

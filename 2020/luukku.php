<?php
date_default_timezone_set('Europe/Helsinki');
$config=include("config.php");
if ($config['debug'] == 0 && ! require "is_published.php") {
    header("Location: lähtölaskenta/");
    die();
}

header("Content-type: text/html; charset=utf-8");

require "is_open.php";
$day = intval($_GET['d']);
$path = './luukut/' . $day . '.html';

include("luukut/template.php")
?>

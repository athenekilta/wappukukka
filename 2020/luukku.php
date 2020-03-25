<?php
date_default_timezone_set('Europe/Helsinki');
if (! require "is_published.php") {
    header("Location: lähtölaskenta/");
    die();
}

header("Content-type: text/html; charset=utf-8");

require "is_open.php";
$day = intval($_GET['d']);
$path = './luukut/' . $day . '.html';

include("luukut/template.php")
?>

<?php
date_default_timezone_set('Europe/Helsinki');
if (! require "is_published.php") {
    header("Location: lähtölaskenta/");
    die();
}

header("Content-type: text/html; charset=utf-8");

/* julkaistaan huhtikuussa */
$pubMonth = 4;
if(intval(file_get_contents("debug.txt")) == 1) {
    # Näytä kaikki luukut, jos debug on päällä eli debug.txt == 1
    $pubMonth = 3;
    echo "TESTING<br>";
} 

function dInt($format) {
    return intval(date($format));
}

function isOpen($d, $pubMonth) {
    /*luukku 100 on aina auki (ns. mainos)*/
    if ($d > 100) {
        return true;
    }
    /*pitaa vaihtaa vuosittain */
    # Toivottavasti ei enää pidä, ainakaan vuosittain 
    # t. CTO 2020
    # mutta älkää lainatko mua tästä
    $year = (int) (require "launch_date.php")->format('Y');
    if(dInt('Y') > $year) {
        return true;
    }
    if(dInt('n') > $pubMonth) {
        return true;
    }
    if(dInt('n') === $pubMonth && dInt('d') >= $d) {
        return true;
    }
    return false;
}

$day = intval($_GET['d']);
$path = './luukut/' . $day . '.html';
/*
if(!file_exists($path) || !isOpen($day, $pubMonth)) {
    die("Ei oo semmosta luukkua, ainaskaan vielä tässä kohtaa kuuta :(<br/> Odota kärsivällisesti, kyllä se sieltä vielä tulee.");
} else {
    readfile($path);
}
 */
include("luukut/template.php")
?>

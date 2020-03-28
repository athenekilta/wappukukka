<?php
$config = include("config.php");
/* julkaistaan huhtikuussa */
if($config['debug'] == 1) {
    echo "TESTING<br>";
} 

function dInt($format) {
    return intval(date($format));
}

function isOpen($d) {
    $config = include("config.php");
    $year = (int) (require "launch_date.php")->format('Y');
    $pubMonth = (int) (require "launch_date.php") -> format('m');
    if ($config['debug'] === 1) {
        $pubMonth -= 1;
    }
    /*luukku 100 on aina auki (ns. mainos)*/
    if ($d > 100) {
        return true;
    }

    if ($config['show_all_luukkus'] === 1) {
        return true;
    }
    /*pitaa vaihtaa vuosittain */
    # Toivottavasti ei enää pidä, ainakaan vuosittain 
    # t. CTO 2020
    # mutta älkää lainatko mua tästä
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
?>

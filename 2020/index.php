<?php
if (! require "is_published.php") {
    # Redirect users to countdown
    header("Location: lähtölaskenta/");
    die();
} else {
    header("Content-type: text/html; charset=utf-8");
    # Give users the content of etusivu.html
    readfile("etusivu.html");
}
?>


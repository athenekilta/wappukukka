<?php header('Content-type: text/html; charset=utf-8'); ?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta property="og:title" content="Wappukukka <?php echo require("../current_year.php") ?>" />
    <title>Wappukukka <?php echo require("../current_year.php") ?> Countdown</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<header>
		<h1>Wappukukka <?php echo require("../current_year.php") ?></h1>
	</header>
	<div id="maincontainer">
		<div class="info normal">Aikaa jäljellä julkistamiseen</div>
		<div id="timer" class="timer big">0 h 0 min 0 s</div>
		<br>
		<br>
		<!--<a href="https://athene.fi/wappukukka">siirry Wappukukkaan</a>-->
	</div>





	<footer>
        <div class="small">
            Johannes Vainion p&auml;ivitt&auml;m&auml; versio Atte Kein&auml;sen muokkaamasta 
            Vesa Laakson Marathon-laskurista, jota kukaan ei ole päivittänyt ainakaan viimeiseen kolmeen vuoteen.
            <br>
            2020 update: Sampo Rapeli teki tälle laskurille kamalia asioita, mutta hyvässä tarkoituksessa. Päiväyksen asettaminen joka vuosi erikseen on nyt ehkä historiaa.
        </div>
	</footer>

	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        (function ($) {
            var ts = parseInt(<?php echo (require "../launch_date.php")->getTimestamp(); ?>);
            var releaseTime = new Date(ts * 1000).getTime();
        var $timer = $('#timer');

        function tick() {
            var diff = releaseTime - new Date().getTime();

            if (diff > 0) {
                var secs = Math.floor(diff / 1000) % 60;
                var mins = Math.floor(diff / 1000 / 60) % 60;
                var hours = Math.floor(diff / 1000 / 60 / 60);

                $timer.text(hours + " h " + mins + ' min ' + secs + ' s');
            }
            else {
                window.location = "../";
            }
        }

        setInterval(tick, 1000);
        tick();

        })(jQuery.noConflict());
    </script>
</body>
</html>

<?php function top($num, $classes = 'default') { ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <? /* NOTE FROM 2015: this num-specific thing was done in 2014 and I
    reused it, but the classes parameter would really be so much better
    for differentiating an ad */ ?>
    <title><?php if ($num == 100) { ?>Mainos<?php } else { ?>Luukku <?=$num ?><?php } ?></title>

    <link rel="stylesheet" href="css/luukku.css" />
    <link rel="stylesheet" href="luukut/<?php echo (string) $num;?>.css">
    <meta name="robots" content="noindex, nofollow" />
    <?php if ($num != 1) { ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php } ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script src="js/jqswipe.js"></script>-->
    <script src="js/main.js"></script>
<?php if ($_SERVER['SERVER_NAME'] != 'localhost') { ?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-26283687-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
<?php }

if (function_exists('after_head')) after_head();

?>

  </head>
  <body class="<?=$classes?> luukku-<?=$num?>">
    <header>
      <div class="back"><a id="backlink" href="index.php">« Kalenteriin</a></div>
      <div class="id"><span class="l"><?php if ($num == 100) { ?>Mainos</span><?php } else { ?>Luukku</span> no. <span class="n"><?=$num ?></span><?php } ?></div>
    </header>
    <article>
<?php } /* function 'top' ends */ ?>

<?php function bottom($num) { ?>
    </article>
    <footer class="vote-footer">

	  <?php if ($num > 1) { ?>
	  <a class="nextprev prev" href="luukku.php?d=<?=$num-1 ?>">« edellinen</a>
	  <?php } ?>

       <span><?php
      //Super simple & naive statistics system for single luukkus
      //Based on IP address (may cause problems with school machines with same IPs)
      $statFileName = "luukut/stats/".$num.".stat";
      $isVotingNow = isset($_POST["votethisarticle"]);
      $readerHasVoted = false;
      $voterCount = 0;
      $ipAdresses = array();
      $currentIP = $_SERVER['REMOTE_ADDR'];

      //Check if the statistics list file exists, create if needed
      if (!file_exists($statFileName)) {file_put_contents($statFileName,"");}
      $fileHandle = fopen($statFileName, "r+");
      $fileSize = filesize($statFileName);

      if ($fileSize > 0) {
        $ipAdresses = explode("\n", fread($fileHandle, filesize($statFileName)));
      }

      $voterCount = sizeof($ipAdresses);

      if (in_array($currentIP, $ipAdresses)) {
        $readerHasVoted = true;
      }
      else if ($isVotingNow) {
        fwrite($fileHandle, "\n".$currentIP);
        $readerHasVoted = true;
        $voterCount += 1;
      }

      fclose($fileHandle);

      if ($readerHasVoted) {
        echo '<span>Olet jo äänestänyt!</span> ';
      }
      else {
        echo '<form method="post" action=""><button name="votethisarticle" id="vote-this-article">Tämä oli hyvä luukku!</button></form> ';
      }

      if ($voterCount > 0) {
        echo "<span>Tämä luukku on saanut $voterCount lukijan äänen.</span>";
      }
      else {
        echo "<span>Anna ensimmäisenä äänesi luukulle!</span>";
      }


?></span>
    <?php if($num != 31){
      if(isOpen($num+1, 4)){ ?>
        <a class="nextprev next" href="luukku.php?d=<?=$num+1 ?>">seuraava »</a>
    <?php } } ?>

    </footer>
  </body>
</html>
<?php } ?>

<?php
# now actually construct the page
echo top($day);
# Include the {day_number}.html, which should be the actual content from kukan toimitus
$path = "luukut/" . $day . ".html";
if(!file_exists($path) || !isOpen($day, $pubMonth)) {
    die("Ei oo semmosta luukkua, ainaskaan vielä tässä kohtaa kuuta :(<br/> Odota kärsivällisesti, kyllä se sieltä vielä tulee.");
} else {
    readfile($path);
}

echo bottom($day);
?>

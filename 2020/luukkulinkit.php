<?php
require "is_open.php";
?>
<div id="luukkulinkit">
    <?php
    for ($d = 1; $d <= 30; $d++) {
        if (isOpen($d)) {
            echo '<a href="luukku.php?d=' . $d . '" class="luukkulinkki" id="luukku' . $d . '">' . $d . '</a>';
        }
    }
    ?>
</div>

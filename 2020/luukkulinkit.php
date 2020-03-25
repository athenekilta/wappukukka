<div id="luukkulinkit">
    <?php
    require "is_open.php";
    for ($d = 1; $d <= 31; $d++) {
        if (isOpen($d, 4)) {
            echo '<a href="luukku.php?d=' . $d . '"><div class="luukkulinkki">' . $d . '</div></a>';
        }
    }
    ?>
</div>

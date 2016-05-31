
<?php

function taim($uur, $min, $sec) {
    $antw = ($uur * 60 * 60) + ($min * 60) + $sec;
    return $antw;
}


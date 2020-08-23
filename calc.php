<?php
    include_once "pageTemplate.php";

    function CalcTime($Size, $Speed) {
        $Size = $Size * 1024 * 1024; //into KBytes
        return ($Size / $Speed) / (60*60); 
    }

    function CalcTimeBefore($Time, $Speed) {
        return ($Time * ($Speed * 60 * 60)) / 1024;
    }

    $S = 20; $V = 650;
    echo "Size: " . $S . " Gb." . "<br>" .
            "Speed (KBit/s): " . $V;
    echo "<br>" . round(CalcTime($S, $V), 2) . " hours.";
    echo "<br>" . round(CalcTimeBefore(4, 150), 2) . " MBytes.";
?>
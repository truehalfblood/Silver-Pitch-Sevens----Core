<?php
function check_handling() {

    global $player;
    global $current, $number;


    /* handling is first of all influenced by two decisions, either they can knock or not. Thats a 50-50 chance */

    $player_handling = 50;

    //the other 50 is gotten from the players value out of 25 converted to out of 50, that is *2

    $player_handling = $player_handling + ($player[$current][$number][2] * 2.3);

    //the higher the value of the skill, the less the chance he will knock

    $handling_chance = mt_rand(1, 100);

    if ($handling_chance <= $player_handling) {

        return $result = TRUE;
    } else {

        return $result = FALSE;
    }
}




?>
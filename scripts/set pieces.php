<?php
function form_ruck() {
    global $player, $ground, $gain, $minutes;
    global $current, $number, $opponent;
    global $tendancy_to_pass, $ruck_commit, $attack_method, $defence_method;
}


function call_maul() {
    global $player, $ground, $gain, $minutes;
    global $current, $number, $opponent, $team;
    global $tendancy_to_pass, $ruck_commit, $attack_method, $defence_method;
    //function calls for a maul, in the event a forward is brought down
    //first checks to see the endurance of a player to see how far he pushed

    $gain = (mt_rand(0.125, mt_rand(0.199, 0.225))) * $player[$current][$number][6];

    determine_side();

    //number of players in a maul is equal to that off a ruck
    //here is where the code gets ugly PS SOrry for this but had to do it this way.
    //selection of opponent players to be in the ruck
    $total_strength = 0; //refers to the total strength of the opponent defending the scrum.
    $opponent_enduarance = 0; ////refers to the total endurance of the opponent defending the scrum.

    if ($ruck_commit[$opponent] == 1) {
        $first_opponent = mt_rand(0, 2);
        $total_strength = $player[$opponent][$first_opponent][7];
        $opponent_enduarance = $player[$opponent][$first_opponent][6];
    } elseif ($ruck_commit[$opponent] == 2) {

        $first_opponent = mt_rand(0, 2);
        $second_opponent = mt_rand(3, 6);


        // add up their strength

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {

                $l = $first_opponent;
            } else {

                $l = $second_opponent;
            }
            $total_strength = $total_strength + $player[$opponent][$l][7];
            $opponent_enduarance = $opponent_enduarance + $player[$opponent][$l][6];
        }
    } else {
        $first_opponent = mt_rand(0, 2);
        $second_opponent = mt_rand(3, 6);
        $third_opponent = mt_rand(3, 6);
        $total_strength = 0;

        if ($third_opponent == $second_opponent && $third_opponent < 6) {

            $third_opponent = $third_opponent + 1;
        } else {

            $third_opponent = mt_rand(0, 2);
            if ($third_opponent == $first_opponent) {

                $third_opponent = $third_opponent + 1;
            }
        }
        // add up their strength

        for ($i = 1; $i <= 3; $i++) {
            if ($i == 1) {

                $o = $first_opponent;
            } elseif ($i == 2) {

                $o = $second_opponent;
            } elseif ($i == 3) {

                $o = $third_opponent;
            }
            $total_strength = $total_strength + $player[$opponent][$o][7];
            $opponent_enduarance = $opponent_enduarance + $player[$opponent][$o][6];
        }
    }

//*******************************************************************************
//*******************************************************************************
    //call for current team.
    $total_strength2 = 0;
    $current_enduarance = 0;
    if ($ruck_commit[$current] == 1) {
        $first_current = mt_rand(0, 2);
        $total_strength2 = $player[$opponent][$first_current][7];
        $current_enduarance = $player[$current][$first_current][6];
    } elseif ($ruck_commit[$current] == 2) {

        $first_current = mt_rand(0, 2);
        $second_current = mt_rand(3, 6);


        // add up their strength

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {

                $q = $first_current;
            } else {

                $q = $second_current;
            }
            $total_strength2 = $total_strength2 + $player[$current][$q][7];
            $current_enduarance = $current_enduarance + $player[$current][$q][6];
        }
    } else {
        $first_current = mt_rand(0, 2);
        $second_current = mt_rand(3, 6);
        $third_current = mt_rand(3, 6);
        $total_strength2 = 0;

        if ($third_current == $second_current && $third_current < 6) {

            $third_current = $third_current + 1;
        } else {

            $third_current = mt_rand(0, 2);
            if ($third_current == $first_current) {

                $third_current = $third_current + 1;
            }
        }
        // add up their strength

        for ($i = 1; $i <= 3; $i++) {
            if ($i == 1) {

                $p = $first_current;
            } elseif ($i == 2) {

                $p = $second_current;
            } elseif ($i == 3) {

                $p = $third_current;
            }
            $total_strength2 = $total_strength2 + $player[$current][$p][7];
            $current_enduarance = $current_enduarance + $player[$current][$p][6];
        }
    }

    if (mt_rand(1, 100) <= (($total_strength2 * 100) / 100)) {
        //current team wins maul
        $gain = (mt_rand(0.125, mt_rand(0.199, 0.225))) * ($current_enduarance);

        determine_side();

        if ($ruck_commit[$current] == 3) {
            if ($third_current < 6) {

                $number = $third_current + 1;
            } else {

                $number = 6;
            }
        } elseif ($ruck_commit[$current] == 2) {
            if ($second_current < 6) {

                $number = $second_current + 1;
            } else {

                $number = 6;
            }
        } else {


            $number = mt_rand(3, 6);
        }



        echo $team[$current] . " maintain possesion after that maul. The ball is gotten out to " . $player[$current][$number][0];
    } else {
        $gain = (mt_rand(0.125, mt_rand(0.199, 0.225))) * ($opponent_enduarance);

        determine_side();

        if ($ruck_commit[$opponent] == 3) {
            if ($third_opponent < 6) {

                $number = $third_opponent + 1;
            } else {

                $number = 6;
            }
        } elseif ($ruck_commit[$opponent] == 2) {
            if ($second_opponent < 6) {

                $number = $second_opponent + 1;
            } else {

                $number = 6;
            }
        } else {


            $number = mt_rand(3, 6);
        }

        echo $team[$opponent] . " snatch and win possesion after that maul, they quickly get the ball to " . $player[$opponent][$number][0];

        change_of_possesion();
    }
}

?>
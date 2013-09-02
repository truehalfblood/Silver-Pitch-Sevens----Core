<?php

include('main/commentary_functions.php');
include('scripts/set pieces.php');
include ('scripts/referee functions.php');

function change_of_possesion() {

    global $current, $opponent;

    if ($current == 1) {

        $opponent = 1;
        $current = 2;
    } else {

        $current = 1;
        $opponent = 2;
    }
}



function kickoff() {
    global $player;
    global $weather;
    global $current, $number;

    /* kicking is tested against a total of 100, if the random number falls under the range of the kicking ability then
      the kick was successful and possession was maintained, this is because not all kicks are always successful. */

    //the total is 25 so 25=100 what will be e.g.18... = (18*100)/25
    $kicking_testing = ($player[$current][$number][8] * 100) / 25;

    $success_kick = mt_rand(1, 100);

    if ($success_kick <= $kicking_testing) {

        //kick was successful and possession was maintained
        $result = 1;
    } else {
        $result = 0;
    }

    //now distance is determined by weather,so this is purely random.

    if ($weather == "windy") {

        $distance = mt_rand(10, 32);
        $inside_field = 1;
    } elseif ($weather == "sunny") {

        $distance = mt_rand(8, 22);
        $inside_field = 1;
    } elseif ($weather == "stormy") {

        $distance = mt_rand(28, 46);
        $inside_field = 1;
    } elseif ($weather == "dry") {

        $distance = mt_rand(28, 46);
        $inside_field = 1;
    }
    return array($result, $distance, $inside_field);
}

function determine_side() {
    /* determines which side the ball is, in terms of the ground in metres. THis of course will not be displayed
      to the user during production but is only for development processes. Team One;s home side starts at 0 metres
      and they make a try at 100 metres. Team two has it vice versa. */

    global $current;
    global $ground;
    global $gain;

    if ($current == 1 && (100 > ($ground + $gain))) {

        $ground = $ground + $gain;
    } elseif ($current == 2 && (($ground - $gain) > 0)) {

        $ground = $ground - $gain;
    } else {
        
    }

    return $ground;
}

function after_kick() {

    global $player,$team;
    global $current, $number;
    global $gain, $result;
    global $ground;
    global $message_commentary;

    determine_side();

    if ($result == 1) {
        /* since the decision of the direction the ball will go to is often based on guessing which side has
          the weaker player ... I will leave this part to be random, in that whoever receives the ball is received
          randomly. */
        //possession is kept, hence receiver +-will be on the current side

        $number = mt_rand(0, 2);
        if ($number == 3) {

            $number = 4;
        }
		
		echo "<b>" . $player[$current][$number][0] ." from ".$team[$current]. "</b> snatches it from the air and maintains 
				possesion for his team. ";

    } else {


        change_of_possesion();

        $number = mt_rand(0, 2); 
		echo "<b>" . $player[$current][$number][0] ." from ".$team[$current]. "</b> recieves it after the kick. ";

    }



    $message_commentary = field_position();

  
    echo" .It is recieved $gain metres out! at $ground metres $message_commentary ";
}

function pass_ball() {
    global $number;

    if ($number == 7) {
        $number = 7;
    } else {

        if (mt_rand(1, 100) <= 35) {

            $next_number = mt_rand(0, 6);

            if ($next_number == $number) {

                $number = $number + 1;
            } else {

                $number = $next_number;
            }
        } else {

            $number = $number + 1;
        }
    }
    return $number;
}






function check_roles() {
    /* Checks player position and calculates how he plays accordingly. */
    global $player, $ground, $gain, $minutes;
    global $current, $number, $opponent;
    global $tendancy_to_pass, $ruck_commit, $attack_method, $defence_method;


    if ($number == 0 || $number == 1 || $number == 2) {
        //checks if the player is a forward
        $role = "forward";


        if (mt_rand(1, 10) <= $tendancy_to_pass[$current] * (0.75)) {
            /* Goes back to tactics to see tactics set for the game. Forwards tend to attack more using
              strength as a major skill */

            //the player passes the ball, to the next one in position
            echo $player[$current][$number][0] . " passes it to ";

            pass_ball();
            //$number = $number + 1;
            //average gain in ground is set to be between 100
            $gain = mt_rand(2, 5);

            //ground gained is updated
            determine_side();

            echo $player[$current][$number][0] . " and he recieves it at $ground. ";

            //check elapsed time
            //check_time();


            //END OF FUNCTION BRANCH
        } else {
            //player is not to pass and moves to set up a maul/ATTACK

            echo $player[$current][$number][0] . " goes in for the attack at $ground. ";

            if ($attack_method[$current] == "aggressive" && $defence_method[$opponent] == "wide") {
                /* wide defence means players are spread across the field. so likely-hood of encountering
                  one defender is high,while aggressive attack means the main skills that are to be tested are
                  strength, fitness and endurance */

                $opponent_player = mt_rand(0, 6); //random defender is selected

                $total_strength = $player[$current][$number][7] + $player[$opponent][$opponent_player][7];

                $current_strength = ($player[$current][$number][7] * 100) / $total_strength;

                if (mt_rand(1, 100) <= $current_strength) {
                    //the higher the strength over their opponent, the higher the chance of breaking through,hence the random generator

                    echo $player[$current][$number][0] . " goes over " . $player[$opponent][$opponent_player][0] . " like a truck. ";
                } else {

                    echo $player[$current][$number][0] . " is immediatley stopped by the defenders.
									" . $player[$opponent][$opponent_player][0] . " did a good job to stop that train. ";

                    call_maul(); //calls for a maul
                }
                //check elapsed time
//check_time();
                //END OF FUNCTION BRANCH
            } elseif ($attack_method[$current] == "aggressive" && $defence_method[$opponent] == "group") {

                if (mt_rand(2, 3) == 2) {
                    $opponent_player = mt_rand(0, 5); //random defender is selected

                    $opponent_player2 = $opponent_player + 1;

                    $total_strength = $player[$current][$number][7] + $player[$opponent][$opponent_player][7] + $player[$opponent][$opponent_player2][7];

                    $current_strength = ($player[$current][$number][7] * 100) / $total_strength;

                    if (mt_rand(1, 100) <= $current_strength) {
                        //the higher the strength over their opponent, the higher the chance of breaking through,hence the random generator

                        echo $player[$current][$number][0] . " has displayed great strenghth there as he knocks off two defenders. ";
                    } else {

                        echo $player[$current][$number][0] . " is immediatley stopped by
										" . $player[$opponent][$opponent_player][0] . " and " . $player[$opponent][$opponent_player2][0];

                        call_maul(); // a maul is called
                    }

                    //check elapsed time
                    //check_time();

                    //END OF FUNCTION BRANCH
                } else {
                    //*******************************************************************************
                    //*******************************************************************************
                    //A repetition of the above function only difference is defenders involved are three.

                    $opponent_player = mt_rand(0, 4); //random defender is selected

                    $opponent_player2 = $opponent_player + 1;

                    $opponent_player3 = $opponent_player + 2;

                    $total_strength = $player[$current][$number][7] + $player[$opponent][$opponent_player][7] + $player[$opponent][$opponent_player2][7] + $player[$opponent][$opponent_player3][7];

                    $current_strength = ($player[$current][$number][7] * 100) / $total_strength;

                    if (mt_rand(1, 100) <= $current_strength) {
                        //the higher the strength over their opponent, the higher the chance of breaking through,hence the random generator

                        echo $player[$current][$number][0] . " has displayed great strenghth there as he knocks off three     defenders. ";
                    } else {

                        echo $player[$current][$number][0] . " is immediatley stopped by
										" . $player[$opponent][$opponent_player][0] . " and " . $player[$opponent][$opponent_player3][0];

                        call_maul(); // a maul is called
                    }
                    //check elapsed time
                    //check_time();

                    //*******************************************************************************
                    //*******************************************************************************
                }
            }
        }
    } else {
        //the player is a back(9-15)

        $role = "Role: Back,";

        echo $role;
    }
}

?>
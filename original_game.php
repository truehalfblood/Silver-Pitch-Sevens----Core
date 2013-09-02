<title>Silver Pitch Sevens 2</title>
<style type="text/css">
    body,td,th {
        font-family: "Century Gothic";
        font-size: 18px;
        color: #000;
    }
    body {
        background-color: #FFF;

    }
</style>
The bars beneath the player names represent the individual player's match readiness for the match such as awareness and conditioning.
<?php
include('game_functions.php');
include('functions.php');
//include('commentary_functions.php');

connect();

//basic variables
$minutes = 840; //for first half
$team = array();
$team[1] = 'Western Bulls';
$team[2] = 'Strathmore University';
$weather = "sunny";


echo "<h2 class=\"title\">".$team[1]." vs ".$team[2]." </h2>";
//tactics section
//team1

$tendancy_to_pass[] = array();
$ruck_commit[] = array();
$attack_method[] = array();
$defence_method[] = array();

$attack_method[1] = "aggressive";
$defence_method[1] = "wide";

if ($attack_method[1] == "technical") {

    $tendancy_to_pass[1] = mt_rand(55, 75);
} else {

    $tendancy_to_pass[1] = mt_rand(35, 55);
}



if ($defence_method[1] == "wide") {

    $ruck_commit[1] = mt_rand(1,2);
} else {

    $ruck_commit[1] = mt_rand(2,3);
}



//team2

$attack_method[2] = "aggressive";
$defence_method[2] = "wide";

if ($attack_method[2] == "technical") {

    $tendancy_to_pass[2] = mt_rand(55, 75);
} else {

    $tendancy_to_pass[2] = mt_rand(35, 55);
}


if ($defence_method[2] == "wide") {

    $ruck_commit[2] = mt_rand(1,2);
} else {

    $ruck_commit[2] = mt_rand(2,3);
}


//******************************************************************************
//BASICALLY TEAMS ARE GOTTEN FORM THE DATABASE
for ($i = 1; $i <= 7; $i++) {
    $player[1][] = get_player($team[1], $i); //players are gotten from the database and stored in the array player
}

for ($i = 1; $i <= 7; $i++) {
    $player[2][] = get_player($team[2], $i);
}
//*******************************************************************************
//*******************************************************************************
/* match preparedness THis constitutes of several factors, e.g. conditioning, fatigue
  some game functions that need to be global in order to access the player variable array */

$conditioning = array();

for ($i = 0; $i <= 6; $i++) {

	//the variable conditioning with the index 1 or 2 represents which team it is
    $conditioning[1][$i] = (($player[1][$i][10] / 10) * 0.75) + mt_rand(0, 2.5);

    $conditioning[2][$i] = (($player[2][$i][10] / 10) * 0.75) + mt_rand(0, 2.5);
}

//*******************************************************************************
//display of players and teams
echo "<div  style=\"float:left; width: 50%;\">";

echo "<h3 class=\"silver\" ><b>" . $team[1] . "</b></h3>";

for ($i = 0; $i <= 6; $i++) {
    $jersey_number = $i + 1;
    echo $jersey_number . ". <span class=\"silver\" float=\"right\">" . $player[1][$i][0] . " " . $conditioning[1][$i] . "<br></span><br>";
	

}

echo "</div>";

echo "<div style=\"float:right; width: 50%;\">";
echo "<h3 class=\"silver\"><b>" . $team[2] . "</b></h3>";
for ($i = 0; $i <= 6; $i++) {
    $de = $i + 1;
    echo $de . ". <span class=\"silver\" float=\"left\" >" . $player[2][$i][0] . " " . $conditioning[2][$i] . "<br></span><br>";
}

echo "</div><p><br><div style=\"clear:both;\">";
//*******************************************************************************
//*******************************************************************************
//match starts, some more basic variables


echo "<hr />";

function show_time() {
global $minutes;

echo gmdate("i : s", $minutes) . "<br>";
}
$ground = 50;
show_time();
//*******************************************************************************


/* the fourth player is usually the scrum half hence takes the kick at the start
  arrays begin with index 0 so player 1 is index 0, player 4 will be index 3 */

$starting_team = mt_rand(1, 2); //decides who starts the game by toss of a coin

if ($starting_team == 1) {
    /* index 0 refers to the players name. Variable ball will hold the name of who has the ball,
      Variable current will hold whoever starts the match
      ( often the team which has the ball, either one or two ) */

    $current = 1;
    $opponent = 2;
    $ball = $player[$current][3][0];
    $number = 3;
} else {

    $opponent = 1;
    $current = 2;
    $number = 3;
    $ball = $player[$current][3][0];
}
echo "<b>" . $ball . "</b> gets to start the match! ";

list($result, $gain, $lineout) = kickoff(); // the ball is kicked
//lineout variable is to be used in later versions

after_kick(); //proper adjustment after kick e.g. possession,global variables are also updated. Determines what happens next

function stimulate_attack() {

    global $player, $bar1;
    global $current, $opponent, $number;
    global $gain, $ground;

    if (check_handling()) {

        //the player didn't knock
        check_roles();
    } else {

        echo " oops! Knock on! ";
    }
}
 
stimulate_attack();

?>

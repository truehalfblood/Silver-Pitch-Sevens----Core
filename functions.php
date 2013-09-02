<?php

include('config.php');


function connect() {
    $connect = mysql_connect("127.0.0.1", "root", "");
    if (!$connect) {
        die("MySQL could not connect!");
    }
    $dbconnection = mysql_select_db('testing');
    if (!$dbconnection) {
        die("My SQL could not select
						Database!");
    }
}

function get_player($tim, $pos) {


    $query = mysql_query("SELECT * FROM players WHERE team_name='$tim' AND position='$pos'");

    if (!$query) {
        die("Could not select player!");
    }
    $row = mysql_fetch_assoc($query);

    if (!$row) {
        die("My Sql did not fetch the row!!!!");
    }


    $name = $row['player_name'];
    $fitness = $row['fitness'];
    $handling = $row['handling'];
    $attack = $row['attack'];
    $tackling = $row['tackling'];
    $speed = $row['speed'];
    $enduarance = $row['enduarance'];
    $strength = $row['strength'];
    $fatigue = $row['fatigue'];
    $kicking = $row['kicking'];
    $conditioning = $row['conditioning'];

    return array($name, $fitness, $handling, $attack, $tackling, $speed, $enduarance, $strength, $kicking, $fatigue, $conditioning);
}

?>
<?php


function field_position() {
//function used to determine where the ball is for commentary purposes.


	global $ground;
	
	global $team1, $team2;

		if ($ground<22) {

			$message=" at the $team1 22 metre line. ";

		}
		elseif ($ground<5) {


			$message=" at the $team1 5 metre line. ";

		} 
		elseif ($ground>78) {


			$message=" at the $team2 22 metre line. ";

		}
		 elseif ($ground>95) {


			$message=" at the $team2 5 metre line. ";

		}
		else {

			$message=" Just beyond the half metre line.";

		}

	return $message;

}



?>
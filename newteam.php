<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Silver Pitch Sevens 2 Reloaded</title>   

</head>


<body>

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
	<div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->

<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
      
        <nav id="menu">
        	<ul id="menu-nav">
            	<li class="current"><a href="index.php" class="external">Home</a></li>
                <li><a href="newteam.php" class="external">Start a New Team</a></li>
           
                <li><a href="original_game.php" class="external">Original Page</a></li>
            </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page">
	<div class="container">
    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                
					
					<title>Silver Pitch Sevens 2</title>

</style>

There exists three divisions, namely;
division one(1),
division two(2) and three().


        <form action="newteam.php" method="post" >
            Name Of Team:<input name="teamname"  type="text" value""/ > <br>  <br> Team Division:
            <input name="division"  type="text" value""/ ><br>
            <input type="submit" name="submit"  class="button" value="GO">
            <hr />
        </form>


<?php
include('functions.php');
if (isset($_POST['submit'])) {
    $teamname = $_POST['teamname'];
    $division = $_POST['division'];
	
	
	
	if (!($division ==1 || $division == 2 || $division == 3 || $division ==4 )) {
	
	echo "<h2>Error: Incorrect Division Stated. Division: $division does not exist </h2>";
	
	} else {

    if ($division == 1) {
        $h = 14;
        $l = 11;
        $experience = mt_rand(100000, 119000);
    } elseif ($division == 2) {
        $h = 11;
        $l = 9;
        $experience = mt_rand(80000, 109000);
    } elseif ($division == 3) {
        $h = 9;
        $l = 7;
		$experience = mt_rand(50000, 79000);
    } 
    $vowels = array("Peter", "John", "Mathew", "Mark", "Anthony", "Andrew", "Edward", "Wilson"
        , "Levy", "Letser", "George", "Simon", "Brian", "Kevin", "Steve", "Kenedy", "Harry", "Japeth"
        , "Jack", "Anthony", "Bailey", "Billy", "Archie", "Alexander", "Adam", "Benjamin
		", "Charles", "Daniel", "David", "Edward", "Dominic", "George", "Harvey", "Harrison",
        "Jonathan", "John", "Joseph", "Jacob", "Isaac", "Henry", "Harry", "James", "Joshua", "Matthew", "Michael
		", "Lucas");
		
	$consonants = array("Njonjo", "Nganga", "Omollo", "Kamau", "Muema", "Mwangi", "Maina", "Omundu"
        , "Njoroge", "Wandoto", "Kibe", "Wachioi", "Nyagah", "Mwaura", "Kamau", "Mutiso", "Ngungu",
        "Mutali", "Maina", "Nganga", "Mulinge", "Thuku", "Muhia", "Mulinge", "Gachanga", "Chege",
        "Chilemba", "Chitundu", "Chiumbo", "Gachora", "Gacoki", "Gakere", "Gakuru", "Macaria ",
        "Gatete", "Gathee", "Maina", "Maitho", "Makalani", "Matunde", "Mbogo", "Maundu",
        "Miano", "Mathaathi", "Matu", "Migwi", "Mpenda", "Morani", "Mugi", "Muga",
        "Mukiri", "Muiru", "Mukanda", "Mugo", "Muiruri", "Mbui", "Makori", "Muenda", "Mugendi");

    function randvowel() {
        global $vowels;
        return $vowels[array_rand($vowels, 1)];
    }

    function randconsonants() {
        global $consonants;
        return $consonants[array_rand($consonants, 1)];
    }

    $player = array();
	
	connect();

    for ($i = 0; $i <= 6; $i++) {
        /* $firstname=ucfirst(randconsonants().randconsonants().randvowel().randvowel().randconsonants().randvowel());

          $secondname=ucfirst(randvowel().randconsonants().randvowel().randconsonants().randvowel().randvowel());
         */ $firstname = randvowel();
        $secondname = randconsonants();
        $player[] = "$firstname $secondname";
        echo " $player[$i] <br> ";
        $age = mt_rand(17, 19);
        $fitness = mt_rand($l, $h);
        $handling = mt_rand($l, $h);
        $attack = mt_rand($l, $h);
        $tackling = mt_rand($l, $h);
        $speed = mt_rand($l, $h);
        $enduarance = mt_rand($l, $h);
        $strength = mt_rand($l, $h);
        $fatigue = 0;
        $kicking = mt_rand($l, $h);
		$discipline = mt_rand(1,10);
        $conditioning = mt_rand(1, 100);
        $energy = 100;
        $posi = $i + 1;




        $sql = "INSERT INTO `players`(`player_name`, `team_name`,`position` ,`fitness`, `handling`, `enduarance`,
					`attack`, `tackling`, `speed`, `strength`, `kicking`, `discipline`, `conditioning`, `fatigue`, `experience`) 
					VALUES ('$player[$i]','$teamname','$posi','$fitness','$handling','$enduarance','$attack',
					'$tackling','$speed','$strength','$kicking','$discipline','$conditioning','$fatigue','$experience')";
				

        if (!mysql_query($sql)) {
            die("An Error Occured: $sql");
        }
    }
}
}
?>
					
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
      
        <!-- End Portfolio Projects -->
    </div>
</div>

<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->


<!-- Js -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/waypoints.js"></script> <!-- WayPoints -->
<script src="_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="_include/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="_include/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->

</body>
</html>
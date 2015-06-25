<?php
// Hij maakt een prachtige functie om de database te melken
	function GetVerhaaltje($con, $curpage = null)
	{
		$query = 'SELECT * FROM `location` WHERE `page` = '.$curpage;
		$result = $con->query($query);

		$row = mysqli_fetch_object($result);

// Haal alle gekke opties uit de database
		$options = [
			$row->option1,
			
			$row->option2,
		
			$row->option3,
			
			$row->option4,
			
			$row->option5,

			$row->option6,	
		];

// Zet het mooie verhaaltje neer
		$verhaaltje['text'] = $row->text;
		$verhaaltje['id'] = $curpage;
		$verhaaltje['options'] = $options;

		return $verhaaltje;
	}

// Maak het een bruikbaar spelletje
	function SpalotjeMaken($verhaaltje)
	{

		$result = "<h1>Page " . $verhaaltje['id'] . "</h1>";
		$result .= "<p>" . $verhaaltje['text'] . "</p>";
		return $result;
	}
	
//Start Pagina
	function LekkorSpalen(){return '<h3>Speel het spelletje</h3>';}
	?>

<!DOCTYPE html>
<html>
	<head>
		<title>Array's</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h3>Werken met Array's</h3>
		
		<?php
			// Indexed Array
			
			$landen = array();
			$landen[0] = "Nederland";
			$landen[1] = "Frankrijk";
			$landen[2] = "Belgie";
			$landen[3] = "Spanje";
			$landen[4] = "Mauretanie";
			
			for ($i=0; $i<sizeof($landen); $i++)
			{
				echo $landen[$i]."<br>";
			}
			
			//$landen = array("Noorwegen");
			var_dump($landen);
			
			//echo $landen[4];
			
			$landenAsso = array("koud" => "Nederland", "Zonnig" => "Frankrijk");
			$landenAsso["koud"] = "Nederland";
			$landenAsso["Zonnig"] = "Frankrijk";
			$landenAsso[2] = "Belgie";
			$landenAsso["stierengevecht"] = "Spanje";
			$landenAsso["Afrika"] = "Mauretanie";
			
			/*
			for ($i=0; $i<sizeOf($landenAsso; $i++)
			{
				echo $landenAsso[$i]."<br>";
			}
			*/
			
			foreach ($landenAsso as $key => $value)
			{
				echo $key." => ".$value."<br>";
			}
			
			// Maak een associatieve array met hoofdstad - landparen. Vul deze met
			// minimaal 6 paren.
			
			
			$landenHoofdsteden = array("Angola" => "Luanda",
									   "Democratische Republiek Congo" => "Kinshash",
									   "Belgie" => "Brussel",
									   "Mauretanie" => "Nouakchott",
									   "Kenia" => "Nairobi");
									   
			
			// Maak een associatieve array met product - prijsparen. Vul deze met
			// minimaal 15 paren.
									  
			$prijsProduct = array("1.39" => "Biscuit",
								  "2.49" => "Tahoe",
								  "3.29" => "Haring",
								  "1.89" => "Suiker",
								  "0.89" => "Melk",
								  "2.34" => "Pindakaas",
								  "4.23" => "Appels",
								  "3.23" => "Chocoladepasta",
								  "1.45" => "Leverworst",
								  "8.34" => "Lendebiefstuk",
								  "6.00" => "Koffie",
								  "2.12" => "Crackers",
								  "0.89" => "Cola",
								  "2.45" => "Thee",
								  "2.99" => "Drop");
			ksort($prijsProduct);
			foreach ($prijsProduct as $key => $value)
			{
				echo "De ".$value." kost ".$key."<br>";
			
			}
			
			echo "De ingebouwde PHP functie count() geeft deze waarde: ".count($prijsProduct)."<br>";
			echo "De ingebouwde PHP functie sizeof() geeft deze waarde: ".sizeof($prijsProduct)."<br>";
			
			echo count($prijsProduct)."<br>";
			$eersteElement = array_shift($prijsProduct);
			echo "Het eerste element van array prijsProduct is: ".$eersteElement."<br>";
			$eersteElement = array_shift($prijsProduct);
			echo "Het eerste element van array prijsProduct is: ".$eersteElement."<br>";
			$eersteElement = array_shift($prijsProduct);
			echo "Het eerste element van array prijsProduct is: ".$eersteElement."<br>";
			echo count($prijsProduct)."<br>";
		?>
		<hr>
		<?php
			array_push($prijsProduct,  "Fruitella", "drop");
			foreach ($prijsProduct as $key => $value)
			{
				echo $value." kost ".$key."<br>";
			}
			
		?>
		
		<hr>
		
		<?php
			// Echo op het scherm dat pindakaas in het array zit, anders dat het er niet in zit.
			
			
		?>
		<!--
		Maak nu van bovenstaand voorbeeld een functie. De functie krijgt als argumenten mee: Het te zoeken product( pindakaas ) en de naam van het array.
		De functie heeft als output de bovenstaande echo regels. Als het het product gevonden is wordt dus ook de prijs genoemd.
		
		vindMijnProduct("Jam", $prijsProduct);
		
		
		Maak een mini-array van drie elementen en gebruik dezelfde onaangepaste functie vindMijnProduct om te zien of het product in het array zit
		-->
		
		
		
		<?php
			function vindMijnProduct($product, $array)
			{
				if ( in_array($product, $array))
				{
					echo $product." staat in mijn boodschappenlijstje<br>";
					//Op deze plek wil ik de prijs van het product naar het scherm echo-en
					echo "De prijs is: ".array_search($product, $array)."<br>";
				}
				else
				{
					echo $product." staat niet in mijn boodschappenlijstje<br>";
				}			
			}

			vindMijnProduct("Drop", $prijsProduct);
			vindMijnProduct("Lendebiefstuk", $prijsProduct);
			
		?>
		
		<hr>
		
		<?php
		$bakker = array("1.23" => "stokbrood",
						"2.67" => "Volkoren Vloer",
						"4.23" => "Casino");
		var_dump($bakker);
		
		vindMijnProduct("Volkoren Vloer", $bakker);
		
		?>
		
		<!-- Maak een functie die de waarde van het eerste element van een array
		teruggeeft. Gebruik in je functie return. (maak gebruikt van array_shift)
		De output wordt. Het eerste element van het array heeft de waarde: stokbrood-->
		<hr>
		
		
		<?php
		function eersteElementArray($array)
		{
			$eersteElement = array_shift($array);
			echo "Het eerste element uit het array is: ".$eersteElement."<br>";
		}
		
		eersteElementArray($bakker);
		eersteElementArray($prijsProduct);
		?>
		
		
		
	</body>
</html>
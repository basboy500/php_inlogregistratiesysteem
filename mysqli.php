<?php
	// Definieer severname, usernaam, wachtwoord en databasenaam
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$databasename = 'blok1-am1a';
	
	// Maak contact met de server waarop de database draait.
	$connection = mysqli_connect($servername, $username, $password, $databasename);
	
	if (!$connection)
	{
		echo "Er is een fout opgetreden bij het contact maken met de database-server<br>";
		header("refresh:5; url=mysqli.php");
	}
	else
	{	
		if (isset($_POST['submit']))
		{			
			$sql = "INSERT INTO `user` (`id`,
										`voornaam`,
										`tussenvoegsel`,
										`achternaam`)
							VALUES	   (NULL,
										'".$_POST['voornaam']."',
										'".$_POST['tussenvoegsel']."',
										'".$_POST['achternaam']."');";
			//echo $sql."<br>";
			
			$send = mysqli_query($connection, $sql);
			
			//var_dump($send);
			
			if (!$send)
			{
				echo "Uw ingevulde gegevens hebben ons niet bereikt. Probeer het<br>
					  later nog eens. Of mail naar info@test.com";
				header("refresh:5;url=mysqli.php");
			}
			else
			{
				echo "Uw ingevulde gegevens hebben ons bereikt. Dank voor het registreren";
				header("refresh:5;url=mysqli.php");
			}			
		}
		else
		{
			// Maak een query die alle velden uit de tabel user selecteert.
			$sql = "SELECT `id`,
						   `voornaam`,
						   `tussenvoegsel`,
						   `achternaam`
					FROM `user`";
					
			//echo $sql."<br>";
			
			// Vuur de query af op de database
			$result = mysqli_query($connection,$sql);
			
			
?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>MySqli</title>
					<style>
						table, th, td
						{
							border:2px solid blue;
							border-collapse:collapse;
							padding:0.5em 1em;
						}			
					</style>
				</head>
				<body>
					<h3>Opslaan van gegevens in een database met mysqli</h3>
						<form action='mysqli.php' method='post' >
							voornaam:<input type='text' name='voornaam' /><br>			
							tussenvoegsel:	<input type='text' name='tussenvoegsel' /><br>		
							achternaam:	<input type='text' name='achternaam' /><br>		
							<input type='submit' name='submit' value='sla op in database' />
						</form>

						<hr>				
						
						<!-- Opdracht: Maak een tabel voor het weergeven van de velden
							 id, voornaam, tussenvoegsel, achternaam en zet er handmatig
							 drie namen in -->	
						<?php
						// We lezen het result uit en stoppen het in een array
							while ($record = mysqli_fetch_array($result))
							{
								echo $record["id"]." ".			 
									 $record["voornaam"]." ".
									 $record["tussenvoegsel"]." ".
									 $record["achternaam"]."<br>";
							}
						?>
						<table>
							<caption>Gebruikers</caption>
							<tr>
								<th>id</th>
								<th>voornaam</th>
								<th>tussenvoegsel</th>
								<th>achternaam</th>
							</tr>
							<tr>
								<td>1</td>
								<td>Frans</td>
								<td>van</td>
								<td>Tielens</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Bert</td>
								<td></td>
								<td>Wagendorp</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Hans</td>
								<td>van</td>
								<td>Tichelen</td>
							</tr>				
						</table>
				</body>
			</html>
<?php
		}
	}
?>
<?php

	/*
		OBS!
		Om ni undrar vad någon av funktionerna nedanför gör, eller
		vad t.ex. $_POST är förnågot så skulle jag rekommendera att
		googla på funktionen och antingen kolla på W3Schools eller
		PHP's officiella dokumentation. (W3Schools är mer nybörjarvänligt)

		
		(Sammanfattning för vad PHP-koden nedan gör)
		
		* Kollar ifall formuläret skickats, i så fall gör följande:
			* Kolla om användaren ville registrera eller logga in
				* Ifall användaren ville registrera så hantera
				  informationen från formuläret och skriv den till
				  filen och meddela användaren att han/hon är registrerad

				* Ifall användaren inte ville registrera så antar vi
				  att användaren ville logga in.
				  Hämta all information från filen och jämför användarnamnen
				  med det som skickades med formuläret.

	*/

	if(isset($_POST['type'])){  // Kollar ifall formuläret skickats

		if($_POST['type'] == "register"){   // Kollar ifall användaren klickade "register"
			
			$handle = fopen('users.txt', 'a');  // Öppna filen för skrivning och ange $handle som referens till filen
		
			$string = $_POST['username'] . ',' . $_POST['password'] . PHP_EOL;

			fwrite($handle, $string);   // Skriv $string till filen

			fclose($handle);    // Stäng filen (så att den kan öppnas senare)

			echo "Du har registrerats!";    // Meddela användaren om att registreringen gick igenom

		}else{  // Ifall användaren inte ville registrera antar vi att han/hon ville logga in

			$handle = fopen('users.txt', 'r');  // Öppna filen för att läsas och ange $handle som referens till filen

			// OBS! Detta är en while-loop, se följande: https://www.w3schools.com/php/php_looping.asp
			while (!feof($handle)) {	

				$row = fgets($handle);
				
				echo $row.'<br>';

			}

			fclose($handle);

			

		}

	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Simple PHP login app</title>
</head>
<body>
	<!-- Register -->
	<h2>Register</h2>
	<form action="?" method="post">
		<p>Username</p>
		<input type="text" name="username" require>
		<p>Password</p>
		<input type="password" name="password" require>
		<input name="type" type="submit" value="register">
	</form>
	
	
	<br><br><br><br>


	<!-- Login -->
	<h2>Login</h2>
	<form action="?" method="post">
		<p>Username</p>
		<input type="text" name="username" require>
		<p>Password</p>
		<input type="password" name="password" require>
		<input name="type" type="submit" value="login">
	</form>
</body>
</html>
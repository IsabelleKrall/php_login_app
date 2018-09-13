<?php

/*
	OBS!
	If you're wondering about any of the functions below, or what
	$_POST is, I'd like to recommend googling it and either check
	it out at W3Schools or at PHP's official documentation
	(W3Schools is more beginner friendly)

	
	(Summary of what the PHP-code below does)
	
	* Check if the form has been sent, in that case do the following:
		* Check if the user wanted to register or log in
			* If the user want to register then format the
				data from the form and write it to the file
				and tell the user that they've been registered

			* If the user don't want to register, we'll assume that
				they want to log in.
				Get all the user information from the file and compare
				the usernames with the one sent in the form.

				* If the username matched with one of the
					registered ones, compare the passwords

					* If the passwords match, tell the user
						that they're logged in

					* If the password didn't match, tell the user
						that either the username or password was wrong
				
				* If none of the usernames match, tell the user
					that either the username or password was wrong
*/

	if(isset($_POST['type'])){  // Checks if the form has been sent

		if($_POST['type'] == "register"){   // Check if the user clicked "register"
			
			$handle = fopen('users.txt', 'a');  // Open the file for writing and assign $handle as reference
		
			$string = $_POST['username'] . ',' . $_POST['password'] . PHP_EOL; // Format the data and put it in $string

			fwrite($handle, $string);   // Write $string to the file

			fclose($handle);    // Close the file (so that it may be opened later)

			echo "Du har registrerats!";    // Tell the user that the registration went through

		}else{  // If the user don't want to register we'll assume that they want to log in

			$handle = fopen('users.txt', 'r');	// Open the file for reading and assign $handle as reference
			
			$users = array();	// Create array for storing the user-data from the file temporarily

			// OBS! This is a while-loop, see the following: https://www.w3schools.com/php/php_looping.asp
			while (!feof($handle)) {	// If the current row isn't the last

				$row = fgets($handle);	// Get the current row and put it in $row
				
				$users[] = $row;	// Put the users information in a pocket of the array

			}

			fclose($handle);	// Close the file (so that it may be opened later)

			// OBS! This is the part where we compare the form-data with the data from the file

			$array_lenght = count($users); // Count how many pockets the array has (how many users there are in the array)

			// OBS! This is a for-loop, see the following: https://www.w3schools.com/php/php_looping.asp
			for($i = 0; $i < $array_lenght; $i++){ // Run the loop as many times as there are users, add +1 to the $i counter after each loop

				

			}

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
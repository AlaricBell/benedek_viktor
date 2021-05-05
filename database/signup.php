<?php 
	// Checks if the user had access to this file through form input.
	if (isset($_POST['signup-submit'])) {
		require_once 'functions.php';

		// Gets the data from the POST request and avoids harmful data in input fields.
		$username = trim(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING));
		$pwd = trim(filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING));

		// Validating input fields and sending the user back with error data if something is not correct.
		if (empty($username) || empty($pwd)) {
			header('Location: ../index.php?error=emptyfields&uname='.$username);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header('Location: ../index.php?error=invalidfield');
			exit();
		}
		else {
			try {
				// Checks if the user already exists.
				if (get_user_by_username($username)) {
					header('Location: ../index.php?error=usernametaken&email='.$email);
					exit();
				}
				// Adds user to the database
				else {
					if (add_user($username, $pwd)) {
						header('Location: ../index.php?success=signup');
						exit();
					}
					else {
						header('Location: ../index.php?error=badquery');
						exit();
					}
				}
			} catch (Exception $e) {
				header('Location: ../index.php?error=badquery');
				exit();
			}
		}
	}
	else {
		header('Location: ../index.php');
	}
?>
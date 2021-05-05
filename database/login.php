<?php 
	if (isset($_POST['login-submit'])) {
		require 'functions.php';

		 $username = trim(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING));
		 $pwd = trim(filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING));

		 if (empty($username || empty($pwd))) {
		 	header('Location: ../index.php?error=emptyfields');
		 	exit();
		 }
		 else {
	 		if ($user = get_user_by_username($username)) {
	 			if (password_verify($pwd, $user['password'])) {
	 				session_start();
	 				$_SESSION['username'] = $user['username'];
	 				header('Location: ../index.php?success=login');
		 			exit();
	 			}
	 			else {
	 				header('Location: ../index.php?error=wrongpassword');
		 			exit();
	 			}
	 		}
	 		else {
 				header('Location: ../index.php?error=wrongusername');
		 		exit();
	 		}
		 }
	}
	else {
		header('Location: ../index.php');
	}
?>
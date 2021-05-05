<?php 
function get_user_by_username($username) {
		require 'connect.php';
		$stmt = $conn->prepare("SELECT * FROM User WHERE username = ?");
		$stmt->bindParam(1, $username, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function get_list_content() {
		require 'connect.php';
		$stmt = $conn->prepare("SELECT * FROM List ORDER BY position");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function add_user($username, $pwd) {
		require 'connect.php';
		try {
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO User (username, password) VALUE (?, ?);";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $username, PDO::PARAM_STR);
			$stmt->bindParam(2, $hashedPwd, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
?>
<?php
  foreach($_POST['value'] as $key => $value) {
    updatePosition($value, $key + 1);
  }
  
  function updatePosition($id, $position) {
    require "connect.php";
    try {
			$stmt = $conn->prepare("UPDATE List SET position = ? WHERE content = ?");
			$stmt->bindParam(1, $position, PDO::PARAM_INT);
			$stmt->bindParam(2, $id, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			return false;
		}
		return true;
  }
?>
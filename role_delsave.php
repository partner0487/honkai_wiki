<?php
include("db_conn.php");

if (isset($_POST["ID"]) && !empty($_POST["ID"])) {
	$ID = $_POST["ID"];

	$sql = "DELETE FROM role WHERE ID = ?";
	if ($stmt = $db->prepare($sql)) {
		$success = $stmt->execute(array($ID));

		if (!$success) {
			echo "刪除失敗!" . $stmt->errorInfo();
		} else {
			header('Location: role.php');
		}
	}
} else {
	$ID = NULL;
	echo "no supplied", $_POST["ID"];
}


?>
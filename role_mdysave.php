<?php
include("db_conn.php");

if (isset($_POST["ID"])) {
	$ID = $_POST["ID"];
	$name = $_POST["name"];
	$path = $_POST["path"];
	$type = $_POST["type"];
	$relics_name = $_POST["relics_name"];

	if ($name == '') {
		$name = '更換角色名稱';
	}

	$sql = "UPDATE role r 
	  			SET r.name = ?,r.path = ?,r.type = ?,r.relics_id = ?
				WHERE r.ID = ?";
	if ($stmt = $db->prepare($sql)) {
		$success = $stmt->execute(array($name, $path, $type, $relics_name, $ID));

		if (!$success) {
			echo "儲存失敗!" . $stmt->errorInfo();
			header('Location: role.php');
		} else {
			header('Location: role.php');
		}
	}
} else {
	$ToyID = NULL;
	echo "no supplied";
}


?>
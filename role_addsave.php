<?php
include("db_conn.php");

$ID = $_POST["ID"];
$name = $_POST["name"];
$path = $_POST["path"];
$type = $_POST["type"];
$relics_id = $_POST["relics_name"];

$sql = "INSERT INTO role (ID , name, path, type, relics_id) 
          values (?, ?, ?, ?, ? )";

if ($stmt = $db->prepare($sql)) {
  $success = $stmt->execute(array($ID, $name, $path, $type, $relics_id));
  if($success){
    header("Location: role.php");
  }
}

?>
<?php
session_start(); 
include_once('dbconnect.php');

$sql = "SELECT  d.id_gro, d.name_gro
        FROM     gro d";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id_gro, $name_gro);

?>
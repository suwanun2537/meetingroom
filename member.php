<?php
session_start(); 
include_once('dbconnect.php');

$sql = "SELECT  m.id_mem, m.fname_mem
        FROM     member m";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id_mem, $fname_mem);

?>
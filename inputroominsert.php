<?php  
session_start(); 
include_once('dbconnect.php');
$id_room = $_GET['id_room'];
$name_room = $_GET['name_room'];


$sql1 = "SELECT  id_room
        FROM     room
        WHERE   id_room 
        LIKE     ?";

$stmt = $conn->prepare($sql1);
$stmt->bind_param("r",$id_room);
$stmt->execute();
$stmt -> store_result();

echo "เจอ" . $stmt -> num_rows;
if(!$stmt->fetch()){

$sql = "INSERT INTO  room(id_room,name_room)
        VALUES(?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss",$id_room,$name_room);

$stmt->execute();



$stmt->close();

 header( 'Location: showroom.php' ) ;
}else {
echo "รหัสห้อง" . $id_room . "มีแล้ว";
}
?>
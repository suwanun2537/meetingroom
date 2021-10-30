<?php  
session_start(); 
include_once('dbconnect.php');
$id_gro = $_GET['id_gro'];
$name_gro = $_GET['name_gro'];


$sql1 = "SELECT  id_gro
        FROM     gro
        WHERE   id_gro 
        LIKE     ?";

$stmt = $conn->prepare($sql1);
$stmt->bind_param("r",$id_gro);
$stmt->execute();
$stmt -> store_result();

echo "เจอ" . $stmt -> num_rows;
if(!$stmt->fetch()){

$sql = "INSERT INTO  gro(id_gro,name_gro)
        VALUES(?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss",$id_gro,$name_gro);

$stmt->execute();



$stmt->close();

 header( 'Location: showgroup.php' ) ;
}else {
echo "รหัสห้อง" . $id_room . "มีแล้ว";
}
?>
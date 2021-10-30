<?php  
session_start(); 
include_once('dbconnect.php');
$id_met = $_GET['id_met'];
$name_met = $_GET['name_met'];
$date = $_GET['date'];
$time = $_GET['time'];
$details_met = $_GET['details_met'];
$num_met = $_GET['num_met'];
$id_room = $_GET['id_room'];
$status = $_GET['status'];


$sql1 = "SELECT  id_met
        FROM     meet
        WHERE   id_met 
        LIKE     ?";

$stmt = $conn->prepare($sql1);
$stmt->bind_param("m",$id_met);
$stmt->execute();
$stmt -> store_result();

echo "เจอ" . $stmt -> num_rows;
if($objResult['id_met']==0){

$sql = "INSERT INTO  meet(id_met,name_met,date,time,details_met,num_met,id_room,status)
        VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssssss",$id_met,$name_met,$date,$time,$details_met,$num_met,$id_room,$status);

$stmt->execute();

//$sql1 = "INSERT INTO account(id_stu,username,password) VAlUES(?,?,?)";
//$stmt = $conn->prepare($sql1);
//$stmt->bind_param("sss",$id_stu,$user,$pass);
//$stmt->execute();

$stmt->close();

 header( 'Location: showmeet.php' ) ;
}else {
echo "รายการจอง" . $id_met . "มีแล้ว";
}


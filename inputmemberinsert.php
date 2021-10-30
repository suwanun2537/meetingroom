<?php  
session_start(); 
include_once('dbconnect.php');
$id_mem = $_GET['id_mem'];
$pre_mem = $_GET['pre_mem'];
$fname_mem = $_GET['fname_mem'];
$lname_mem = $_GET['lname_mem'];
$tel_mem = $_GET['tel_mem'];
$email_mem = $_GET['email_mem'];
$line_mem = $_GET['line_mem'];
$id_gro = $_GET['id_gro'];
$user = $_GET['user'];
$pass = $_GET['pass'];


$sql1 = "SELECT  id_mem
        FROM     member
        WHERE   id_mem 
        LIKE     ?";

$stmt = $conn->prepare($sql1);
$stmt->bind_param("s",$id_mem);
$stmt->execute();
$stmt -> store_result();

echo "เจอ" . $stmt -> num_rows;
if(!$stmt->fetch()){

$sql = "INSERT INTO  member(id_mem,pre_mem,fname_mem,lname_mem,tel_mem,email_mem,line_mem,id_gro)
        VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssssss",$id_mem,$pre_mem,$fname_mem,$lname_mem,$tel_mem,$email_mem,$line_mem,$id_gro);

$stmt->execute();

$sql1 = "INSERT INTO account(id_mem,username,password) VAlUES(?,?,?)";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("sss",$id_mem,$user,$pass);
$stmt->execute();

$stmt->close();

 header( 'Location: showmember.php' ) ;
}else {
echo "รหัสผู้ใช้งาน" . $id_mem . "มีแล้ว";
}
?>
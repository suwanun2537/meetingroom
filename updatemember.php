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

    $sql = "SELECT id_mem FROM  member WHERE id_mem like ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id_mem);

    $stmt->execute();
    $stmt -> store_result(); 
    $stmt -> bind_result($id_mem); 

    if($stmt->fetch()){
            $sql1 = "UPDATE  member SET pre_mem = ?,
                     fname_mem = ?,
                     lname_mem = ?,
                     tel_mem = ?,
                     email_mem = ?,
                     line_mem = ?,
                     id_gro = ?
                     WHERE id_mem like ?";
            $stmt = $conn->prepare($sql1);
            $stmt->bind_param("ssssssss",$pre_mem,$fname_mem,$lname_mem,$tel_mem,$email_mem,$line_mem,$id_gro,$id_mem);
            $stmt->execute();
            $stmt->close();
            header( 'Location: showmember.php');
    }else {
            echo "ไม่พบข้อมูลรหัสนักศึกษา" . $id_mem;
    }
?>


<?php 
    session_start();
    $u = $_GET['username'];
    $p = $_GET['password'];

    include_once('dbconnect.php');

    $sql = "SELECT a.id_mem, a.username, a.password, s.pre_mem, s.fname_mem, s.lname_mem,
            s.tel_mem, s.email_mem, s.line_mem, d.name_gro
            FROM account  a, member s, gro d
            WHERE a.id_mem = s.id_mem
            AND   s.id_gro = d.id_gro
            AND   username like ? AND password like ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$u, $p);
    $stmt->execute();
    // $stmt -> store_result();
    // $stmt->bind_result($user,$pass);
    

    if($stmt->fetch()){
        $_SESSION['u'] = $u;
        $_SESSION['p'] = $p;
        require('sessionexp.php');
        header( 'Location: showmember.php');

    }else { header( 'Location: showmember.php');
    }
    ?>






?>
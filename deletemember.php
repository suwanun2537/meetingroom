<?php
        session_start();
        if($_SESSION['u'] != null){
        include_once('dbconnect.php');
        $id_mem = $_GET['id_mem'];
       

        $sql = "SELECT id_mem FROM    member   WHERE   id_mem like ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$id_mem);

        $stmt->execute();
        $stmt -> store_result(); 
        $stmt -> bind_result($id_mem); 

        if($stmt->fetch()){
                $sql1 = "DELETE FROM member WHERE id_mem like ?";
                $stmt = $conn->prepare($sql1);
                $stmt->bind_param("s",$id_mem);
                $stmt->execute();

                $sql2 = "DELETE FROM account WHERE id_mem like ?";
                $stmt = $conn->prepare($sql2);
                $stmt->bind_param("s",$id_mem);
                $stmt->execute();

                $stmt->close();
                header( 'Location: showmember.php');
        }else { ?>
                <div class="alert alert-warning mt-5 pt-3" role="alert">
                ไม่พบข้อมูลนักศึกษาที่ต้องการลบ <?php echo $id_mem;  ?>
            </div>
      <?php  } }else { header( 'Location: showmember.php'); }?>
?>

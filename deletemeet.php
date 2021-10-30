<?php
        session_start();
        if($_SESSION['u'] != null){
        include_once('dbconnect.php');
        $id_stu = $_GET['id_stu'];
       

        $sql = "SELECT id_stu FROM    meet   WHERE   id_stu like ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$id_stu);

        $stmt->execute();
        $stmt -> store_result(); 
        $stmt -> bind_result($id_stu); 

        if($stmt->fetch()){
                $sql1 = "DELETE FROM meet WHERE id_stu like ?";
                $stmt = $conn->prepare($sql1);
                $stmt->bind_param("s",$id_stu);
                $stmt->execute();

                $sql2 = "DELETE FROM account WHERE id_stu like ?";
                $stmt = $conn->prepare($sql2);
                $stmt->bind_param("s",$id_stu);
                $stmt->execute();

                $stmt->close();
                header( 'Location: showmeet.php');
        }else { ?>
                <div class="alert alert-warning mt-5 pt-3" role="alert">
                ไม่พบข้อมูลนักศึกษาที่ต้องการลบ <?php echo $id_stu;  ?>
            </div>
      <?php  } }else { header( 'Location: showmeet.php'); }?>
?>

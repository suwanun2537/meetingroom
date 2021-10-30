<?php   session_start();
        if($_SESSION['u'] != null){
        require('sessionexp.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">

        <title>เพิ่มข้อมูลนักศึกษา</title>
    </head>
    <body>
        <div class="container ">
            <?php include_once('header.html'); 
                include_once('dbconnect.php');

                $id_stu = $_GET['id_stu'];
                $sql = "SELECT  s.id_stu, s.pre_stu, s.fname_stu, s.lname_stu, s.tel_stu, s.email_stu, s.gpa_stu, d.id_dep, d.name_dep
                FROM    student s, dep d
                WHERE   s.id_dep = d.id_dep
                AND     id_stu like ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$id_stu);

            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $pre, $fname, $lname,  $tel, $email, $gpa, $id_dep_old, $name_dep);
            if($stmt->fetch()){
            ?>
            <form action="updatestudent.php" method="GET">
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_stu" class="col-sm-2 col-form-label">รหัสนักศึกษา</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="id_stu"
                            name="id_stu" readonly placeholder="รหัสนักศึกษา" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="pre_stu" class="col-sm-2 col-form-label">คำนำหน้า</label>
                   
                    <div class="col-sm-6">
                        <select name="pre_stu" class="form-select" aria-label="Default select example">   
                            <?php if($pre == "นาย") { ?>
                            <option value="นาย" selected>นาย</option> 
                            <option value="นาง">นาง</option>  
                            <option value="นางสาว">นางสาว</option>       
                          
                          <?php  }else if($pre == "นาง") { ?>
                            <option value="นาย" >นาย</option> 
                            <option value="นาง" selected>นาง</option>  
                            <option value="นางสาว">นางสาว</option>       
                         
                          <?php } else { ?>
                            <option value="นาย" >นาย</option> 
                            <option value="นาง" >นาง</option>  
                            <option value="นางสาว" selected>นางสาว</option>       
                           
                          <?php } ?>
                          </select>
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="fname_stu" class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fname_stu"
                            name="fname_stu" placeholder="ชื่อ" value="<?php echo $fname; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="lname_stu" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="lname_stu"
                            name="lname_stu" placeholder="นามสกุล" value="<?php echo $lname; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="tel_stu" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="tel_stu"
                            name="tel_stu" placeholder="เบอร์โทร" value="<?php echo $tel; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="email_stu" class="col-sm-2 col-form-label">อีเมล์</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email_stu"
                            name="email_stu" placeholder="อีเมล์" value="<?php echo $email; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="gpa_stu" class="col-sm-2 col-form-label">เกรดเฉลี่ย</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="gpa_stu"
                            name="gpa_stu" placeholder="เกรดเฉลี่ย" value="<?php echo $gpa; ?>">
                    </div>
                </div>
                <div class="row mb-3 fs-4">
                    <label for="id_dep" class="col-sm-2 col-form-label">แผนก</label>
                   
                    <!-- //ทำการเรียกข้อมูลมาแสดงข้อมูลแผนก -->
                    <?php
                        include_once('dep.php');               
                    ?>
                    <div class="col-sm-6">
                        <select class="form-select" name="id_dep" aria-label="Default select example">
                         
                        
                        <option selected>เลือกแผนก</option>
                        <!-- // ทำการวนรอบ รหัสแผนก ชื่อแผนก มาแสดงผล -->
                        <?php  while ($stmt->fetch()) { 
                            if($id_dep_old == $id_dep){ ?>
                                <option value="<?php echo $id_dep; ?>" selected> <?php echo $name_dep; ?></option>      
                           
                           <?php } else {
                            ?>
                            
                            <option value="<?php echo $id_dep; ?>"> <?php echo $name_dep; ?></option>      
                            
                        <?php } }
                        // ปิดการเชื่อมต่อฐานข้อมูล
                          $stmt->close();
                        }
                        ?>
                          </select>
                    </div>
                </div>
                <div class="row mb-3 fs-4">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                    </div>
                    
                </div>

                
            </form>
            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
        </div>
    </body>
</html>
<?php } else { header( 'Location: showstudent.php');}?>
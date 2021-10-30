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

                $id_mem = $_GET['id_mem'];
                $sql = "SELECT  s.id_mem, s.pre_mem, s.fname_mem, s.lname_mem, s.tel_mem, s.email_mem, s.line_mem, d.id_gro, d.name_gro
                FROM    member s, gro d
                WHERE   s.id_gro = d.id_gro
                AND     id_mem like ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$id_mem);

            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $pre, $fname, $lname,  $tel, $email, $line, $id_gro_old, $name_gro);
            if($stmt->fetch()){
            ?>
            <form action="updatemember.php" method="GET">
                <div class="row mb-3 mt-3 fs-4">
                    <label for="id_mem" class="col-sm-2 col-form-label">รหัสนักศึกษา</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="id_mem"
                            name="id_mem" readonly placeholder="รหัสนักศึกษา" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="row mb-3 mt-3 fs-4">
                    <label for="pre_mem" class="col-sm-2 col-form-label">คำนำหน้า</label>
                   
                    <div class="col-sm-6">
                        <select name="pre_mem" class="form-select" aria-label="Default select example">   
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
                    <label for="fname_mem" class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fname_mem"
                            name="fname_mem" placeholder="ชื่อ" value="<?php echo $fname; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="lname_mem" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="lname_mem"
                            name="lname_mem" placeholder="นามสกุล" value="<?php echo $lname; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="tel_mem" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tel_mem"
                            name="tel_mem" placeholder="เบอร์โทร" value="<?php echo $tel; ?>">
                    </div>
                </div>

                <div class="row mb-3 fs-4">
                    <label for="email_mem" class="col-sm-2 col-form-label">อีเมล์</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email_mem"
                            name="email_mem" placeholder="อีเมล์" value="<?php echo $email; ?>">
                    </div>
                </div>

               <!-- <div class="row mb-3 fs-4">
                    <label for="line_mem" class="col-sm-2 col-form-label">ID line</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="line_mem"
                            name="line_mem" placeholder="ID line" value="<?php echo $line; ?>">
                    </div>
                </div>-->
                
                  <div class="row mb-3 fs-4">
                    <label for="line_mem" class="col-sm-2 col-form-label">ID line</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="line_mem"
                            name="line_mem" placeholder="ID line" value="<?php echo $line; ?>">
                    </div>
                </div>
                
                
                <div class="row mb-3 fs-4">
                    <label for="id_gro" class="col-sm-2 col-form-label">กลุ่มงาน</label>
                   
                    <!-- //ทำการเรียกข้อมูลมาแสดงข้อมูลแผนก -->
                    <?php
                        include_once('gro.php');               
                    ?>
                    <div class="col-sm-6">
                        <select class="form-select" name="id_gro" aria-label="Default select example">
                         
                        
                        <option selected>เลือกกลุ่มงาน</option>
                        <!-- // ทำการวนรอบ รหัสแผนก ชื่อแผนก มาแสดงผล -->
                        <?php  while ($stmt->fetch()) { 
                            if($id_gro_old == $id_gro){ ?>
                                <option value="<?php echo $id_gro; ?>" selected> <?php echo $name_gro; ?></option>      
                           
                           <?php } else {
                            ?>
                            
                            <option value="<?php echo $id_gro; ?>"> <?php echo $name_gro; ?></option>      
                            
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
<?php } else { header( 'Location: showmember.php');}?>
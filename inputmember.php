<?php   session_start(); 
if($_SESSION['u'] != null){
    require('sessionexp.php');

?>
<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มผู้ใช้งาน</title>
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>
   
<body background="">
	<!-- container -->
	
	<div class="container-sm">
		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<div class="card-body">
						<div class="table-responsive">
							
           <?php
        include_once('header.php');
        include_once('dbconnect.php');
        $status = "active";
        ?>
            <form action="inputmemberinsert.php" method="GET">
                <div class="row mb-3 mt-3 ">
                    <label for="id_mem" class="col-sm-2 col-form-label">เลขบัตรประชาชน</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="id_mem"
                            name="id_mem" placeholder="เลขบัตรประชาชน">
                    </div>
                </div>
                <div class="row mb-3 mt-3 ">
                    <label for="pre_mem" class="col-sm-2 col-form-label">คำนำหน้า</label>
                   
                    <div class="col-sm-6">
                        <select name="pre_mem" class="form-select" aria-label="Default select example">   
                            <option value="นาย" selected>นาย</option> 
                            <option value="นาง">นาง</option>  
                            <option value="นางสาว">นางสาว</option>       
                          </select>
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="fname_mem" class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fname_mem"
                            name="fname_mem" placeholder="ชื่อ">
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="lname_mem" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="lname_mem"
                            name="lname_mem" placeholder="นามสกุล">
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="tel_mem" class="col-sm-2 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="tel_mem"
                            name="tel_mem" placeholder="เบอร์โทร">
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="email_mem" class="col-sm-2 col-form-label">อีเมล์</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email_mem"
                            name="email_mem" placeholder="อีเมล์">
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="line_mem" class="col-sm-2 col-form-label">ID line</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="line_mem"
                            name="line_mem" placeholder="ID line">
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="id_gro" class="col-sm-2 col-form-label">กลุ่มงาน</label>
                   
                    <!-- //ทำการเรียกข้อมูลมาแสดงข้อมูลแผนก -->
                    <?php
                        include_once('gro.php');               
                    ?>
                    <div class="col-sm-6">
                        <select class="form-select" name="id_gro" aria-label="Default select example">
                         
                        
                        <option selected>เลือกกลุ่มงาน</option>
                        <!-- // ทำการวนรอบ รหัสแผนก ชื่อแผนก มาแสดงผล -->
                        <?php  while ($stmt->fetch()) { ?>
                            <option value="<?php echo $id_gro; ?>"> <?php echo $name_gro; ?></option>      
                        <?php }
                        // ปิดการเชื่อมต่อฐานข้อมูล
                          $stmt->close();
                        ?>
                          </select>
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="user" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="user"
                            name="user" placeholder="user">
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="text" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="pass"
                            name="pass" placeholder="pass">
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
<?php } else {
header( 'Location: showmember.php');
} ?>
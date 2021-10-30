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
	<title>เพิ่มรายการจอง</title>
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
            <form action="inputmeetinsert.php" method="GET">
                <br>
      
                 
      
                
                <div class="row mb-3 ">
                    <label for="name_met" class="col-sm-2 col-form-label">ผู้จอง</label>
                   
                    <!-- //ทำการเรียกข้อมูลมาแสดงข้อมูลแผนก -->
                    <?php
                        include_once('member.php');               
                    ?>
                    <div class="col-sm-6">
                        <select class="form-select" name="name_met" aria-label="Default select example">
                        <option selected><?php echo $_SESSION['u']; ?></option>
                        <!-- // ทำการวนรอบ รหัสแผนก ชื่อแผนก มาแสดงผล -->
                      </select>
                    </div>
                </div>


               <div class="row mb-3 ">
                    <label for="date" class="col-sm-2 col-form-label">วันที่ประชุม</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="date"
                            name="date" placeholder="ชื่อ สกุล">
                    </div>
                </div>
                
                <div class="row mb-3 mt-3 ">
                    <label for="time" class="col-sm-2 col-form-label">เวลา</label>
                   
                    <div class="col-sm-6">
                        <select name="time" class="form-select" aria-label="Default select example"> 
                          	<option value="" selected>เลือกเวลา</option>  
                            <option value="08.30-12.00">08.30-12.00</option> 
                            <option value="13.00-16.30">13.00-16.30</option>  
                          </select>
                    </div>
                </div>

                 <div class="row mb-3 ">
                    <label for="details_met" class="col-sm-2 col-form-label">รายละเอียด</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="details_met"
                            name="details_met" placeholder="รายละเอียดการจอง">
                    </div>
                </div>

                <div class="row mb-3 ">
                    <label for="num_met" class="col-sm-2 col-form-label">จำนวน</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="num_met"
                            name="num_met" placeholder="จำนวนผู้เข้าประชุม">
                    </div>
                </div>
                
                
                 <div class="row mb-3 ">
                    <label for="id_gro" class="col-sm-2 col-form-label">ห้องประชุม</label>
                   
                    <!-- //ทำการเรียกข้อมูลมาแสดงข้อมูลแผนก -->
                  <?php
                        include_once('room.php');               
                    ?>
                    <div class="col-sm-6">
                        <select class="form-select" name="id_room" aria-label="Default select example">
                         
                        
                        <option selected>เลือกห้องประุชม</option>
                        <!-- // ทำการวนรอบ รหัสแผนก ชื่อแผนก มาแสดงผล -->
                        <?php  while ($stmt->fetch()) { ?>
                            <option value="<?php echo $id_room; ?>"> <?php echo $name_room; ?></option>      
                        <?php }
                        // ปิดการเชื่อมต่อฐานข้อมูล
                          $stmt->close();
                        ?>
                          </select>
                    </div>
                </div>

				<div class="row mb-3 mt-3 ">
                    <label for="status" class="col-sm-2 col-form-label">สถานการจอง</label>
                   
                    <div class="col-sm-6">
                        <select name="status" class="form-select" aria-label="Default select example">   
                            <option value="1" selected>จอง</option>  
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
<?php } else {
header( 'Location: showmeet.php');
} ?>
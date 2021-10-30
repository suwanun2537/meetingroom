<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบจองห้องประชุม สนง.คลังจังหวัดพังงา</title>
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
        <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/chucha.jpg" width="500" height="281"></td>
            <td>&nbsp;</td>
            <td><img src="images/tapu.jpg" width="500" height="281"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center">สำนักงานคลังจังหวัดพังงา อาคารศาลากลางจังหวัดพังงา ชั้น 1</td>
          </tr>
          <tr>
            <td colspan="3" align="center">ศูนย์ราชการจังหวัดพังงา ถนนพังงา - ทับปุด ตำบลถ้ำน้ำผุด อำเภอเมืองพังงา จังหวัดพังงา 82000</td>
          </tr>
          <tr>
            <td colspan="3" align="center">โทร. 076-481-475-6  โทรสาร. 076-481-474</td>
          </tr>
          <tr>
            <td colspan="3" align="center">E-mail : pna@cgd.go.th</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

     

</body>

</html>
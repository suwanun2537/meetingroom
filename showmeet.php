<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>รายการจอง</title>
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
        

        <div class="row">
            <form action="showmeet.php" method="GET" class="pt-3">
                <div class="row gx-3">
                    <div class="col-sm-2">
                        <input type="text" value="" class="form-control bg bg-light pb-2  " name="id_met" placeholder="ลำดับการจอง" />
                    </div>
                    <div class="col">
                        <input type="submit" class="btn  btn-outline-primary col-sm-3 " value="ค้นหาข้อมูล" name="find" />
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_GET['find']) &&  $_GET['id_met'] != '') {
            $id_met = $_GET['id_met'];
            $sql = "SELECT  m.id_met, m.name_met, m.date, m.time, m.details_met, m.num_met, r.name_room ,m.status
           FROM    meet m, room r
            WHERE   m.id_room = r.id_room
            AND     m.id_met = $id_met";
        } else {


            $sql = "SELECT  m.id_met, m.name_met, m.date, m.time, m.details_met, m.num_met, r.name_room ,m.status
            FROM    meet m, room r
             WHERE   m.id_room = r.id_room";
        }
		
		

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $name, $date, $time, $details,  $num,  $name_room ,$status);

        if ($stmt->num_rows() > 0) {

        ?>
            <table class="table table-info table-striped table-hover table-responsive mt-3 ">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ผู้จอง</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">เวลา</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">จำนวนผู้เข้าประชุม</th>
                        <th scope="col">ห้องประชุม</th>
                        <th scope="col">สถานะการจอง</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($stmt->fetch()) {
                        echo "<tr>";
                        echo "<th>" . $id . "</th>";
                        echo "<td>" . $name . "</td>";
                        echo "<td>" . $date . "</td>";
						echo "<td>" . $time . "</td>";
                        echo "<td>" . $details . "</td>";
                        echo "<td>" . $num . "</td>";
                        echo "<td>" . $name_room . "</td>";
						echo "<td>" . $status . "</td>";
                       }
            
            ?>
                </tbody>
            </table>

        <?php } else { ?>
            <div class="alert alert-warning mt-5 pt-3" role="alert">
                ไม่พบข้อมูล
            </div>

        <?php  } ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

     
    </div>
</body>

</html>
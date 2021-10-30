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
        

        <div class="row">
            <form action="showmember.php" method="GET" class="pt-3">
                <div class="row gx-3">
                    <div class="col-sm-2">
                        <input type="text" value="" class="form-control bg bg-light pb-2  " name="id_mem" placeholder="เลขบัตรประชาชน" />
                    </div>
                    <div class="col">
                        <input type="submit" class="btn  btn-outline-primary col-sm-3 " value="ค้นหาข้อมูล" name="find" />
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_GET['find']) &&  $_GET['id_mem'] != '') {
            $id_mem = $_GET['id_mem'];
            $sql = "SELECT  s.id_mem, s.pre_mem, s.fname_mem, s.lname_mem, s.tel_mem, s.email_mem, s.line_mem, d.name_gro
            FROM    member s, gro d
            WHERE   s.id_gro = d.id_gro
            AND     s.id_mem = $id_mem";
        } else {


            $sql = "SELECT  s.id_mem, s.pre_mem, s.fname_mem, s.lname_mem, s.tel_mem, s.email_mem, s.line_mem, d.name_gro
            FROM    member s, gro d
            WHERE   s.id_gro = d.id_gro";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $pre, $fname, $lname,  $tel, $email, $line, $name_gro);

        if ($stmt->num_rows() > 0) {

        ?>
            <table class="table table-info table-striped table-hover table-responsive mt-3 ">
                <thead>
                    <tr>
                        <th scope="col">เลขบัตรประชาชน</th>
                        <th scope="col">คำนำหน้า</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">เบอร์โทร</th>
                        <th scope="col">email</th>
                        <th scope="col">ID line</th>
                        <th scope="col">กลุ่มงาน</th>
                        <?php 
                        if($_SESSION['u'] != null){ ?>
                        <th scope="colspan='2'">Action</th>
                        <th scope="col"></th>
                        <?php }else { ?>
                            <th scope="colspan='2'"></th>
                            <th scope="col"></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($stmt->fetch()) {
                        echo "<tr>";
                        echo "<th>" . $id . "</th>";
                        echo "<td>" . $pre . "</td>";
                        echo "<td>" . $fname . "</td>";
                        echo "<td>" . $lname . "</td>";
                        echo "<td>" . $tel . "</td>";
                        echo "<td>" . $email . "</td>";
                        echo "<td>" . $line . "</td>";
                        echo "<td>" . $name_gro . "</td>";
                        if($_SESSION['u'] != null){
                            echo "<td><a href='deletemember.php?id_mem=" . $id . "'><input type='submit' class='btn btn-danger' value='DELETE'/></a></td>";
                            echo "<td><a href='editmember.php?id_mem=" . $id . "'><input type='submit' class='btn btn-warning' value='UPDATE'/></a></td>";
                        }else {
                            echo "<td></td>";
                            echo "<td></td>";
                        }
                        echo "</tr>";
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
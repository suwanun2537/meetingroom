<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>แสดงข้อมูลแผนก</title>
</head>

<body>
    <div class="container">

        <?php
        include_once('header.php');
        include_once('dbconnect.php');


        $sql = "SELECT  d.id_dep, d.name_dep
                FROM     dep d";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id_dep, $name_dep);
        ?>
        <table class="table table-info table-striped table-hover table-responsive mt-3">
            <thead>
                <tr>
                    <th scope="col">รหัสแผนก</th>
                    <th scope="col">ชื่อแผนก</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($stmt->fetch()) {
                echo "<tr>";
                echo "<th>" . $id_dep . "</th>";
                echo "<td>" . $name_dep . "</td>";
                echo "</tr>";
            }
            
            ?>
            </tbody>
        </table>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
</body>

</html>
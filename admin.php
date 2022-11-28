<?php
    require "./php/db_connection.php";
    require "./php/session.php";

    # Showing All Staffs
    // $sql = "SELECT * FROM staffs";
    // $staff = mysqli_query($conn, $sql);

    # Showing Complaints
    // $sql = "SELECT * FROM complaints";
    // $complaint = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <div class="container-mod">
        <div class="sidebar">
                <div class="bar_tittle">ADMIN - HMS</div>
                <div class="bar_menu">
                    <a class="a" href="admin.php"><p class="item">Dashbord</p></a>
                    <a href="admin_to_patient.php"><p class="item">Patient</p></a>
                    <a href="admin_to_doctor.php"><p class="item">Doctor</p></a>
                    <a href="#"><p class="item">Item 3</p></a>
                    <a href="#"><p class="item">Item 4</p></a>
                </div>
        </div>


        <div class="content">
            <div class="header">

                <!-- Dropdown -->
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user">
                        <div class="name">Administrator</div>
                        <div class="avater"><img src="./images/administrator.svg"></div>
                    </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="./php/logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="./php/logout.php">Action</a></li>
                    </ul>
                </div>
                
            </div>



            <div class="body">
                <div class="body-tittle">
                    <p class="welcome_text">Welcome Back</p>
                    <p class="text">Dashbord Overview</p>
            </div>
            <div class="body-content">
                <!-- Write code here -->
                







            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
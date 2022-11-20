<?php
    require "./php/db_connection.php";

    # Showing All Staffs
    $sql = "SELECT * FROM staffs";
    $staff = mysqli_query($conn, $sql);

    # Showing Complaints
    $sql = "SELECT * FROM complaints";
    $complaint = mysqli_query($conn, $sql);
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
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                
            </div>



            <div class="body">
                <div class="body-tittle">
                    <p class="welcome_text">Welcome Back</p>
                    <p class="text">Dashbord Overview</p>
            </div>
            <div class="body-content">
            
        
            </div>
        </div>

    </div>
                
                    <!--
                    
                        <div class="row">
                            <div class="card col-2">
                                <div class="info">
                                    <div class="card_name">Patient</div>
                                    <div class="number">1000</div>
                                </div>
                                <div class="icon">
                                    <img src="./icons/patient.png">
                                </div>
                            </div>
                            <div class="card col-2 offset-1">
                                <div class="info">
                                    <div class="card_name">Doctor</div>
                                    <div class="number">1000</div>
                                </div>
                                <div class="icon">
                                    <img src="./icons/doctor.png">
                                </div>
                            </div>
                            <div class="card col-2 offset-1">
                                <div class="info">
                                    <div class="card_name">Lab Tech</div>
                                    <div class="number">1000</div>
                                </div>
                                <div class="icon">
                                    <img src="./icons/lab_tech.png">
                                </div>
                            </div>
                            <div class="card col-2 offset-1">
                                <div class="info">
                                    <div class="card_name">Nurse</div>
                                    <div class="number">1000</div>
                                </div>
                                <div class="icon">
                                    <img src="./icons/nurse.png">
                                </div>
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="table_outer">
                                <div class="table_label">Staff Panel</div>
                                <div class="table_wrapper">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                            <th class="colum" scope="col">ID</th>
                                            <th class="colum" scope="col">NAME</th>
                                            <th class="colum" scope="col">EMAIL</th>
                                            <th class="colum" scope="col">NUMBER</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($staff, MYSQLI_ASSOC)) { ?>
                                            <tr>
                                            <th scope="row"><?php echo $row["staff_id"] ?></th>
                                            <td><?php echo $row["name"] ?></td>
                                            <td><?php echo $row["email"] ?></td>
                                            <td><?php echo $row["phone"] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="complaints">
                                <div class="comp_label">Complaints</div>
                                <?php while ($row = mysqli_fetch_array($complaint, MYSQLI_ASSOC)) { ?>
                                <a href="#"><div class="complain"><?php echo $row["tittle"] ?></div></a>
                                <?php } ?>
                            </div>
                        </div>
                </div>
            </div>
        </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
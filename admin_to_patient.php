<!-- <?php
    require "../hms/php/db_connection.php";

    if (isset($_GET["em"]) && isset($_GET["css_class"])) {
        $em = $_GET["em"];
        $css_class = $_GET["css_class"];
    }
    if (!isset($_REQUEST["search"])) {
        $sql = "SELECT * FROM patients";
        $patient = mysqli_query($conn, $sql);
    }
    else {
        $value = $_REQUEST["search_val"];
        $sql = "SELECT * FROM patients WHERE name LIKE '%$value%'";
        $patient = mysqli_query($conn, $sql);
    }
    

?> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients || HMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/admin_to_patient.css">
</head>
<body>
    <!-- <a href="admin.php"><button class="back">Dashbord</button></a>-->
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
                        <div class="header_text">Patients</div>
                        <div class="search_bar">
                            <form action="" method="post">
                                <input type="search" name="search_val">
                                <input class="button" type="submit" value="Search" name="search">
                            </form>
                        </div>
                    </div>

                    <table>
                        <thead>
                            <tr id="header">
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">PHONE</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($patient, MYSQLI_ASSOC)) { 
                                $id = $row["patient_id"];
                            ?>
                            <tr>
                            <td><?php echo $row["patient_id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["phone"] ?></td>
                            <td class="action">
                            <!-- <a href=""><button class="button_update" name="update"><span class="material-symbols-outlined">edit</span></button></a> -->
                            <a href="delete_patient.php?user_id=<?php echo $id ?>" ><button class="button_delete" name="delete"><span class="material-symbols-outlined">delete_forever</span></button></a>                       
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php
                        if (!empty($em)) { ?>
                                <div class="alert <?php echo $css_class ?>">
                                    <?php echo $em ?>
                                </div>
                        <?php    }?>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
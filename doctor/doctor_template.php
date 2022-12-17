<?php
    require "../utility/db_connection.php";
    require "../utility/session.php";
    if(!isset($_SESSION['is_doctor'])) {
        header('Location: ../login.php?msg=Login as a doctor');
    }

    #Getting Message
    if (isset($_GET["message"])) {
        $message = $_GET["message"];
        $css = $_GET["css"];
    }

    $doc_id =  $_SESSION['user_id'];
    $sql = "SELECT doc_name, doc_image FROM doctors WHERE doc_id='$doc_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin/admin.css">
    <style>
        .avater img {
            width: 2rem;
            height: 2rem;
            margin-left: 2px;
            border-radius: 20%;
        }

        .alert {
            margin-top: 1rem;
            text-align: center;
            color: white;
        }

        .error {
            background-color: #f03f3f;
        }

        .success {
            background-color: #45f03f;
        }
    </style>
</head>
<body>
    <div class="container-mod">
        <div class="sidebar">
                <div class="bar_tittle">Doctor - HMS</div>
                <div class="bar_menu">
                    <a class="a" href="./doctor_dashbord.php"><p class="item">Dashbord</p></a>
                </div>
        </div>


        <div class="content">
            <div class="header">

                <!-- Dropdown -->
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user">
                        <div class="name"><?php echo $row['doc_name'] ?></div>
                        <div class="avater"><img src="../images/doctor/<?php echo $row['doc_image'] ?>"></div>
                    </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="../utility/logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="../utility/logout.php">Action</a></li>
                    </ul>
                </div>
                
            </div>

            <!-- Error Message Display -->
            <?php
                if (isset($message)) {
            ?>
            <div class="alert <?php echo $css ?> alert-dismissible fade show" role="alert">
                <strong><?php echo $message ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


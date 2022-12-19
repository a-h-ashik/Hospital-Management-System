<?php
    require "db_connection.php";

    session_start();
    if (isset($_SESSION['user_id'])) {
        $session_set = TRUE;
    }
    else {
        $session_set = FALSE;
    }

    if (isset($_REQUEST['sto_name'])) {
        $has_story = TRUE;
        $sto_name = $_REQUEST['sto_name'];
    }
    else {
        $has_story = FALSE;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home || HMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/template.css"> -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <!-- Font Awsome Kit -->
    <script src="https://kit.fontawesome.com/a481ba0e3b.js" crossorigin="anonymous"></script>


    <div class="nav">
        <div class="nav_bar">
            <div class="logo">HMS</div>
            <div class="pages">
                <a href="index.php"><div class="page first">Home</div></a>
                <!-- <a href="#"><div class="page">Departments</div></a> -->
                <a href="find-a-doctor.php"><div class="page">Doctor & Appointnment</div></a>

                <?php if (!$session_set) { ?>
                <a href="./login.php"><div class="page">Login</div></a>
                <?php } ?>

                <?php if (isset($_SESSION['is_patient']) && $_SESSION['is_patient'] == TRUE) { ?>
                <a href="./patient/ProfilePage.php"><div class="page">Profile</div></a>
                <?php } ?>
                <?php if ($session_set) { ?>
                <a href="./utility/logout.php"><div class="page">Logout</div></a> 
                <?php } ?>
            </div>
        </div>
    </div>
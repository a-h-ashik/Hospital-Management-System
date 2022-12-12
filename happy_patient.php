<?php
    require "./utility/db_connection.php";

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
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/happy_patient.css">
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
                <a href="find-a-doctor.php"><div class="page">Find A Doctor</div></a>

                <?php if (!$session_set) { ?>
                <a href="login.php"><div class="page">Login</div></a>
                <?php } ?>

                <?php if ($session_set) { ?>
                <a href="#"><div class="page">Profile</div></a>
                <a href="./php/logout.php"><div class="page">Logout</div></a> 
                <?php } ?>
            </div>
        </div>
    </div> 

    <!-- Write Code Here -->
    <div class="content">
        <?php 
        if ($has_story) {
            $sql = "SELECT * FROM stories INNER JOIN admins on stories.adm_id = admins.adm_id WHERE sto_name = '$sto_name'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        ?>
        <div class="image"><img src="./images/<?php echo $row['sto_image'] ?>"></div>
        <div class="story-info">
            <div class="name">Patient Name: <?php echo $row['sto_name'] ?></div>
            <div class="date"> 
                <?php $date = date_create($row['sto_date']);
                echo date_format($date, 'M d, Y'); ?>
            </div>
            <div class="publisher">Published By <?php echo $row['adm_name'] ?></div>
            <div class="details"><?php echo $row['details'] ?></div>
        </div>


    </div>



    <div class="footer">
        <div class="foot-logo">
            <div class="logo">

            </div>
        </div>
        <div class="contact-navigation">
            <div class="navigation-links">
                <div><a href="#" class="n-link">About Us</a></div>
                <div><a href="#" class="n-link">Departments</a></div>
                <div><a href="#" class="n-link">Appoinments</a></div>
            </div>
            <div class="contact-info"><span class="bold">Address:</span> Dhaka, Bangladesh.</div>
            <div class="contact-info"><span class="bold">Contact:</span> hospital@gmail.com</div>
        </div>
        <div class="social-links">
            <a href="#" class="s-links"><i class="fab fa-facebook"></i></a>
            <a href="#" class="s-links"><i class="fab fa-youtube"></i></a>
            <a href="#" class="s-links"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
         



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
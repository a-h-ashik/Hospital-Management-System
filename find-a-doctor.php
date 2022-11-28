<?php
    require "./php/db_connection.php";
    // require "./php/session.php";

    session_start();
    if (isset($_SESSION['user_id'])) {
        $session_set = TRUE;
    }
    else {
        $session_set = FALSE;
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
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/find-a-doctor.css">
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
        <div class="form-area">
            <h4 class="form-tittle">Search</h4>
            <div class="forms">
                <form class="depa-form" action="" method="post">
                <label for="dept">Department</label>
                <select class="form-select" id="dept">
                    <option selected>--select--</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input class="botton" type="submit" value="Find">
                </form>

                <form class="doct-form" action="" method="post">
                    <label for="doct">Doctor</label>
                    <input class="search-box" type="search" name="doctor" id="doct">
                    <input class="botton" type="submit" value="Find">
                </form>
            </div>
            

        </div>
        <div class="content-data"></div>
    

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
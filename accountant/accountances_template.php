<!-- Header -->


<?php
    require "../utility/db_connection.php";

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/accountant/accountances_template.css">
    <link rel="stylesheet" href="../css/footer.css">
    
    
</head>

<body>
    <!-- Font Awsome Kit -->
    <script src="https://kit.fontawesome.com/a481ba0e3b.js" crossorigin="anonymous"></script>
    
    <div class="container-mod">
        <div class="sidebar">
            <div class="bar_tittle">ACCOUNTANCES</div>
            <div class="bar_menu">                  
                <a href="room_template.php"><p class="item">Room Booking</p></a>
                <a href="patient_due.php"><p class="item">Patient Due</p></a>
            </div>
        </div>
    </div>
</body>


<?php
    include "../utility/footer.php";
?>

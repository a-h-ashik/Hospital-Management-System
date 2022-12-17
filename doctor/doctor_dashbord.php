<?php
    require "./doctor_template.php";
?>

<head>
    <link rel="stylesheet" href="../css/doctor/doctor-dashbord.css">
</head>

<div class="outer-container">
    <div class="inner-container">
        <a href="./doctor_profile.php"><div class="mycard">
            <span>MANAGE <br> PROFILE</span>
        </div></a>
        <a href="./appointment.php"><div class="mycard">
            <span>TODAY's <br> APPOINMENTS</span>
        </div></a>
    </div>
    <div class="inner-container mod">
        <a href=""><div class="mycard">
            <span>PRESCRIPTIONS</span>
        </div></a><a href=""><div class="mycard mod2">
        </div></a>
    </div>
</div>
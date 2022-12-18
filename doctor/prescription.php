<?php
    require '../utility/db_connection.php';
    require '../utility/date_time.php';

    if (isset($_GET['pat_id'])) {
        session_start();
        $pat_id = $_GET['pat_id'];
        $doc_id = $_SESSION['user_id'];
    }
    $sql = "SELECT * FROM doctors D, patients P, appointments A WHERE D.doc_id=A.doc_id AND A.pat_id=P.pat_id AND A.date='$current_date' AND A.pat_id='$pat_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription || HMS</title>
    <link rel="stylesheet" href="../css/doctor/prescription.css">
</head>
<body>
    <div class="outer-container">
        <div class="hospital">
            <div class="name">HMS</div>
            <div class="address">Dhaka, Bangladesh</div>
            <div class="contact">+8801*********</div>
        </div>
        <div class="info">
            <div class="name">Name: <?php echo $row['pat_name'] ?></div>
            <div class="age">Age: <?php echo $row['age'] ?></div>
            <div class="gender">Gender: <?php echo $row['gender'] ?></div>
            <div class="date">Date: <?php echo $row['date'] ?></div>
        </div>
        <form action="">
            <textarea class="area"></textarea>
        </form>
        <div class="signature">
        <?php echo $row['doc_name'] ?> <br>
            <small><?php echo $row['degree'] ?></small>
        </div>
    </div>
</body>
</html>
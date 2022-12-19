
<?php
    require "../utility/db_connection.php";
    $sql = "SELECT * FROM rooms";
    $result1 = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);
    $result3 = mysqli_query($conn, $sql);
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
    <!-- <link rel="stylesheet" type="text/css" href="../css/footer.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/login.css"> -->
    

    <meta name="viewport" content="width=device-width, initial-scale=1">



<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
}
.row {
    min-height: calc(100vh - 100px);
    margin-top: 1rem;
}

.tittle {
    font-size: 1.5rem;
    font-weight: 700;
}

.row2 {
  display: flex;
  justify-content: space-evenly;
  flex-direction: row;
  margin-top: 2rem;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

.button {
    padding: 10px 18px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    color: #fff;
    background-color: #04AA6D;
    margin-top: 0.2rem;
}

.button:hover {background-color: #3e8e41}

.button:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}
</style>








</head>

<body>
    <!-- Font Awsome Kit -->
    <script src="https://kit.fontawesome.com/a481ba0e3b.js" crossorigin="anonymous"></script>  

    <div class="container">
        <div class="row">
            <div class="card col-12">
                <div class="tittle">ROOM BOOKING</div>
                
                <div class="row2">
                    <div class="column">
                        <div class="card">
                        <h3>ICU</h3>
                        <?php 
                            while ($row = mysqli_fetch_array($result1)) {
                                if ($row['type'] == 'I') {
                        ?>
                        <a href="room_booking_form.php?room_id=<?php echo $row['room_id'] ?>" class="button" role="button"><?php echo $row['room_id'] ?></a>
                        <?php }} ?>
                        
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <h3>VIP</h3>
                        <?php 
                            while ($row = mysqli_fetch_array($result2)) {
                                if ($row['type'] == 'V') {
                        ?>
                        <a href="room_booking_form.php?room_id=<?php echo $row['room_id'] ?>" class="button" role="button"><?php echo $row['room_id'] ?></a>
                        <?php }} ?>
                        
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <h3>GENERAL</h3>
                        <?php 
                            while ($row = mysqli_fetch_array($result3)) {
                                if ($row['type'] == 'G') {
                        ?>
                        <a href="room_booking_form.php?room_id=<?php echo $row['room_id'] ?>" class="button" role="button"><?php echo $row['room_id'] ?></a>
                        <?php }} ?>
                        
                        </div>
                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

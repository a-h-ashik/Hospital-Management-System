
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

    $form_tittle = "Room Booking"
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
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    

    <meta name="viewport" content="width=device-width, initial-scale=1">



<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

/* Button */
.button {
    padding: 10px 18px;
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #04AA6D;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
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
                <div class="tittle"><?php echo $form_tittle ?></div>
                <?php
                    if (!empty($em)) { ?>
                        <div class="alert <?php echo $css_class ?>">
                            <?php echo $em ?>
                        </div>
                <?php    }?>

                <form action="" method="post">
                


                
                <div class="row">
                    <div class="column">
                        <div class="card">
                        <h3>Non AC Room</h3>
                        <a href="room_booking_form.php" class="button" role="button">HB301 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB302 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB303 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB304 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB305 AC</a></button>
                        
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <h3>AC Room</h3>
                        <a href="room_booking_form.php" class="button" role="button">HB401 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB402 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB403 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB404 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB405 AC</a></button>
                        
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                        <h3>VIP Room</h3>
                        <a href="room_booking_form.php" class="button" role="button">HB501 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB502 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB503 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB504 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB505 AC</a></button>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                        <h3>Coom Room</h3>
                        <a href="room_booking_form.php" class="button" role="button">HB201 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB202 AC</a></button>
                        <a href="room_booking_form.php" class="button" role="button">HB203 AC</a></button>
                        
                        </div>
                    </div>
                    
                </div>
                
                </form>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




<?php
    include "../utility/footer.php";
?>
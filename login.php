<?php
    require "./php/db_connection.php";

    # Getting Messages
    if (isset($_REQUEST["msg"])) {
        $em = $_REQUEST["msg"];
        $css_class = "alert-success";
    }

    if (isset($_REQUEST["submit"])) {
        if (($_REQUEST["email"] == "") || ($_REQUEST["password"] == "")) {
            $em = "Fill out all the fields!";
            $css_class = "alert-danger";
        }
        else {
            $usertable = $_REQUEST["radio"] . "s";
            $useremail = $_REQUEST["email"];
            $password = (int)$_REQUEST["password"];

            if ($_REQUEST["radio"] == "patient") {
                $email = 'pat_email';
                $userid = 'pat_id';
            }
            else if ($_REQUEST["radio"] == "doctor") {
                $email = 'doc_email';
                $userid = 'doc_id';
            }
            else if ($_REQUEST["radio"] == "labtech") {
                $email = 'lat_email';
                $userid = 'lat_id';
            }
            else if ($_REQUEST["radio"] == "admin") {
                $email = 'adm_email';
                $userid = 'adm_id';
            }


            $sql = "SELECT $password FROM $usertable WHERE EXISTS (SELECT * FROM $usertable WHERE $email = '$useremail')";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
            $count = mysqli_num_rows($result); 

            #Setting Session
            session_start();
            $sql = "SELECT * FROM $usertable WHERE $email = '$useremail'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION["user_id"] = $row["$userid"];
            $_SESSION["user_table"] = $usertable;

            if ($count == 1 && $usertable == "patients") {
                header("Location: /hms/");
            }
            else if ($count == 1 && $usertable == "admins") {
                header("Location: /hms/admin.php");
            }
            else {
                $em = "Account does not exist!";
                $css_class = "alert-danger";
            }
        }
        
    }
    


    $form_tittle = "Login"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/login.css">
    <title>Login - HMS</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card col-5">
                <div class="tittle"><?php echo $form_tittle ?></div>
                <?php
                    if (!empty($em)) { ?>
                        <div class="alert <?php echo $css_class ?>">
                            <?php echo $em ?>
                        </div>
                <?php    }?>
                <form action="" method="post">
                <div class="radio">
                    <input class="input__radio" type="radio" value="patient" name="radio" id="r1" checked="checked">
                    <label class="input__label" for="r1">Patient</label>
                    <input class="input__radio" type="radio" value="doctor" name="radio" id="r2">
                    <label class="input__label" for="r2">Doctor</label>
                    <input class="input__radio" type="radio" value="labtech" name="radio" id="r3">
                    <label class="input__label" for="r3">Lab Tech</label>
                    <input class="input__radio" type="radio" value="admin" name="radio" id="r4">
                    <label class="input__label" for="r4">Admin</label>
                </div>
                <input class="form-control" type="text" placeholder = "Email" aria-label="Email" name="email">
                <input class="form-control" type="password" placeholder = "Password" aria-label="Password" name="password">
                <input type="submit" class ="submit" name="submit" value="Submit">
                </form>
                <p class="question">Don't have an account? <a href="/hms/patient_signup.php">Signup</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
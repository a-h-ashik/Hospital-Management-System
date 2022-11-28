<?php
    require "./php/db_connection.php";

    if (isset($_REQUEST["submit"])) {
        if (($_REQUEST["name"] == "") || ($_REQUEST["password1"] == "") || ($_REQUEST["password2"] == "") || ($_REQUEST["address"] == "") || ($_REQUEST["email"] == "") || ($_REQUEST["gander"] == "")) {
            $em = "Fill out all the fields!";
            $css_class = "alert-danger";
        }
        else if ($_REQUEST["password1"] != $_REQUEST["password2"]) {
            $em = "Passwords do not match!";
            $css_class = "alert-danger";
        }
        else {
            $username = $_REQUEST["name"];
            $password = $_REQUEST["password1"];
            $address = $_REQUEST["address"];
            $email = $_REQUEST["email"];
            $gander = $_REQUEST["gander"];
            $arr = explode('/', $_FILES['profile_image']['type']);
            $ext = $arr[1];
            $img_name = $username . '.' . $ext;
            print_r($img_name);
            $temp_path = $_FILES["profile_image"]["tmp_name"];
            $target = 'images/' . $img_name;
            if (move_uploaded_file($temp_path, $target)) {
                $sql = "SELECT pat_id FROM patients ORDER BY pat_id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $id = (int)$row["pat_id"];
                    $id = $id + 1;
                }
                else {
                    $id = "20220000";
                }


                $sql = "INSERT INTO patients VALUES ($id, '$username', '$email', '$gander', '$address', '$img_name', '$password')";
                if (mysqli_query($conn, $sql)) {
                    $em = "Account is created successfully.";
                    $css_class = "alert-success";
                    header("Location: /hms/login.php");
                }
                else {
                    $em = "Sorry! An error occured!";
                    $css_class = "alert-danger";
                }
                
                
            }
            else {
                $em = "Faild to upload the image!";
                $css_class = "alert-danger";
            }
        }
        
    }
    


    $form_tittle = "Patient Sign Up"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/signup.css">
    <title>Patient Signup - HMS</title>
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
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form_content">
                    <div class="left">
                    <input class="form-control" type="text" placeholder = "Name" aria-label="Name" name="name">
                    <input class="form-control" type="text" placeholder = "Email" aria-label="Email" name="email">
                    <input class="form-control" type="password" placeholder = "Password" aria-label="Password" name="password1">
                    <input class="form-control" type="password" placeholder = "Re-enter Password" aria-label="Password" name="password2">
                    </div>
                
                    <div class="right">
                    <input class="form-control" type="text" placeholder = "Address" aria-label="Address" name="address">
                    <!-- <select class="form-select" name="bloodgroup" aria-label="Default select example">
                        <option selected>Blood Group...</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select> -->
                    <select class="form-select" name="gander" aria-label="Default select example">
                        <option selected>Gander...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="file" name="profile_image" id="profile_image">
                    </div>
                </div>    
                <input type="submit" class ="submit" name="submit" value="Submit">
                </form>
                <p class="question">Aready have an account? <a href="/hms/login.php">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
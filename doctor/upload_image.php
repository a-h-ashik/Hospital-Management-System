<?php
    include './doctor_template.php';
    $doc_id = $_SESSION['user_id'];
    if (isset($_REQUEST["set"])) {
        if ($_FILES['image']['size'] != 0) {
            #Query for finding doctor's name
            $sql = "SELECT doc_name FROM doctors WHERE doc_id='$doc_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $username = $row['doc_name'];

            $arr = explode('/', $_FILES['image']['type']);
            $ext = $arr[1];
            $img_name = $username . '.' . $ext;
            $temp_path = $_FILES["image"]["tmp_name"];
            $target = '../images/doctor/' . $img_name;
            if (move_uploaded_file($temp_path, $target)) {
                #Query for updating doctor's image
                $sql = "UPDATE doctors SET doc_image='$img_name' WHERE doc_id='$doc_id'";
                $result = mysqli_query($conn, $sql);
                header('Location: ./doctor_profile.php?message=Profile image has been uploaded&css=success');
            }
        }
        else {
            header('Location: ./upload_image.php?message=Fill in the box&css=error');
        }
    }
    

?>

<head>
    <link rel="stylesheet" href="../css/doctor/change-password.css">
</head>
    

    <div class="outer-container">
        <form action="" method="post" enctype="multipart/form-data">
            <span class="title">Upload Image</span>
            <div class="input-group">
                <input type="file" class="form-control" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <input type="submit" class="bTn" name="set" value="Set">
        </form>
    </div>


</body>
</html>
<?php
    include './admin_template_2.php';
    if (isset($_GET["story_name"])) {
        $prev_name = $_GET["story_name"];
        $sql = "SELECT * FROM stories WHERE sto_name='$prev_name'";
        $result = mysqli_query($conn, $sql);
        $info = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }




    #Story Update Functionality
    if (isset($_REQUEST["update"])) {
        if (($_REQUEST["name"] == "") || ($_REQUEST["details"] == "")) {
            $em = "Story isn't updated. You did not fill out all the fields.";
            $css_class = "alert-danger";
            header("Location: ../admin_to_story.php?em=" . $em . "&css_class=" . $css_class);
        }
        else {
            
            #Getting Values from FORM
            $name = $_REQUEST["name"];
            $details = $_REQUEST["details"];
            $admin_id = (int)$_SESSION['user_id'];

            #Image handling
            $arr = explode('/', $_FILES['story_image']['type']);
            $ext = $arr[1];
            $img_name = $name . '.' . $ext;

            $temp_path = $_FILES["story_image"]["tmp_name"];
            $target = '../../images/' . $img_name;
            if (move_uploaded_file($temp_path, $target)) {

                #Update queary
                $sql = "UPDATE stories SET sto_name='$name', details='$details', sto_image='$img_name' WHERE sto_name='$prev_name'";

                #Message generating
                if (mysqli_query($conn, $sql)) {
                    $em = "Story is updated.";
                    $css_class = "alert-success";
                    header("Location: ../admin_to_story.php?em=" . $em . "&css_class=" . $css_class);
                }
            }
        }
    }

?>
<head>
    <link rel="stylesheet" href="../../css/admin/update.css">
    <link rel="stylesheet" href="../../css/admin/admin.css">

</head>
<body>
    <div class="popup">
        <div class="window">
            <form class="add_form" action="" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" placeholder = "Name" aria-label="Name" name="name" value="<?php echo $info['sto_name'] ?>">
            <textarea name="details" class="form-control" rows="10" placeholder="Details..."><?php echo $info['details'] ?></textarea>
            <input class="form-control" type="file" name="story_image">
            <input type="submit" class ="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</body>
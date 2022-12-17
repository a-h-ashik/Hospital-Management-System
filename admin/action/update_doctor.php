<?php
    include './admin_template_2.php';
    if (isset($_GET["user_id"]) && isset($_GET["type"])) {
        $id = $_GET["user_id"];
        $type = $_GET["type"];
        if ($type == 'doctor') {
            $sql = "SELECT * FROM doctors WHERE doc_id='$id'";
            $result = mysqli_query($conn, $sql);
            $info = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }

    }

    if (isset($_REQUEST['update'])) {
        #Getting Values From FORM
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $speciality = $_REQUEST["speciality"];
        $degree = $_REQUEST["degree"];
        $visit = $_REQUEST["visit"];
        $department = $_REQUEST["department"];

        #Update Query
        $sql = "UPDATE doctors SET doc_name='$name', doc_email='$email', speciality='$speciality', degree='$degree', visit='$visit', dep_name='$department' WHERE doc_id='$id'";
        $result = mysqli_query($conn, $sql);

        #Sending Messages
        if ($result) {
            $em = "$name is updated.";
            $css_class = "alert-success";
            header("Location: ../admin_to_doctor.php?em=" . $em . "&css_class=" . $css_class);
        }

    }


?>
<head>
    <link rel="stylesheet" href="../../css/admin/admin.css">
    <link rel="stylesheet" href="../../css/admin/update.css">
</head>
<body>
    <div class="popup">
        <div class="window">
            <form class="add_form" action="" method="post">
            <input class="form-control" type="text" placeholder = "Name" aria-label="Name" name="name" value="<?php echo $info['doc_name'] ?>">
            <input class="form-control" type="text" placeholder = "Email" aria-label="Email" name="email" value="<?php echo $info['doc_email'] ?>">
            <input class="form-control" type="text" placeholder = "Speciality" aria-label="Speciality" name="speciality" value="<?php echo $info['speciality'] ?>">
            <input class="form-control" type="text" placeholder = "Degree" aria-label="Degree" name="degree" value="<?php echo $info['degree'] ?>">
            <input class="form-control" type="text" placeholder = "Department" aria-label="Department" name="department" value="<?php echo $info['dep_name'] ?>">
            <input class="form-control" type="text" placeholder = "Visit" aria-label="Visit" name="visit" value="<?php echo $info['visit'] ?>">
            <input type="submit" class ="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</body>
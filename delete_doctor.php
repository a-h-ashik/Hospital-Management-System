<?php
    require "../hms/php/db_connection.php";

    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
        $sql =  "SELECT doc_name FROM doctors WHERE doc_name IN (SELECT doc_name FROM doctors WHERE doc_id = '$user_id')";
        $result_name = mysqli_query($conn, $sql);

        $sql = "DELETE FROM doctors WHERE doc_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $row = mysqli_fetch_array($result_name);
            $name = $row["name"];
            $em = "User " . $name . " has been deleted.";
            $css_class = "alert-success";
            header("Location: admin_to_doctor.php?em=" . $em . "&css_class=" . $css_class);
        }
        else {
            $em = "There is an error!";
            $css_class = "alert-danger";
            header("Location: admin_to_doctor.php?em=" . $em . "&css_class=" . $css_class);
        }
    }


?>
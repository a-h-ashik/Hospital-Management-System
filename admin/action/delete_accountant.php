<?php
    require "../../utility/db_connection.php";

    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
        $sql =  "SELECT * FROM accountants WHERE acc_name IN (SELECT acc_name FROM accountants WHERE acc_id = '$user_id')";
        $result_name = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result_name);

        $sql = "DELETE FROM accountants WHERE acc_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $name = $row["acc_name"];
            $em = "User " . $name . " has been deleted.";
            $css_class = "alert-success";
            header("Location: ../admin_to_accountant.php?em=" . $em . "&css_class=" . $css_class);
        }
        else {
            $em = "There is an error!";
            $css_class = "alert-danger";
            header("Location: ../admin_to_accountant.php?em=" . $em . "&css_class=" . $css_class);
        }
    }


?>
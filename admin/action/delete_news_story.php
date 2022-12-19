<?php
    require "../../utility/db_connection.php";
    if (isset($_GET["type"]) && $_GET["type"] == "story") {
        if (isset($_GET["name"])) {
            $sto_name = $_GET["name"];
            $sql =  "SELECT sto_name FROM stories WHERE sto_name IN (SELECT sto_name FROM stories WHERE sto_name = '$sto_name')";
            $result_name = mysqli_query($conn, $sql);

            $sql = "DELETE FROM stories WHERE sto_name='$name'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $em = "Story has been deleted.";
                $css_class = "alert-success";
                header("Location: ../admin_to_story.php?em=" . $em . "&css_class=" . $css_class);
            }
            else {
                $em = "There is an error!";
                $css_class = "alert-danger";
                header("Location: ../admin_to_story.php?em=" . $em . "&css_class=" . $css_class);
            }
        }
    }
    elseif (isset($_GET["type"]) && $_GET["type"] == "news") {
        if (isset($_GET["name"])) {
            $new_name = $_GET["name"];
            $sql =  "SELECT new_name FROM news WHERE new_name IN (SELECT new_name FROM news WHERE new_name = '$new_name')";
            $result_name = mysqli_query($conn, $sql);

            $sql = "DELETE FROM news WHERE new_name='$name'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $em = "News has been deleted.";
                $css_class = "alert-success";
                header("Location: ../admin_to_news.php?em=" . $em . "&css_class=" . $css_class);
            }
            else {
                $em = "There is an error!";
                $css_class = "alert-danger";
                header("Location: ../admin_to_news.php?em=" . $em . "&css_class=" . $css_class);
            }
        }
    }

    


?>



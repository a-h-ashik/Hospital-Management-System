<?php
    include './doctor_template.php';

    if (isset($_REQUEST["set"])) {
        if ($_REQUEST['old']=="" || $_REQUEST["new"]=="") {
            header("Location: ./change_password.php?message=Fill all the boxes!&css=error");
        }
        else {
            $old_pass = $_REQUEST['old'];
            $new_pass = $_REQUEST['new'];

            #Matching old password
            $doc_id = $_SESSION['user_id'];
            $sql = "SELECT pass FROM doctors WHERE doc_id='$doc_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $actual_pass = $row["pass"];
            if ($actual_pass == $old_pass) {
                #Setting new password
                $sql = "UPDATE doctors SET pass='$new_pass' WHERE doc_id='$doc_id'";
                if ($result = mysqli_query($conn, $sql)) {
                    header("Location: ./doctor_profile.php?message=Your password has been updated&css=success");
                }
                else{
                    header("Location: ./change_password.php?message=Error! While updating password!&css=error");
                }
            }
            else {
                header("Location: ./change_password.php?message=Old Password dis not match!&css=error");
            }
            
        }
    }
    

?>

<head>
    <link rel="stylesheet" href="../css/doctor/change-password.css">
</head>
    

    <div class="outer-container">
        <form action="" method="post">
            <span class="title">Change Password</span>
            <input type="password" class="inp" name="old" placeholder="Old Password">
            <input type="password" class="inp" name="new" placeholder="New Password">
            <input type="submit" class="bTn" name="set" value="Set">
        </form>
    </div>


</body>
</html>
<?php
    // session_start();
    if (isset($_SESSION['user_id'])) {
        if (!$_SESSION['is_patient']) {
            header('Location: ../login.php?msg=Login as a patient first');
        }
    }
    else {
        header('Location: ../login.php?msg=Login as a patient first');
    }
?>
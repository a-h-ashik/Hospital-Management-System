<?php
    session_start();
    session_unset();
    header("Location: /hms/login.php?msg=You are logged out")
?>
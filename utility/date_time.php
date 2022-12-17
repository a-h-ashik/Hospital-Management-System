<?php
    date_default_timezone_set('Asia/Dhaka');
    $current_date = date('Y-m-d');
    $current_day = date('D');
    $after15days = date("Y-m-d", strtotime($current_date ." +15 day"));
?>
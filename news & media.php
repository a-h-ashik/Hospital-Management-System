<?php
    include "./utility/header.php";

    if (isset($_REQUEST['new_name'])) {
        $has_news = TRUE;
        $new_name = $_REQUEST['new_name'];
    }
    else {
        $has_news = FALSE;
    }
?>

<head>
    <link rel="stylesheet" href="./css/happy_patient.css">
</head>




    <div class="content">
        <?php 
        if ($has_news) {
            $sql = "SELECT * FROM news INNER JOIN admins on news.adm_id = admins.adm_id WHERE new_name = '$new_name'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        ?>
        <div class="image"><img src="./images/<?php echo $row['new_image'] ?>"></div>
        <div class="story-info">
            <div class="name">Patient Name: <?php echo $row['new_name'] ?></div>
            <div class="date"> 
                <?php $date = date_create($row['new_date']);
                echo date_format($date, 'M d, Y'); ?>
            </div>
            <div class="publisher">Published By <?php echo $row['adm_name'] ?></div>
            <div class="details"><?php echo $row['details'] ?></div>
        </div>


    </div>
    

<?php
    include "./utility/footer.php"
?>
<?php
    include "./utility/header.php";

    if (isset($_SESSION['user_id'])) {
        $session_set = TRUE;
    }
    else {
        $session_set = FALSE;
    }

    #GROUP BY Queary
    $sql = "SELECT dep_name from doctors GROUP BY dep_name";
    $departments = mysqli_query($conn, $sql);

    if (!isset($_REQUEST["find-dept"]) && !isset ($_REQUEST["find-doc"])) {
        $sql = "SELECT * FROM doctors WHERE dep_name='MEDICINE'";
        $doctors = mysqli_query($conn, $sql);
    }

    elseif (isset($_REQUEST["find-dept"])) {
        $dep_name = $_REQUEST['department'];
        $sql = "SELECT * FROM doctors WHERE dep_name='$dep_name'";
        $doctors = mysqli_query($conn, $sql);
    }

    elseif (isset($_REQUEST["find-doc"])) {
        $doc_name = $_REQUEST['doctor'];
        $sql = "SELECT * FROM doctors WHERE doc_name LIKE '%$doc_name%'";
        $doctors = mysqli_query($conn, $sql);
    }
    

?>

<head>
    <link rel="stylesheet" href="./css/find-a-doctor.css">
</head>

    <!-- Write Code Here -->
    <div class="content">
        <div class="form-area">
            <h4 class="form-tittle">Search</h4>
            <div class="forms">
                <form class="depa-form" action="" method="post">
                <label for="dept">Department</label>
                <select class="form-select" id="dept" name="department">
                    <option selected>--select--</option>
                    <?php 
                        while($row = mysqli_fetch_array($departments, MYSQLI_ASSOC)) {
                    ?>
                    <option><?php echo $row['dep_name'] ?></option>
                    <?php } ?>
                </select>
                <input class="botton" type="submit" value="Find" name="find-dept">
                </form>

                <form class="doct-form" action="" method="post">
                    <label for="doct">Doctor</label>
                    <input class="search-box" type="search" name="doctor" id="doct">
                    <input class="botton" type="submit" name="find-doc" value="Find">
                </form>
            </div>
            

        </div>
        <div class="content-data">
            <?php 
                while ($row = mysqli_fetch_array($doctors, MYSQLI_ASSOC)) {
            ?>

            <div class="doctor-card">
                <div class="image">
                    <img src="./images/doctor/<?php echo $row['doc_image'] ?>">
                </div>
                <div class="info">
                    <div class="name"><?php echo $row["doc_name"] ?> (<?php echo $row["degree"] ?>)</div>
                    <div class="speciality"><?php echo $row["speciality"] ?></div>
                    <div class="departmant">Department: <?php echo $row["dep_name"] ?></div>
                    <a href=""><div class="botton">Set up an appoinment</div></a>
                </div>
                
            </div>

            <?php } ?>


        </div>
    

    </div>
    



<?php
    include "./utility/footer.php";
?>
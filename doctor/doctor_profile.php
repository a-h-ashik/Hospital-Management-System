<?php
    include "doctor_template.php";

    $doc_id =  $_SESSION['user_id'];
    $sql = "SELECT * FROM doctors D, schedules S WHERE D.doc_id=S.doc_id AND D.doc_id='$doc_id'";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);
    


    if (isset($_REQUEST['save'])) {
        $name = $_REQUEST['name'];
        $visit = $_REQUEST['visit'];
        $sql = "UPDATE doctors SET doc_name='$name', visit='$visit' WHERE doc_id = '$doc_id'";
        $result = mysqli_query($conn, $sql);
        header("Location: ./doctor_profile.php?message=Informations have been updated&css=success");
    }
?>

<head>
    <link rel="stylesheet" href="../css/doctor/doctor-profile.css">
</head>

<div class="outer-container">
    <div class="left box">
        <?php $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ?>
        <div class="image">
            <img src="../images/doctor/<?php echo $row['doc_image'] ?>">
        </div>
        <div class="personal-info">
            <form action="" method="post">
                <input type="text" class="inp" name="name" placeholder="Name" value="<?php echo $row['doc_name'] ?>">
                <input type="text" class="inp" placeholder="Email" value="<?php echo $row['doc_email'] ?>" disabled>
                <input type="text" class="inp" placeholder="Degree" value="<?php echo $row['degree'] ?>" disabled>
                <input type="text" class="inp" placeholder="Department" value="Dep: <?php echo $row['dep_name'] ?>" disabled>
                <input type="text" class="inp" placeholder="Speciality" value="<?php echo $row['speciality'] ?>" disabled>
                <input type="text" class="inp" name="visit" placeholder="Visit" value="<?php echo $row['visit'] ?>">
                <input class="save-btn" type="submit" name="save" value="Save">           
            </form>
        </div>
    </div>

    <div class="right box">
        <div class="table-name">SCHEDULE</div>

        <table>
            <tr>
                <th>DAY</th>
                <th>MORNING</th>
                <!-- <th>M-SLOT</th> -->
                <th>EVENING</th>
                <!-- <th>E-SLOT</th> -->
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['sch_day'] ?></td>

                <?php if ($row['shift_m']) { ?>
                <td><span class="material-symbols-outlined">check_circle</span></td>
                <?php 
                    }else {
                ?>
                <td><span class="material-symbols-outlined">cancel</span></td>
                <?php 
                    }
                ?>

                <?php if ($row['shift_e']) { ?>
                <td><span class="material-symbols-outlined">check_circle</span></td>
                <?php 
                    }else {
                ?>
                <td><span class="material-symbols-outlined">cancel</span></td>
                <?php 
                    }
                ?>

            </tr> 
            <?php } ?>
            
        </table>
        <div class="buttons">
            <a href="./change_password.php"><div class="cng-pass">Change Pasword</div></a>
            <a href="./upload_image.php"><div class="up-img">Upload Image</div></a>
        </div>

    </div>
</div>


</body>
</html>
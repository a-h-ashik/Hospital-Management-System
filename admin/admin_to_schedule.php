<?php
    include '../utility/admin_template.php';
    
    $result = FALSE;
    #Getting for Messages
    if (isset($_GET["em"]) && isset($_GET["css_class"])) {
        $em = $_GET["em"];
        $css_class = $_GET["css_class"];
    }

    #Search Functionality
    if (isset($_REQUEST["search"])) {
        $value = $_REQUEST["search_val"];
        $sql = "SELECT * FROM doctors D, schedules S WHERE D.doc_id=S.doc_id AND doc_name LIKE '%$value%' ORDER BY S.sl";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    }
    
    #Doctor Creation Functionality
    if (isset($_REQUEST["submit"])) {
        if (($_REQUEST["day"] == "") || ($_REQUEST["shift_m"] == "") || ($_REQUEST["shift_e"] == "")) {
            $em = "Fill out all the fields!";
            $css_class = "alert-danger";
        }
        else {
            
            #Getting Values from FORM
            $id = (int)$_REQUEST["id"];
            $day = $_REQUEST["day"];
            $shift_m = $_REQUEST["shift_m"];
            $shift_e = $_REQUEST["shift_e"];
            if ($shift_m == 'TRUE') {
                $shift_m = TRUE;
            }
            else {
                $shift_m = FALSE;
            }
            if ($shift_e == 'TRUE') {
                $shift_e = TRUE;
            }
            else {
                $shift_e = FALSE;
            }

            if ($day == 'Sat') {$sl = 1;}
            if ($day == 'Sun') {$sl = 2;}
            if ($day == 'Mon') {$sl = 3;}
            if ($day == 'Tue') {$sl = 4;}
            if ($day == 'Wed') {$sl = 5;}
            if ($day == 'Thu') {$sl = 6;}
            if ($day == 'Fri') {$sl = 7;}
            
            #Insert Query
            $sql = "INSERT INTO schedules VALUES ('$id', '$day', '$shift_m', '$shift_e', $sl)";
            $result = mysqli_query($conn, $sql);
            

            #Sending Messages
            if ($result) {
                $em = "$name is added.";
                $css_class = "alert-success";
                header("Location: ./admin_to_schedule.php");
            }
            else {
                $em = "There is an error!";
                $css_class = "alert-danger";
            }
        }
    }

?>


<head>
    <title>Doctor-Admin || HMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/admin/admin_to_patient.css">
    <link rel="stylesheet" href="../css/admin/admin_to_doctor.css">

    <style>
        .table-title {
            width: 100%;
            padding: 1rem;
            text-align: center;
            font-size: 1.2rem;
            font-weight: 700;
        }
    </style>
</head>
<body>

            <div class="top-bar">
                <div class="top-bar-text">Doctors</div>
                <div class="search_bar">
                    <form action="" method="post">
                        <input type="search" name="search_val">
                        <input class="button" type="submit" value="Search" name="search">
                    </form>
                </div>
            </div>
            <button class="btn_wrapper">
                <div class="add">Add New</div> 
            </button>

            <div class="table-title">
                Schedule of <?php if ($result) { echo $row['doc_name']; }?>
            </div>

            <table action="" method="post">
                <thead>
                    <tr id="header">
                    <th scope="col">Day</th>
                    <th scope="col">Morning</th>
                    <th scope="col">Evening</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                    <td><?php echo $row["sch_day"] ?></td>
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
                    <?php }} ?>
                </tbody>
            </table>

            <?php
                if (!empty($em)) { ?>
                        <div class="alert <?php echo $css_class ?> alert-dismissible fade show">
                            <?php echo $em ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php    }?>
            

            <div class="popup">
                <div class="window">
                    <button class="close"><span class="material-symbols-outlined">disabled_by_default</span></button>
                    <form class="add_form" action="" method="post">
                    <input class="form-control" type="text" placeholder = "Doctor's ID" aria-label="Id" name="id">
                    <input class="form-control" type="text" placeholder = "Day (Ex. Sat/Sun/Mon)" aria-label="Day" name="day">
                    <input class="form-control" type="text" placeholder = "Morning Shift (TRUE/FALSE)" aria-label="Morning Shift" name="shift_m">
                    <input class="form-control" type="text" placeholder = "Evening Shift (TRUE/FALSE)" aria-label="Evening Shift" name="shift_e">
                    <input type="submit" class ="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>

            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.querySelector(".add").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "flex";
        })
        document.querySelector(".close").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "none";

        })
    </script>
</body>
</html>
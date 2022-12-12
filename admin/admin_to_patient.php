<?php
    include '../utility/admin_template.php';

    if (isset($_GET["em"]) && isset($_GET["css_class"])) {
        $em = $_GET["em"];
        $css_class = $_GET["css_class"];
    }
    if (!isset($_REQUEST["search"])) {
        $sql = "SELECT * FROM patients";
        $patient = mysqli_query($conn, $sql);
    }
    else {
        $value = $_REQUEST["search_val"];
        $sql = "SELECT * FROM patients WHERE pat_name LIKE '%$value%'";
        $patient = mysqli_query($conn, $sql);
    }
    

?>



<head>
    <title>Patient-Admin || HMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/admin_to_patient.css">
</head>

                <div class="top-bar">
                    <div class="top-bar-text">Patients</div>
                    <div class="search_bar">
                        <form action="" method="post">
                            <input type="search" name="search_val">
                            <input class="button" type="submit" value="Search" name="search">
                        </form>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr id="header">
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($patient, MYSQLI_ASSOC)) { 
                            $id = $row["pat_id"];
                        ?>
                        <tr>
                        <td><?php echo $row["pat_id"] ?></td>
                        <td><?php echo $row["pat_name"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["pat_email"] ?></td>
                        <td class="action">
                        <!-- <a href=""><button class="button_update" name="update"><span class="material-symbols-outlined">edit</span></button></a> -->
                        <a href="./action/delete_patient.php?user_id=<?php echo $id ?>" ><button class="button_delete" name="delete"><span class="material-symbols-outlined">delete_forever</span></button></a>                       
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php
                    if (!empty($em)) { ?>
                            <div class="alert <?php echo $css_class ?> alert-dismissible fade show">
                                <?php echo $em ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php    }?>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
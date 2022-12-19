<?php
    include '../utility/admin_template.php';
    
    #Getting for Messages
    if (isset($_GET["em"]) && isset($_GET["css_class"])) {
        $em = $_GET["em"];
        $css_class = $_GET["css_class"];
    }

    #Search Functionality
    if (!isset($_REQUEST["search"])) {
        $sql = "SELECT * FROM accountants";
        $result = mysqli_query($conn, $sql);
    }
    else {
        $value = $_REQUEST["search_val"];
        $sql = "SELECT * FROM accountants WHERE acc_name LIKE '%$value%'";
        $result = mysqli_query($conn, $sql);
    }
    
    #Doctor Creation Functionality
    if (isset($_REQUEST["submit"])) {
        if (($_REQUEST["name"] == "") || ($_REQUEST["password1"] == "") || ($_REQUEST["password2"] == "")) {
            $em = "Fill out all the fields!";
            $css_class = "alert-danger";
        }
        else if ($_REQUEST["password1"] != $_REQUEST["password2"]) {
            $em = "Passwords do not match!";
            $css_class = "alert-danger";
        }
        else {
            #Setting doctor_id
            $sql = "SELECT acc_id FROM accountants ORDER BY acc_id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $id = (int)$row["acc_id"];
                    $id = $id + 1;
                }
                else {
                    $id = "55500";
                }
            
            #Getting Values from FORM
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $password1 = $_REQUEST["password1"];
            
            #Insert Query
            $sql = "INSERT INTO accountants VALUES ($id, '$name', '$email', '$password1')";
            $result = mysqli_query($conn, $sql);

            #Sending Messages
            if ($result) {
                $em = "$name is added.";
                $css_class = "alert-success";
                header("Location: ./admin_to_accountant.php");
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
</head>
<body>

            <div class="top-bar">
                <div class="top-bar-text">Accountants</div>
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


            <table action="" method="post">
                <thead>
                    <tr id="header">
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $id = $row["acc_id"];
                    ?>
                    <tr>
                    <td><?php echo $row["acc_id"] ?></td>
                    <td><?php echo $row["acc_name"] ?></td>
                    <td><?php echo $row["acc_email"] ?></td>
                    <td class="action">
                    <a href="./action/delete_accountant.php?user_id=<?php echo $id ?>" ><button class="button_delete" name="delete"><span class="material-symbols-outlined">delete_forever</span></button></a>                       
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
            

            <div class="popup">
                <div class="window">
                    <button class="close"><span class="material-symbols-outlined">disabled_by_default</span></button>
                    <form class="add_form" action="" method="post">
                    <input class="form-control" type="text" placeholder = "Name" aria-label="Name" name="name">
                    <input class="form-control" type="text" placeholder = "Email" aria-label="Email" name="email">
                    <input class="form-control" type="password" placeholder = "Password" aria-label="Password1" name="password1">
                    <input class="form-control" type="password" placeholder = "Re-enter Password" aria-label="Password2" name="password2">
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
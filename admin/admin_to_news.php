<?php
    include '../utility/admin_template.php';

    
    #Getting for Messages
    if (isset($_GET["em"]) && isset($_GET["css_class"])) {
        $em = $_GET["em"];
        $css_class = $_GET["css_class"];
    }

    #Search Functionality
    if (!isset($_REQUEST["search"])) {
        $sql = "SELECT * FROM news";
        $story = mysqli_query($conn, $sql);
    }
    else {
        $value = $_REQUEST["search_val"];
        $sql = "SELECT * FROM news WHERE new_name LIKE '%$value%'";
        $story = mysqli_query($conn, $sql);
    }
    
    #Story Creation Functionality
    if (isset($_REQUEST["submit"])) {
        if (($_REQUEST["name"] == "") || ($_REQUEST["details"] == "")) {
            $em = "Fill out all the fields!";
            $css_class = "alert-danger";
        }
        else {
            
            #Getting Values from FORM
            $name = $_REQUEST["name"];
            $details = $_REQUEST["details"];
            $date = date("Y-m-d");
            $admin_id = (int)$_SESSION['user_id'];

            $arr = explode('/', $_FILES['story_image']['type']);
            $ext = $arr[1];
            $img_name = $name . '.' . $ext;

            $temp_path = $_FILES["story_image"]["tmp_name"];
            $target = '../images/' . $img_name;
            if (move_uploaded_file($temp_path, $target)) {


                $sql = "INSERT INTO news VALUES ('$name', '$details', '$img_name', '$admin_id', '$date')";
                if (mysqli_query($conn, $sql)) {
                    $em = "Account is created successfully.";
                    $css_class = "alert-success";
                    header("Location: ./admin_to_news.php");
                }
                else {
                    $em = "Sorry! An error occured!";
                    $css_class = "alert-danger";
                }
                
                
            }
            else {
                $em = "Faild to upload the image!";
                $css_class = "alert-danger";
            }
        }
    }

?>


<head>
    <title>Story-Admin || HMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/admin/admin_to_patient.css">
    <link rel="stylesheet" href="../css/admin/admin_to_doctor.css">
</head>
<body>

            <div class="top-bar">
                <div class="top-bar-text">Story</div>
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
                    <th scope="col">NAME</th>
                    <th scope="col">DETAILS</th>
                    <th scope="col">DATE</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($story, MYSQLI_ASSOC)) {?>
                    <tr>
                    <td><?php echo $row["new_name"] ?></td>
                    <td><?php echo $row["details"] ?></td>
                    <td><?php echo $row["new_date"] ?></td>
                    <td class="">
                    <a href="./action/update_news.php?news_name=<?php echo $row["new_name"] ?>">
                    <button class="button_update" name="update"><span class="material-symbols-outlined">edit</span></button>
                    </a>
                    <a href="./action/delete_news_story.php?type=news&name=<?php echo $row["new_name"] ?>" ><button class="button_delete" name="delete"><span class="material-symbols-outlined">delete_forever</span></button></a>                       
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
                    <form class="add_form" action="" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="text" placeholder = "Name" aria-label="Name" name="name">
                    <textarea name="details" class="form-control" rows="10" placeholder="Details..."></textarea>
                    <input class="form-control" type="file" name="story_image">
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
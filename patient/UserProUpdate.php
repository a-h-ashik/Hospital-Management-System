<?php

session_start();
error_reporting(E_ALL);   //Showing errors


if (isset($_POST['update'])){

    include("../utility/db_connection.php");

    $UserUpdatedName = $_POST['updateUserName'];
    $UserUpdatedEmail = $_POST['updateUserEmail'];
    $UserUpdatedAddress = $_POST['updateUseraddress'];
    $UserUpdatedPassword = $_POST['UserPassword'];
    $UserUpdatedImage = $_FILES['updateImage'];
    $UserUpdatedAge = $_POST['updateUserAge'];



    if (!empty($UserUpdatedName) && !empty($UserUpdatedEmail) && !empty($UserUpdatedAddress) && !empty($UserUpdatedPassword) && !empty($UserUpdatedAge)){

        // var_dump($UserUpdatedImage); Using Vardump for checking values
        
        $imageName = $UserUpdatedImage['name'];
        $fileType = $UserUpdatedImage['type'];
        $fileSize = $UserUpdatedImage['size'];
        $FileTmpName = $UserUpdatedImage['tmp_name'];
        $FileError = $UserUpdatedImage['error'];

        //  checking Wheather user uploading img ore anything 

        $fileData = explode('/', $fileType);

        // print_r($fileData);
        $fileExtension = $fileData[count($fileData) - 1];
        $imageName = $UserUpdatedName .'.'. $fileExtension;

        if($fileExtension =="jpeg" || $fileExtension =="jpg" || $fileExtension =="png"){
            //img processing

            if($fileSize<1000000){
                // UPLOADING THE IMG FILE
                $FileNewName ="../images/patient/".$imageName;
                $uploaded = move_uploaded_file($FileTmpName,$FileNewName);
                
                if($uploaded){

                    $id = $_SESSION["user_id"];

                    $sql = "UPDATE patients SET pat_name='$UserUpdatedName', pat_email='$UserUpdatedEmail',  address ='$UserUpdatedAddress',  pass='$UserUpdatedPassword', pat_image='$imageName',age='$UserUpdatedAge' WHERE pat_id = '$id'";
                    $Results=mysqli_query($conn, $sql);

                    header('Location: ./ProfilePage.php?Successful=UserProfileUpdated');
                exit;

                }
            }else{
                header('Location: ./ProfilePage.php?Error=BigImgFile');
                exit;

            }
            exit;
        
        }else{
            header('Location: ./ProfilePage.php?Error=InvalidFile');
            exit;
        }


    }
    
    else{
        
        header('Location: ./ProfilePage.php?Error=EmptyUpdateFile');
        exit;

    }



}

?>



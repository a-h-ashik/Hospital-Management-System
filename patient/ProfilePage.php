<?php
    include './header.php';
    
?>

<!-- Code Here -->

<head>
    <title>Profile || HMS</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>

<br>
<div style="text-align:center">
<?php

if(isset($_GET['Successful'])){
    if($_GET['Successful'] == 'UserProfileUpdated'){

        ?>
         <small class="alert alert-success"> User Profile Updated Successfully</small>

         <?php

    }
}


if (isset($_GET['Error'])) {


    if ($_GET['Error'] == "EmptyUpdateFile") {
        ?>
         <small class="alert alert-danger"> Information is Required</small>

         <?php
    } else if ($_GET['Error'] == "InvalidFile") {

         ?>
          <small class="alert alert-danger">Upload Pictures Only </small>
         <?php


    }else if ($_GET['Error'] =="BigImgFile"){
        ?>
          <small class="alert alert-danger">Maximum image size is 8MB </small>
        <?php

    }
}
?>

</div>
<br>


<div class="border p-4 shadow bg-light col-md-8 offset-md-2">

  
<h3 align="center">Profile Update </h3>



<div class="row">
    <div class="col-md-4 offset-4">


         <form action="./UserProUpdate.php" method="POST" enctype="multipart/form-data">  
            
        
    <?php
         $id = $_SESSION["user_id"];
    
        $sql = "SELECT * from patients WHERE pat_id ='$id'";
        $Results=mysqli_query($conn, $sql);

        if($Results){
            if (mysqli_num_rows($Results)>0){
                while($row=mysqli_fetch_array($Results)){
                   

                    ?>
            <div class="form-group">
                Patient ID : <input type="digit" name="updateUserID" class="form-control" value=" <?php echo $row['pat_id'] ?>" disabled > 

            </div>

            <div class="form-group">
                Patient Name : <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['pat_name'] ?>"> 

            </div>
            <div class="form-group">
                Age : <input type="digit" name="updateUserAge" class="form-control" value=" <?php echo $row['age'] ?>" > 

            </div>
            
            <div class="form-group">
            E-mail: 
                <input type="email" name="updateUserEmail" class="form-control" value="<?php echo $row['pat_email'] ?>" disabled>

            </div>
           

            <div class="form-group">
                Address : <input type="text" name="updateUseraddress" class="form-control" value="<?php echo $row['address'] ?>"> 

            </div>
         
    
            <div class="form-group">
                Gender : <input type="text" name="gender" class="form-control" value="<?php echo $row['gender'] ?>" disabled> 

            </div>

            
            <div class="form-group">
                Password : <input type="password" name="UserPassword" class="form-control" value="<?php echo $row['pass'] ?>"> 

            </div>

           <br>
            <div class="form-group">
                <input type="file" name="updateImage" class="form-control">

            </div>  
            <br>

            <div align="center" class="form-group">
            
            <input type="submit" name="update" class="btn btn-info" style="background-color:#826AAC"value="update">

            </div> 

                    <?php
                }

            }

        }

    ?>

         </form>
        
    </div>
</div>

</div>


<br>

</body>

<?php 
include "../utility/footer.php"

?>

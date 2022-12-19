
<?php
    require "../utility/db_connection.php";
    $clicked = False;
    if (isset($_REQUEST['find'])) {
        $clicked = TRUE;
        $pat_id = $_REQUEST['id'];

        $sql = "SELECT * FROM accounts A, patients P WHERE A.pat_id=P.pat_id AND A.pat_id='$pat_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        

    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">

    

    <meta name="viewport" content="width=device-width, initial-scale=1">



<style>
    .row {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        background-color: white;
        color: #00a558;
    }

    .card > .tittle {
        font-size: x-large;
        font-weight: bold;
        text-align: center;
        margin: 1rem 0;
    }

    .card > form > .radio {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 0.5rem;
    }
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    div {
    border-radius: 5px;
    background-color: 
    padding: 20px;
    }
    .info {
        height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    } 



/* Patients Data Table  */
    table {
         border-collapse: collapse;
         width: 100%;
        }

    th, td {
         text-align: center;
         padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}


</style>

</head>


<body>
    
    <div class="container text-center">
        <div class="row">
            <div class="card col-8">
                <form action="" mehtod="post">
                    <label for="fname">Patient Id</label>
                    <input type="text" id="fname" name="id" placeholder="Enter Patient Id">
                    <input type="submit" value="Submit" name="find">
                </form>
            </div>
            <?php if ($clicked) { ?>

          
            <div style="overflow-x: :auto;" >
                 <table>
                    <tr> 
                        <th>Patient's Name</th>
                        <th>Age</th>
                        <th>Due Amount</th>
                    </tr>

                    <tr>
                        <td><?php echo $row['pat_name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['bill'] ?></td>
    
                    </tr>
                </table>
            </div>

                 
            <?php } ?>
        </div>  
         
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awsome Kit -->
    <script src="https://kit.fontawesome.com/a481ba0e3b.js" crossorigin="anonymous"></script>


<?php
    include "../utility/footer.php";
?>
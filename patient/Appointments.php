<?php
    include './header.php';
    include '../utility/date_time.php';
    include '../utility/patient_session.php';

    $error_message = '';
    $error = FALSE;
    if (isset($_GET['doc_id'])) {
        $doc_id = $_GET['doc_id'];
    }
    $sql = "SELECT * FROM doctors D, schedules S WHERE D.doc_id=S.doc_id AND D.doc_id='$doc_id' ORDER BY S.sl";
    $result2 = mysqli_query($conn, $sql);
    $result3 = mysqli_query($conn, $sql);

    $pat_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM patients WHERE pat_id ='$pat_id'";
    $result4 = mysqli_query($conn, $sql);

    if (isset($_REQUEST['submit'])) {
        
        $input_date = $_REQUEST['date'];
        $input_shift = $_REQUEST['shift'];
        $input_date_conv = date('Y-m-d', strtotime($input_date));
        $input_day = date('D', strtotime($input_date));
        if ($input_date < $current_date) {
            $error_message = 'Date is not Valid';
            $error = TRUE;
        }
        else {

            $sql = "SELECT * FROM schedules AS S WHERE S.doc_id='$doc_id' AND S.sch_day='$input_day'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
        

            if ($input_shift == 'M') {
                $shift = 'shift_m';
            }
            else {
                $shift = 'shift_e';
            }
            

            if (mysqli_num_rows($result) == 0) {
                $error_message = 'Shift is not available';
                $error = TRUE;
            }
            else if ($row[$shift]) {
                $sql="SELECT * FROM appointments WHERE doc_id='$doc_id' AND pat_id='$pat_id' AND date='$input_date_conv'";
                $res = mysqli_query($conn, $sql);

                // Query for shift
                if (mysqli_num_rows($res)==0) {
                $sql="INSERT INTO appointments VALUES('$doc_id','$pat_id','$input_shift','$input_date_conv', FALSE )";
                $rslt = mysqli_query($conn, $sql); 
                $error_message = 'Successful';
                $error = TRUE;
                }
                else {
                    $error_message = 'Appointment alredy exist';
                    $error = TRUE;
                }
            }
            else {
                $error_message = 'Shift is not available';
                $error = TRUE;
            }
        }
    } 


?>

<div>
    <br>
<?php if ($error) { ?>
    <br>
    <div class="alert alert-dark col-4 offset-1 text-center" role="alert">
    <?php echo $error_message ?>
</div>
<?php } ?>
</div>


<head>
    <style>
        .container {
            min-width: 97.5vw;
        }
        .row {
            margin: 0 2rem;
        }

        .table-name {
            text-align: center;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }


        table {
            width: 100%;
            text-align: center;
        }

        tr th {
            border-bottom: 1px solid black;
        }

        .alert {
            margin-left: 8.4rem;
        }
    </style>
</head>



<div class="container mt-5">
    <div class="row">
        <div class="col-4 offset-1 border p-4 shadow bg-light">
            <div class="col-12">
                <h3 class="fw-normal text-center text-secondary fs-4 text-uppercase mb-4">Appointment form</h3>
            </div>
                <form action=""  method="POST" enctype="multipart/form-data">
                <!-- Write Query for Doctor Info -->

                <?php $row = mysqli_fetch_array($result3, MYSQLI_ASSOC) ?>

                <div class="row g-3">
                    <div class="col-12 ">
                        <div>Doctor's Name:
                              <input type="text" class="form-control" value="<?php echo $row['doc_name'] ?>" disabled >
                    
                        </div>
                    </div>
                    
                    <?php $row1 = mysqli_fetch_array($result4, MYSQLI_ASSOC); ?>
                    
                    <div class="col-12">
                        Patient's Name: 
                        <input type="text" class="form-control" disabled value='<?php echo $row1['pat_name'] ?>'>  
                    </div>
                    

                    <div class="col-12">
                        Date of Appointment:
                        <input type="date" name='date' class="form-control" placeholder="Enter Date">
                    </div>



                    <div class="col-12">
                    Time of Appointment:
                        <select class="form-select" name='shift'>
                            <option value="M">Morning</option>
                            <option value="E">Evening</option>
                            
                        </select>
                    </div>


                    <div class="col-12">
                         Payment:
                         <input type="text" class="form-control" value="<?php echo $row['visit'] ?>" disabled>
                    </div>

                    <div class="col-12 mt-5">                        
                        <button type="submit" name="submit" class="btn btn-primary float-end">Book Appointment</button>
                    </div>
                </div>
            </form>
        </div>
   

        <div class="col-4 offset-2">
                <div class="table-name">SCHEDULE</div>

                    <table>
                        <tr>
                            <th>DAY</th>
                            <th>MORNING</th>
                            <th>EVENING</th>
                          
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

        </div>
       

       
    </div>
</div>
<hr>


<?php 
include "../utility/footer.php"

?>
 

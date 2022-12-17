<?php
    include "./doctor_template.php";
    include "../utility/date_time.php";
    $sql = "SELECT * FROM appointments A, patients P WHERE A.pat_id=P.pat_id AND date='$current_date'";
    $result1 = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);
?>

<head>
    <link rel="stylesheet" href="../css/doctor/appointment.css">
</head>

    <div class="outer-container">
        <div class="page-header">APPOINMENTS</div>
        <div class="inner-container">
            <div class="left box">
            <div class="table-name">Morning Sift</div>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Completed</th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            if ($row['shift'] == "M") {
                    ?>
                    <tr>
                        <td><a href="#"><?php echo $row['pat_name'] ?></a></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td>A</td>
                    </tr> 
                    <?php }} ?>
                </table>    

            </div>
            <div class="right box">
            <div class="table-name">Evening Sift</div>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date</th>
                        <th>Completed</th>
                    </tr>
                    
                    <?php
                        while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                            if ($row['shift'] == "E") {
                    ?>
                    <tr>
                        <td><a href="#"><?php echo $row['pat_name'] ?></a></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td>A</td>
                    </tr> 
                    <?php }} ?>
                </table>
            </div>
        </div>
        
    </div>



</body>
</html>
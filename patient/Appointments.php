<?php
    include './header.php';    
?>




<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
            <div class="col-12">
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Appointment form</h3>
            </div>
            <form action="">
                <div class="row g-3">
                    <div class="col-12 ">
                        <div>Doctor's Name:
                              <input type="text" class="form-control" disabled >
                    
                        </div>
                    </div>
                    
                    
                    <div class="col-12">
                        Patient's Name: 
                        <input type="text" class="form-control" disabled>  
                    </div>
                    

                    <div class="col-12">
                        Date of Appointment:
                        <input type="date" class="form-control" placeholder="Enter Date">
                    </div>



                    <div class="col-12">
                    Time of Appointment:
                        <select class="form-select">
                            <option value="1">Morning</option>
                            <option value="2">Evening</option>
                            
                        </select>
                    </div>
                    <div class="col-12">
                        Purpose of the Appointment
                        <textarea class="form-control" placeholder="Message"></textarea>
                    </div>

                    <div class="col-12">
                         Payment:
                         <input type="text" class="form-control" disabled>
                    </div>

                    <div class="col-12 mt-5">                        
                        <button type="submit" class="btn btn-primary float-end">Book Appointment</button>
                        <button type="button" class="btn btn-outline-secondary float-end me-2">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
























<?php 
include "../utility/footer.php"

?>
 

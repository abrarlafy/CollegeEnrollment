<?php
$conn = mysqli_connect("localhost", "root", "", "ref_DB");

include'header.php';


    
        echo '
        <div class="row container my-5">

            
            
            <div class="col-6 p-5 text-center">
            <h4 style="font-size: 32px;color: #261f4c ;font-weight:bold; font-style:italic;"> College Enrollment</h4>
                    <p style="font-size: 18px;color: #261f4c ;font-weight:bold; font-style:italic;"> Enter Your Hight School Percentage ,Your Ability and your Achievement Percentages
                     To Check Whish colleges  Allow you to apply in .
                    
                    </p >

           </div>
       
          
       
            ';

        echo '
       
        <div class="col-6 container row p-5" >
            
                   
                   
                    <div class="content-wthree  rounded-lg shadow p-5" >
                        
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " style="width: 230px;" id="basic-addon1">Hight School Percentage </span>
                                </div>
                                
                                <input type="number"  name="school" class="form-control"   placeholder="Enter Hight School Percentage "  required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " style="width: 230px;" id="basic-addon1">Ability Test Ratio </span>
                                </div>
                                
                                <input type="number"  name="ability" class="form-control"   placeholder="Enter Ability Test Ratio"  required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " style="width: 230px;" id="basic-addon1">Achievement Test Percentage </span>
                                </div>
                                
                                <input type="number"  name="achievement" class="form-control"  placeholder="Enter Achievement Test Percentage"  required>
                            </div>
                           
                            
                            
                            <button name="submit" class="btn btn-secondary" type="submit">Calculate</button>
                        </form>
                       
                    </div>
                    <div class="col-4">
                    </div>
            
            
        </div>
        
            ';
            echo '
        </div>
        ';


        if (isset($_POST['submit'])) {
            $school = mysqli_real_escape_string($conn, $_POST['school']);
            $ability = mysqli_real_escape_string($conn, $_POST['ability']);
            $achievement = mysqli_real_escape_string($conn, $_POST['achievement']);
            
           
                $avg=($school+$ability+$achievement)/3;
           
                header("Location:colleges-by-avg.php?avg=$avg");
            
        }
   


    include'footer.php' ;
?>
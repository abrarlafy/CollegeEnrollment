<?php
$conn = mysqli_connect("localhost", "root", "", "ref_DB");

$title = 'Users';
include'header.php';


?>
   

<?php


if(isset($_GET['msg']) ) {
	$msg = $_GET['msg'];
	echo "<div class='container mt-3'>
	<div class='alert alert-danger'>$msg</div>
	</div>";
   
 }
 if(isset($_GET['msgg'])) {
	$msgg = $_GET['msgg'];
	echo "<div class='container mt-3'>
	<div class='alert alert-success'>$msgg</div>
	</div>";
 }

if($_SESSION['is_admin'] and $_SESSION['is_admin'] ==1){

    


echo '<br>';
$users = mysqli_query($conn, " SELECT * FROM users ");
if(mysqli_num_rows($users)){
    echo '
 <div class="col-10 container p-2">

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#NO</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone </th>
          
            
            ';
            
            echo'
            
        </tr>
        </thead>
        <tbody>';
    
        $index=0;

    while($user = mysqli_fetch_assoc($users)):
        echo '
        <tr>
        <th scope="row">'.$index++.'</th>
        <td>'.$user['firstName'].'</td>
        <td>'.$user['lastName'].'</td>
        <td>'.$user['email'].'</td>
        <td>'.$user['phone'].'</td>
    
        </tr>';    
   
     endwhile;


	echo '</tbody>
    </table>
    </div>
    
    ';
    

}else{
echo '<div class="alert alert-danger text-center"> No Data</div>';
}



}
else{
 return	header("Location:index.php?msg= You are Not admin");
}

echo '<br><br>';

include'footer.php';?>
<?php
$title = 'Home';

include'./header.php';
?>
<div class="container  ">

	
<?php

if(isset($_GET['msg'])) {
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
 ?>
		<div class="container  mt-5 mb-24 d-flex justify-content-center">
		
			
			
			<div class="btn-group-vertical w-25 rounded-lg">
				  <a type="button" href="avg-calculator.php" class="btn btn-secondary mt-1 ">Weighted Average Calculations</a>
				  <a type="button" href="about.php" class="btn btn-secondary mt-1 ">About Us</a>
				 
			</div>
		</div>
	
</div>

<?php
include'./footer.php';?>
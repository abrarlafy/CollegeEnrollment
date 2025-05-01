<?php
session_start();
ob_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> REF-WEBSITE <?=$title?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>
<body id="body" >

<nav class="navbar navbar-expand-lg navbar-light bg-light  ">
  <div class="container">
    <img src="images/logo.png" class="" style="height:70px !important"  >
    <a class="navbar-brand" href="#"> College Enrollment</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <ul class="navbar-nav mb-2 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <?php 
         
         if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] ===true):?>
          
             
         <li class="nav-item dropdown mx-48" >
           <a class="nav-link dropdown-toggle"   href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
             <?php
                echo $_SESSION['user_name']?> <i class="tf-ion-chevron-down"></i>
           </a>
           <ul class="dropdown-menu"  >
               
               <li>
                     <a  class="nav-link" href="logout.php">Logout</a>
               </li>
               <!-- </li> -->
             </ul>
         </li>
         <?php else: ?>
         <li class="nav-item ">
           <a class="nav-link" href="login.php">Login</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="register.php">Register</a>
           <?php endif; ?>
         </li>
       
      </ul>
      
    </div>
  </div>
</nav>
<section class="single-page-header">
	
			<div class="col-md-12">
        <div class=" mt-3 d-flex justify-content-center">
          
          <h1 style="color: #261f4c; font-style:italic;" class="display-1 ">  College Enrollment</h1>
          
        </div>
        
    </div>
</section>

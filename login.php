<?php
$conn = mysqli_connect("localhost", "root", "", "ref_DB");

$title = 'Login';
 include 'header.php';
  
    
   
    $msg = "";

   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $login = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}' and password='{$password}' limit 1");

  
    if(mysqli_num_rows($login) >0){

        $user = mysqli_fetch_assoc($login);
        
        $_SESSION['loggedIn'] =true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['user_name'] = $user['firstName'];
        $_SESSION['user_email'] = $email;
       
        header('Location:index.php');
    }else{
        echo '<div class="alert alert-danger container">Username or password is an error</div>';
  
    }
  
  }
        
?>

<body>

<section class="single-page-header">
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-11">
				<h2>Login</h2>
				
			</div>
		</div>
	</div>
</section>

    <!-- form section start -->
    <section class="w3l-mockup-form mt-5">
        <div class="container text-center">
            <!-- /form -->
            <div class="row mt-5">
                  
                  <div class="col-7">
                  <div class="mt-5">
                            All the services a university
                            student needs to enroll in auniversity .
                            Take Courses and more
                            <!-- <img src="images/Coffee.jpg" height="500" width="600" alt=""> -->
                        </div>
                  </div>
                  <div class="col-4 mt-5 p-5 rounded shadow-lg">
                        <h2 class="mb-3">Login Now</h2>
                        <?php echo $msg; ?>
                        <form method="post">
                               <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text " style="width: 110px;" id="basic-addon1">Email @ </span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your email Number" required value="<?php if (isset($_POST['submit'])) { echo $email; } ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text " style="width: 110px;" id="basic-addon1">Password </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Your password Number" required>
                                </div>
                           
                                    <button name="submit" name="submit" class="btn btn-secondary my-3" type="submit">Login</button> 
                                    
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a class="btn btn-outline-info" href="register.php">Register</a></p>
                        </div>
                    </div>
            </div>
           
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

<?php 

include 'footer.php';?>
<?php
$conn = mysqli_connect("localhost", "root", "", "ref_DB");


$title = 'Register';
include 'header.php';


if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location:index.php");

    die();
}


$msg = "";

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));


    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (firstName,lastName, email,phone, password, gender, birth_date,photo) VALUES ('{$fname}','{$lname}', '{$email}', '{$phone}', '{$password}','{$gender}', '{$birth_date}','images/default.png')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $msg = "<div class='alert alert-info'>You have register successfully</div>";

                $login = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and `password`='$password' limit 1");
                if (mysqli_num_rows($login) == 1) {

                    $user = mysqli_fetch_assoc($login);
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['is_admin'] = $user['is_admin'];
                    $_SESSION['user_name'] = $user['firstName'];
                    $_SESSION['user_email'] = $email;
                }
            } else {
                $msg = "<div class='alert alert-danger  container'>Something wrong went.</div>";
            }

            header("Location:index.php? msgg=$msg");
        } else {
            $msg = "<div class='alert alert-danger container'>Password and Confirm Password do not match</div>";
        }
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
                    <h2>Register</h2>

                </div>
            </div>
        </div>
    </section>



    <div class="container text-center">
        <!-- /form -->

        <div class="row">

            <div class="col-7">
                <div class="mt-5">
                    All the services a university
                    student needs to enroll in auniversity .
                    Take Courses and more
                    <!-- <img src="images/Coffee.jpg" height="500" width="600" alt=""> -->
                </div>
            </div>
            <div class="col-4 mt-5 p-5 rounded shadow-lg">
                <h2>Register</h2>
                <?php echo $msg; ?>
                <div class="mt-24">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 110px;" id="basic-addon1">first Name</span>
                            </div>
                            <input type="text" name="fname" class="form-control" placeholder="Enter Your first Name" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                            echo $fname;
                                                                                                                                        } ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 110px;" id="basic-addon1">Last Name</span>
                            </div>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                        echo $lname;
                                                                                                                                    } ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " style="width: 110px;" id="basic-addon1">Phone Num</span>
                            </div>
                            <input type="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                            echo $phone;
                                                                                                                                        } ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " style="width: 110px;" id="basic-addon1">Email @ </span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your email Number" required value="<?php if (isset($_POST['submit'])) {
                                                                                                                                            echo $email;
                                                                                                                                        } ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " style="width: 110px;" id="basic-addon1">Password </span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your password Number" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " style="width: 110px;" id="basic-addon1">C_Password </span>
                            </div>
                            <input type="password" name="confirm-password" class="form-control" placeholder="Enter Your confirm-password Number" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width: 110px;">Gender</span>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width: 110px;">Birth Date</span>
                            <input type="date" name="birth_date" class="form-control" required>
                        </div>
                        <button name="submit" class="btn btn-secondary " type="submit">Register</button> <br><br>
                    </form>
                </div>
                <div class="social-icons">
                    <p>Have an account! <a class="btn btn-outline-info" href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '<br>';
    include 'footer.php'; ?>
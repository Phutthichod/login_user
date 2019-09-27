<?php 
    session_start();

    require_once "db.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];


        $user_check = "SELECT * FROM member WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $user_check);
        $user = mysqli_fetch_assoc($result);

        //check username ว่ามีการใช้หรือยัง
        if ($user['username'] === $username) { //มีusername ในฐานข้อมูลอยู่แล้ว
            echo "<script>alert('Username มีการใช้งานแล้ว');</script>";
        } else { //เก็บข้อมูลลงตารางฐานข้อมูล
            $passwordenc = md5($password);

            $query = "INSERT INTO member (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($con, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: login.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: login.php");
            }

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" <!-- End layout styles -->

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
     
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy.</h6>
                <form class="pt-3" name="registration" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                  <div class="form-group">
                    <input type="text" name = "username" class="form-control form-control-lg" placeholder="Username" required>
                  </div> 
                  
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                    <input type="text" name = "firstname" class="form-control form-control-lg" placeholder="Firstname" required>
                  </div>

                  <div class="form-group">
                    <input type="text"  name = "lastname"  class="form-control form-control-lg" placeholder="Lastname" required>
                  </div>

                  <div class="form-group">
                    <input type="email"  name = "email"  class="form-control form-control-lg" placeholder="Email" required>
                  </div>
                 
                  <!-- <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div> -->

                  <div class="mt-3">
                    <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name = "submit" value="submit" >
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>


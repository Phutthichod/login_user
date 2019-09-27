<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $query);

        
        if (mysqli_num_rows($result) ) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['user_level'] = $row['user_level'];
            $_SESSION['username'] = $row['username'];


            if ($_SESSION['user_level'] == 'a') {
                
                header("Location: admin_page.php");
            }

            if ($_SESSION['user_level'] == 'm') {
                
                header("Location: ../user_plant/user_plant_manage.php");
	
            }

        } else if (mysqli_num_rows($result) != 1){

            echo "<script type=\"text/javascript\">";
            echo "alert(\"User หรือ Password ไม่ถูกต้อง\");";
            echo "window.history.back();";
            echo "</script>";
            exit();

            // echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=login.php;</script>";

            // echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
        }

    } else {
        header("Location: login.php");
    }


?>
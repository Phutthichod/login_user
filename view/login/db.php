<?php

    $con = mysqli_connect("localhost","root","","admin_user");

    if(mysqli_connect_error()){
            echo "Failed to connect to Mysql:" . mysqli_connect_error();

    }

?>
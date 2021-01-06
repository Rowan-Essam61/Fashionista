<?php

session_start();
    $servername = "localhost";
    $username = "root";
    $password1  = "";
    $dbname = "online_shopping";
    $conn= mysqli_connect($servername,$username,$password1,$dbname);    
    $sql="DELETE FROM cart ";
    $result = mysqli_query($conn, $sql);  
session_unset();
session_destroy();
header("location:../index.php");
exit();
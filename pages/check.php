<?php

session_start();
if ( $_SERVER['REQUEST_METHOD'] == "POST"){
            $user=$_POST['user'];
            $password=$_POST['password'];
            $servername = "localhost";
            $username = "root";
            $password1 = "";
            $dbname = "online_shopping";
    
        try{
            $conn= mysqli_connect($servername,$username,$password1,$dbname);
            $sql="SELECT * FROM customer where User_name='$user' AND 
            password='$password' AND type='admin'";
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                $_SESSION["user"] = $user;
                header("location:control.php");  
                exit();
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }     
            
       }
       catch(PDOException $e){
            echo "connection Failed" .$e->getMessage();
        }
    
    
}
else{
    header("location:logadmin.php");
    exit();
}

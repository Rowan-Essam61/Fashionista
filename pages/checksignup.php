<?php
session_start();
if ( $_SERVER['REQUEST_METHOD'] == "POST"){
            $user=$_POST['user'];
            $fname=$_POST['first'];
            $lname=$_POST['last'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $gender=$_POST['gender'];
            $country=$_POST['country'];

            $servername = "localhost";
            $username = "root";
            $password1 = "";
            $dbname = "online_shopping";

        try{
            
            $conn= mysqli_connect($servername,$username,$password1,$dbname);
            $sql="SELECT * FROM customer where User_name='$user' OR phone_no='$phone' OR
            Email='$email'";
            $result = mysqli_query($conn, $sql); 
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result); 
            if($count>1){  
                echo "<h1> user exists. log in or change username</h1>"; 
            }  
            
            else{  
                $sql1="INSERT INTO customer (User_name,first_name,second_name,Email,password,
                    phone_no,gender,country)
                    VALUES ('$user','$fname','$lname','$email','$password','$phone','$gender','$country')";
                mysqli_query($conn, $sql1);
                   $_SESSION["user"] = $user;
                   header("location:../index.php"); 
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
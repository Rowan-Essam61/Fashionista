<?php
if ( $_SERVER['REQUEST_METHOD'] == "POST"){
            $email=$_POST['email'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $phone=$_POST['phone'];

            $servername = "localhost";
            $username = "root";
            $password1 = "";
            $dbname = "online_shopping";

        try{
            
            $conn= mysqli_connect($servername,$username,$password1,$dbname);
            $sql1="UPDATE customer
            SET first_name = '$fname', second_name= '$lname' , phone_no='$phone'
            WHERE Email='$email;";
            mysqli_query($conn, $sql1); 
            
       }
       catch(PDOException $e){
            echo "connection Failed" .$e->getMessage();
        }
    
    
}
else{
    header("location:logadmin.php");
    exit();
}
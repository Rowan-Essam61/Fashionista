<?php
	session_start();
  // require 'config.php';
 
    $servername = "localhost";
    $username = "root";
    $password1 = "";
    $dbname = "online_shopping";
  // Add products into the cart table
  if ( isset($_SESSION["user"])){
	if (isset($_POST['hidden_id'])) {
      $pid = $_POST['hidden_id'];
      $puserid = $_POST['hidden_user_id'];
      $pdesc = $_POST['hidden_description'];
	  $pprice = $_POST['hidden_price'];
	  $pimage = $_POST['hidden_image'];
      $psize = $_POST['hidden_size']; 
      $pqty = $_POST['quantity'];
    $total_price = $pprice * $pqty;

      $conn= mysqli_connect($servername,$username,$password1,$dbname);    
      $sql="SELECT * FROM cart WHERE $pid=product_id";
      $result = mysqli_query($conn, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);
      if($count>0){
        echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
      }
      else{
        
        $conn1= mysqli_connect($servername,$username,$password1,$dbname);
         
        $sql1="INSERT INTO cart (product_id,User_id,product_image,product_desc,product_size,Quantity,price,total_price) VALUES
        ($pid,$puserid,'$pimage','$pdesc','$psize',$pqty,$pprice,$total_price)";
        $result1 = mysqli_query($conn1, $sql1);
        echo '<div class="alert alert-success alert-dismissible mt-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item added to your cart!</strong>
      </div>';
      header("location:cart.php");  
      exit();
      }
    }
    else{
      header("location:loguser.php");  
      exit();
    }
	  
	}

	
	


?>
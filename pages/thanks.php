<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password1  = "";
  $dbname = "online_shopping";
  if ( isset($_SESSION["user"])){
      $user=$_SESSION["user"];
    echo '<style>.profile{visibility: visible !important;
    margin-right:}</style>';
    echo '<style>.item2{visibility: Hidden !important;}</style>';
        $conn1= mysqli_connect($servername,$username,$password1,$dbname);    
        $sql1="SELECT id FROM customer WHERE User_name='$user'";
        $result1 = mysqli_query($conn1, $sql1);  
        $i=0;
        $row = mysqli_fetch_array($result1);
        $user_id=$row['id'];
  }
  $conn= mysqli_connect($servername,$username,$password1,$dbname);    
  $sql2="SELECT * FROM cart ";
  $result2 = mysqli_query($conn, $sql2); 
  while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
      $productid= $row2['product_id'];
      $userid=$user_id;
      $productqty=$row2['Quantity'];
      $producttotalp=$row2['total_price'];
      $now = date('Y-m-d');
      $start_date = strtotime($now);
      $end_date = strtotime("+7 day", $start_date);
      $olddate=date('Y-m-d', $start_date);
      $newdate=date('Y-m-d', $end_date);
      $sql3="INSERT INTO orders(product_id,customer_id,quantity,total_price,order_date,delievery_date) VALUES
      ($productid,$userid,$productqty,$producttotalp,'$olddate','$newdate')";
      $result3 = mysqli_query($conn, $sql3);

      $sql4="SELECT quantity FROM product WHERE id=$productid";
      $result4 = mysqli_query($conn, $sql4);
      $row4 = mysqli_fetch_array($result4);
      $quantity=$row4['quantity'];

      $sql33="UPDATE product SET quantity=($quantity-$productqty) WHERE id=$productid";
      $result33= mysqli_query($conn, $sql33);

      $sql5="DELETE FROM cart WHERE product_id=$productid";
      $result5 = mysqli_query($conn, $sql5);
  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionista</title>
    <style>
        h1{
            text-align: center;
            margin-top: 150px;
            text-align: center;background:
            -webkit-linear-gradient(#0b65a1, #dc3545);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-top: 150px;
            font-size: 40px;

            margin-bottom: 100px;
        }
        .button{
            margin-left: 42%;
            text-align: center;
            height: 50px;
            color: #fff;
            background-color: #0b65a1;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            width: 300px;
            text-decoration: none;
            border: 2px solid #0b65a1;
            padding: 20px;
        }
        .button:hover{
            background-color: #dc3545;

        }
        .button:focus{
            outline: 0;
        }
    </style>
</head>
<body style="background-color: #90b9d4;">
    <h1>Thanks For Ordering</h1>
    <a class="button" href="../index.php" >Continue Shopping</a>
</body>
</html>
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
  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionista</title>
    <link rel="stylesheet" href="../CSS/orderconfirm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
        <div class="header">
            <nav class="navbar " id="navb">
                <a class="navbar-brand" href="#"><img src="../images/logo1.png" alt="../index.php"></a>
                <div class="search form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn btn-danger my-2 my-sm-0" type="submit">Search</button>
                </div>
                <div class="links">
                    <ul>
                        <li class="nav-item item1 top">
                        <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item active item1 shop ">
                        <a href="cart.php">
                            <?php
                             $servername = "localhost";
                             $username = "root";
                             $password1 = "";
                             $dbname = "online_shopping";
                             try{
                                 $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                                 $sql="SELECT * FROM cart ";
                                 $result = mysqli_query($conn, $sql);  
                                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                 $count = mysqli_num_rows($result); 
                            }
                            catch(PDOException $e){
                                 echo "connection Failed" .$e->getMessage();
                             }
                           
                            echo "<span>$count</span> "?> 
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                        <li class="nav-item active item2 top">
                            <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="loguser.php">Login</a></button> 
                        </li>
                        <li class="nav-item active item2 top">
                            <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="signup.php">Sign up</a></button> 
                        </li>
                        <li class="nav-item active item3 profile" style="visibility:hidden">
                            <a href="profile.php">
                                <i class="fas fa-user-circle fa-2x"></i>
                            <br> <span>Welcome
                            <span id="prof">
                           <?php
                                if(isset($_SESSION["user"])){
                                echo $_SESSION['user'] ;
                                }
                                ?> 
                            </span>
                            </span>
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    
    <div class="main" style="display: flex;">
        <div class="customer_info">
            <?php 
             $servername = "localhost";
             $username = "root";
             $password1  = "";
             $dbname = "online_shopping";
             try{
                $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                $sql="SELECT * FROM customer WHERE User_name='$user' ";
                $result = mysqli_query($conn, $sql);  
                while ($row = mysqli_fetch_array($result)) {
                    $fname=  $row['first_name'];
                    $lname=$row['second_name'];
                    $phone=$row['phone_no'];
                    ?>
           
            <h2>Check Out</h2>

            <button class="accordion1 one">1. Address Details</button>
            <form class="panel" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h5>First Name *</h5>
            <input type="text" name="fname" id="" value="<?php echo($fname);?>">
            <h5>Last Name *</h5>
            <input type="text" name="lname" id="" value="<?php echo($lname);?>">
            <h5>Mobile Phone*</h5>
            <input type="tel" name="phoneno" id="" value="<?php echo($phone);?>">
            <h5>St.name/Building number/Apartment number</h5>
            <textarea name="address" id="" cols="25" rows="4"></textarea>
            <h5>State</h5>
            <select name="states" id="" required>
                <option value="Please Select" class="select">Please Select</option>
                <option value="Alexandia" class="select">Alexandia</option>
                <option value="AlGarbia" class="select">AlGarbia</option>
                <option value="Cairo" class="select">Cairo</option>
                <option value="Damiatte" class="select">Damiatte</option>
                <option value="Giza" class="select">Giza</option>
            </select><br>
            <input type="submit" value="Save & Continue" name="submit" class="submit" required >
                
            </form>
            
            <?php 
                    }} 
                    catch(PDOException $e){
                        
                    }
                   
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $fname=$_POST['fname'];
                        $lname=$_POST['lname'];
                        $phoneno=$_POST['phoneno'];
                        $address=$_POST['address'];
                        $selected = $_POST['states'];
                        $servername = "localhost";
                        $username = "root";
                        $password1  = "";
                        $dbname = "online_shopping";
                        $conn1= mysqli_connect($servername,$username,$password1,$dbname);    
                        $sql2="UPDATE customer SET first_name='$fname', second_name='$lname',
                        phone_no='$phoneno', address1='$address', address2='$selected' WHERE id=$user_id";
                        $result2= mysqli_query($conn, $sql2);
                    }
            ?>
            <button class="accordion1 one">2. Delivery method</button>
            <div class="panel">
                <h3>Door Delivery</h3>
                <h5>Shipping Details:</h5>
                <?php 
                $servername = "localhost";
                $username = "root";
                $password1  = "";
                $dbname = "online_shopping";
                try{
                    $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                    $sql="SELECT * FROM cart ";
                    $result = mysqli_query($conn, $sql);  
                    $total=0;
                    while($row = mysqli_fetch_array($result)){
                    $ptotal=$row['total_price'];
                    $total +=$ptotal;
                    $date=date("M D,Y") ;
                    $date = strtotime($date);
                    $date = strtotime("+7 day", $date);}
                        ?>
                <p>Total Cost = $ <?php echo $total?></p>
                <p>Shipping Fees = $ <?php echo $total*(14/100)?></p>
                <p>Delivered in <?php echo date('M d, Y', $date)?>.</p>
                <h4>Total price= $<?php echo $total+$total*(14/100)?></h4>
            </div>
            <?php 
                
            }catch(PDOException $e){
                    echo "connection Failed" .$e->getMessage();
                }
                ?>
            <button class="accordion1 one">3. Payment Method</button>
            <div class="panel three">
            <h3>Delivery Method:</h3>
            <input type="radio" name="" value="" id="">Cash On Delivery
            </div>
        </div>
        <div class="products" style="margin: auto; text-align: center;width: 30%;margin-top: 150px;">
            <?php 
                $servername = "localhost";
                $username = "root";
                $password1  = "";
                $i=0;
                $dbname = "online_shopping";
                try{
                    $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                    $sql="SELECT * FROM cart ";
                    $result = mysqli_query($conn, $sql); 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result); 
                    echo"<h3>Your Orders ($count)</h3><hr>";

                    $sql1="SELECT * FROM cart "; 
                    $result1 = mysqli_query($conn, $sql1); 
                    while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                    $pimage=  $row1['product_image'];
                    $psize=$row1['product_size'];
                    $pqty=$row1['Quantity'];
                    $pprice=$row1['price'];
                    $ptotal=$row1['total_price'];
                        ?>
            
                <h5>Item <?php echo ++$i?> :</h5>
                
                <img src="<?php echo $pimage?>" style="width: 30%;text-align: center;">
                <h6 >Price = <?php echo $pprice?></h6>
                <h6>QTY= <?php echo $pqty?></h6>
                <h6>Total Price=$ <?php echo $ptotal?></h6><hr>
                <?php 
                }
            }catch(PDOException $e){
                    echo "connection Failed" .$e->getMessage();
                }
                ?>
          
                
        <hr>
            
        </div>
    </div>
    <form action="thanks.php" method="POST">
        <input type="submit" class="ordernow" style=" margin-top: 50px;" value="Confirm Order">
    </form>
    
    <script>
        var acc = document.getElementsByClassName("accordion1");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
        }
    </script>
</body>
</html>
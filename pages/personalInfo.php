<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password1  = "";
  $dbname = "online_shopping";
  if ( isset($_SESSION["user"])){
     $user= $_SESSION['user'];
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
    <link rel="stylesheet" href="../CSS/personalInfo.css">
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
                    
                    <li class="nav-item dropdown item1 top">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dresses.php">Dresses</a>
                        <a class="dropdown-item" href="skirts.php">Skirts</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="pantalons.php">Pantalons</a>
                        <a class="dropdown-item" href="blouses.php">Blooses</a>
                        <a class="dropdown-item" href="t-shirts.php">Tshirts</a>
                      </div>
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
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="login.php">Login</a></button> 
                    </li>
                    <li class="nav-item active item2 top">
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="signup.php">Sign up</a></button> 
                    </li>
                    <li class="nav-item active item3 profile" style="visibility:hidden" >
                        <a href="profile.php">
                            <i class="fas fa-user-circle fa-2x"></i>
                           <br> 
                           <span>Welcome
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
 
    <div class="main">
        <div class="sidebar">
            <a href="profile.php" >
                <i class='far fa-user'></i>
                My account
            </a><br><hr>
            <a href="order.php">
                <i class='fas fa-box-open'></i>
                My Orders
            </a><br>
            <hr>
            <a href="personalInfo.php" class="active">
                <i class="fas fa-user-edit"></i>
                Personal info
            </a><br>
            <a href="changepass.php">
                <i class="	fas fa-lock"></i>
                Change Password
            </a><br><hr>
            <a href="../index.php">
                <i class='fas fa-door-open'></i>
                Sign out
            </a> 
        </div>
        <div class="mainsection">
            <form class="container" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <h2>Personal Information</h2>
               <label> 
                    <h4>First Name:</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $user= $_SESSION['user'];
                    $servername = "localhost";
                    $username = "root";
                    $password1 = "";
                    $dbname = "online_shopping";
                    $conn= mysqli_connect($servername,$username,$password1,$dbname);
                    $sql="SELECT * FROM customer where User_name='$user' ";
                    $result = mysqli_query($conn, $sql); 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $fname=  $row['first_name'];
                    $lname=$row['second_name'];
                    $email=$row['Email'];
                    $phone=$row['phone_no'];
                    $address=$row['address1'];
                    $state=$row['address2'];
                    $gender=$row['gender'];
                ?>
                    <input type="text" name="fname" value="<?php echo($fname);?>" >
               </label>
                <label>
                    <h4>Last Name:</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="lname" value="<?php echo($lname);?>" >
                </label>
                <h4>Email Address</h4>
                <Label class="mail" >
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="text" name="email" value="<?php echo($email);?>" readonly >
                </Label>
                <label>
                    <h4>Phone Number</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="tel" name="phone" value="<?php echo($phone);?>" >
               </label>
               <label>
                    <h4>Address</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="phone1" value="<?php echo($address);?>" >
               </label>
               <label>
                    <h4>State</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="state" value="<?php echo($state);?>" >
               </label>
               <label>
                    <h4>Gender</h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="" style="color:#043b5f"><?php echo($gender);?></label>
                    
                    <!-- <select name="gender" >
                        <option value="select" class="select">Please select</option>
                        <option value="male" class="male">Male</option>
                        <option value="female" class="female">Female</option>
                    </select> -->
                    </label>
                    <input type="submit" value="Save" class="submit" required 
                    style="font-size:20px;background-color:#043b5f;color:#fff">
            </form>     
            <?php 
            $email=$_POST['email'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $phone=$_POST['phone'];
            $address=$_POST['phone1'];
            $state=$_POST['state'];

            $servername = "localhost";
            $username = "root";
            $password1 = "";
            $dbname = "online_shopping";
            $conn= mysqli_connect($servername,$username,$password1,$dbname);   
            $sql1="UPDATE customer
            SET first_name = '$fname', second_name= '$lname' , phone_no='$phone' , Email='$email'
            , address1='$address', address2='$state' WHERE id=$user_id";
            $result1= mysqli_query($conn, $sql1);
            ?>
        </div>
    </div>

    <div class="footer">
        <div class="social-media">
            <h3>Contact Us</h3>
            <div class="linkat">
                <a href="#">
                    <i class="fab fa-facebook" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-youtube" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a> 
            </div>
        </div>
        <div style="font-size: 25px;">
            <a href="logadmin.php" style="color: bisque; "
            onmouseover="this.style.text_decoration='none';this.style.color='#dc3545';" 
            onmouseout="this.style.color='bisque';">Control Panel</a>
        </div>
        <div class="payment-method">
            <h3>Payment Methods</h3>
            <div class="linkat"   >
                <a href="#" >
                    <i class="fa fa-money" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-visa fa-2x" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-mastercard fa-2x" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-paypal fa-2x" style="font-size:30px; color: wheat; padding-left: 10px;"
                    onmouseover="this.style.color='#dc3545';" onmouseout="this.style.color='wheat';"></i>
                </a> 
            </div>
        </div>

    </div>
</body>
</html>
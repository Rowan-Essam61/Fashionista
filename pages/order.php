<?php
  session_start();
  if ( isset($_SESSION["user"])){
    echo '<style>.profile{visibility: visible !important;
    margin-right:}</style>';
    echo '<style>.item2{visibility: Hidden !important;}</style>';
    $servername = "localhost";
    $username = "root";
    $password1 = "";
    $dbname = "online_shopping";
    $user=$_SESSION["user"];
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
    <link rel="stylesheet" href="../CSS/order.css">
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
            <a href="order.php" class="active">
                <i class='fas fa-box-open'></i>
                My Orders
            </a><br><hr>
            <a href="personalInfo.php">
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
        <div class="mainsection" style="width: 50%;border: 0px;">
        <table>
                <tr style="text-align: center;">
                                        <th>Number</th>
                                        <th>product number</th>
                                        <th>Product category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total price</th>
                                        <th>Date</th>
                                    </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password1 = "";
                $dbname = "online_shopping";
                $i=0;
                try{
                    $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password1);
                    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql=$conn-> query("SELECT * FROM orders WHERE customer_id=$user_id ") ;
                    $row = $sql->fetch();  
                    $count =count($row['product_id']);

                    if($count==0){
                        echo "You Haven't Ordered Yet";
                    }
                    else{
                       while($row = $sql->fetch()){
                            $pid=$row['product_id'];
                            $pqty=$row['quantity'];
                            $total=$row['total_price'];
                            $date=$row['order_date'];
                           
                           
                           $sql2=$conn-> query("SELECT * FROM product WHERE id=$pid");
                           
                           while($row2 = $sql2->fetch()){
                           
                                $catid=$row2['cat_id'];
                                $pimage=$row2['picture'];
                            
                                $sql3=$conn-> query("SELECT * FROM category WHERE id=$catid");
                                $row3 = $sql3->fetch();
                            ?>
                              
                                    
                                    <tr style="text-align: center;">
                                        <td>
                                            <?php echo ++$i?>
                                        </td>
                                        <td >
                                            <img src="<?php echo  $pimage?>" alt="" style="width: 10%;margin: auto;">
                                        </td>
                                        <td>
                                            <?php echo $row3['name']?>
                                        </td>
                                        <td>
                                            <?php echo $total/$pqty?>
                                        </td>
                                        <td>
                                            <?php echo $pqty?>
                                        </td>
                                        <td>
                                            <?php echo $total?>
                                        </td>
                                        <td>
                                            <?php echo $date?>
                                        </td>
                                    </tr>
                                
                         <?php
                         
                            }
                        }
                }
        }
           catch(PDOException $e){
                // echo "connection Failed" .$e->getMessage();
            }       
            ?> </table>    
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
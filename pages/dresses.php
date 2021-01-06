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
  else{
      header("location:loguser.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/dresses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <nav class="navbar " id="navb" style="width: 100%;">
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

    <div class="main">
        <h1>Dresses</h1>
        <div class="container">
            <?php
                $servername = "localhost";
                $username = "root";
                $password1  = "";
                $dbname = "online_shopping";
               try{
                    $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                    $sql="SELECT * FROM product WHERE cat_id = 1";
                    $result = mysqli_query($conn, $sql);  
                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        
                        ?>
                        
                        <div class="card" style="width: 20rem;height: 600px;display:flex;justify-content:space-between">
                        <img src="<?php echo $row["picture"]?>"  class="card-img-top" style="height: 45%;width: 50%;margin: auto;">
                        <div class="card-body">
                        <h4 class="card-title " ><?php echo $row["description"]?> </h4>
                        <h3 style="width:200px;border:1px solid #043b5f;color:#dc3545">Price= $ <span><?php echo $row["price"]?> </span></h3>
                        <h5 style="width: 50px;padding: 10px; color: #dc3545; border: 1px solid #043b5f;text-align:center" ><?php echo $row["size"]?> </h5> <br>
                         
                    </div>
                    <form  method="POST" class="form-submit" action="tocart.php?action=add&id=<?php echo $row["id"]; ?>">
                        <input type="hidden" name="hidden_user_id" class="puserid" value="<?php echo $user_id; ?>" />    
                        <input type="hidden" name="hidden_id" class="pid" value="<?php echo $row["id"]; ?>" />
                        <input type="hidden" name="hidden_image" class="pimage" value="<?php echo $row["picture"]; ?>" />
                        <input type="hidden" name="hidden_description" class="pdesc" value="<?php echo $row["description"]; ?>" />
                        <input type="hidden" name="hidden_size" class="psize" value="<?php echo $row["size"]; ?>" />
                        <input type="hidden" name="hidden_price" class="pprice" value="<?php echo $row["price"]; ?>" />
                        <input type="number" name="quantity" class="pqantity" placeholder="Quantity" style="height:30px; margin-left:20px;width:150px;border:1px solid #043b5f" >    
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" style="color:#fff ; margin-bottom:30px ; margin-left:100px" value="Add to Cart" />
                           <!-- <button class="btn btn-info btn-block addItemBtn" style="color:#fff ; margin-bottom:30px ; margin-left:50px">Add tocart</button> -->
                    </form> 
                    </div>
                  <?php       
                    } 
               }
               catch(PDOException $e){
                    echo "connection Failed" .$e->getMessage();
                }
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
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
    <title>Fashionista</title>
    <link rel="stylesheet" href="../CSS/cart.css">
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
                          <a class="dropdown-item linka" href="dresses.php">Dresses</a>
                          <!-- <div class="dropdown-divider"></div> -->
                          <a class="dropdown-item linka" href="pantalons.php">Pantalons</a>
                          <a class="dropdown-item linka" href="skirts.php">Skirts</a>
                          <a class="dropdown-item linka" href="blouses.php">Blooses</a>
                          <a class="dropdown-item linka" href="t-shirts.php">Tshirts</a>
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

    <div class="main" style="width: 80%;margin: auto;margin-top:150px">
        <h1 style="text-align: center;background: -webkit-linear-gradient(#0b65a1, #dc3545);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-top: 150px;font-size: 40px;margin-bottom: 40px;">Shopping Cart</h1>
        <table id="tablecart" style="margin-top: 200px;border-collapse: collapse;margin: auto;font-size: 0.9em;width: 80%;font-family: sans-serif;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
            <thead style="color: white;">
                <tr style="background-color: #dc3545;text-align: left;text-align: center;">
                    <th style="padding: 12px 15px;color: white;">Product</th>
                    <th style="padding: 12px 15px;color: white;">Details</th>
                    <th style="padding: 12px 15px;color: white;">Size</th>
                    <th style="padding: 12px 15px;color: white;">Qantity</th>
                    <th style="padding: 12px 15px;color: white;">Price/one</th>
                    <th style="padding: 12px 15px;color: white;">Total Price</th>
                </tr>
            </thead>
            <?php
            $total=0;
            $ship=0;
           try{
                $conn= mysqli_connect($servername,$username,$password1,$dbname);    
                $sql="SELECT * FROM cart ";
                $result = mysqli_query($conn, $sql);  
                while ($row = mysqli_fetch_array($result)) {
                    ?>
            
            <tr class="active-row" id="<?php echo "number".$row['product_id'];?>" style="font-weight: bold;color: #043b5f;border-bottom: 1px solid #dddddd;color: #043b5f;text-align: center;">
                 <?php 
                    $productId=$row['product_id'];
                    $sql1="SELECT * FROM product WHERE id=$productId ";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                ?>
                <td>
                    <img src="<?php echo $row1["picture"]?>" alt="" style="width:150px;height:150px">
                </td>
               
                <td><?php echo $row1["description"]?></td>
                <td><?php echo $row1["size"]?></td>
                <td><?php echo $row["Quantity"]?></td>
                <td><?php echo $row["price"]?></td>
                <td><?php echo number_format($row["Quantity"] * $row["price"]);
                $total+= $row["Quantity"] * $row["price"];?></td>
                <td>
                    <form  action="cart.php " id="formdelete" method="POST">
                        <input type="hidden" name="hidden_product_id" value="<?php echo $row1['id']; ?>">
                        <input type="hidden" name="hidden_id" value="<?php echo $row["id"]?>">
                        <input type="hidden" name="hidden_user_id" class="puserid" value="<?php echo $user_id; ?>" />    
                        <input type="submit" id="delete" value="delete"  style="color: #dc3545;">
                    </form>
                    <?php
                        if (isset($_POST['hidden_id'])) {
                            $pid = $_POST['hidden_id'];
                            $prodid=$_POST['hidden_product_id'];
                            $puserid=$_POST['hidden_user_id'];
                            $conn1= mysqli_connect($servername,$username,$password1,$dbname);    
                            $sql2="DELETE FROM cart WHERE product_id=$prodid";
                            $result2 = mysqli_query($conn1, $sql2); 
                            
                        }
                        else{

                        }
                    ?>
                </td>
            </tr>
            <?php
                }}
              ?>
              <tr>
                    <td colspan="5" style=" font-weight: bold;color: #043b5f;padding: 12px 15px;">Shipping Fees</td>
                    <td><?php echo ($total*(14/100));
                    $ship+=$total*(14/100)?></td>
                </tr>
                <tr>
                    <td colspan="5" style=" font-weight: bold;color: #043b5f;padding: 12px 15px;">Total Cost</td>
                    <td ><?php echo $total+$ship?></td>
                </tr>

              <?php  
            }catch(PDOException $e){
                    echo "connection Failed" .$e->getMessage();
                }
            ?>
            
            
        </table><br><br><br>
        <a href="orderconfirm.php" style="background-color: #dc3545;margin-left:40%;color: white;padding: 1em 1.5em; text-decoration: none; text-transform: uppercase;">Order Now</a>
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


    <script>
        // $("#formdelete").submit(function(){
        //     $("form#formdelete").parentsUntil("#tablecart").fade();
        // })
    </script>
</body>
</html>
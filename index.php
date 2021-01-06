<?php
  session_start();
  if ( isset($_SESSION["user"])){
    echo '<style>.profile{visibility: visible !important;
    margin-right:}</style>';
    echo '<style>.item2{visibility: Hidden !important;}</style>';

  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionista</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head> 
<body >
    <div class="header">
        <nav class="navbar " id="navb" style="justify-content:space-around;">
            <a class="navbar-brand" href="#"><img src="images/logo1.png" alt="index.php"></a>
            <div class="search form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn btn-danger my-2 my-sm-0" type="submit">Search</button>
            </div>
            <div class="links" >
                <ul>
                    <li class="nav-item item1 top">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown item1 top">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item linka" href="pages/dresses.php">Dresses</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item linka" href="pages/pantalons.php">Pantalons</a>
                        <a class="dropdown-item linka" href="pages/skirts.php">Skirts</a>
                        <a class="dropdown-item linka" href="pages/blouses.php">Blooses</a>
                        <a class="dropdown-item linka" href="pages/t-shirts.php">Tshirts</a>
                      </div>
                    </li>
                    <li class="nav-item active item1 shop ">
                        <a href="pages/cart.php">
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
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="pages/loguser.php">Login</a></button> 
                    </li>
                    <li class="nav-item active item2 top">
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="pages/signup.php">Sign up</a></button> 
                    </li>
                    <li class="nav-item active item3 profile" style="visibility:hidden" >
                        <a href="pages/profile.php">
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

    <div class="container">
        <img src="images/mainImg.jpeg" alt="">
        <img src="images/shop.jpeg" alt="">
     </div>
    
    <div class="main">
        <h1>Main Categories</h1>
        <div class="cat">
            <div class="card three" style="width: 18rem;">
                <img src="images/MainDress.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Dresses</h5>
                  <a href="pages/dresses.php" class="btn btn-danger btn-lg">See More</a>
                </div>
            </div>
            <div class="card " style="width: 18rem;">
                <img src="images/MainPantalon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Pantalons</h5>
                <a href="pages/pantalons.php" class="btn btn-danger btn-lg">See More</a>
                </div>
            </div>
            <div class="card two" style="width: 18rem;">
                <img src="images/MainSkirt.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Skirts</h5>
                  <a href="pages/skirts.php" class="btn btn-danger btn-lg">See More</a>
                </div>
            </div>
            <div class="card card5 " style="width: 18rem;">
                <img src="images/MainBloose.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Blosses</h5>
                  <a href="pages/blouses.php" class="btn btn-danger btn-lg">See More</a>
                </div>
            </div>
            <div class="card card5 five" style="width: 18rem;">
                <img src="images/MainTshirt.jpg" style="width: 100%;height: 65%;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Tshirts</h5>
                  <a href="pages/t-shirts.php" class="btn btn-danger btn-lg ">See More</a>
                </div>
            </div>
        </div>
       
    </div>

    <div class="header-main">
        <div class="carousel-inner">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-item active img1">
                        <img src="images/o1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item img2">
                        <img src="images/o2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
    </div>

    <div class="footer">
        <div class="social-media">
            <h3>Contact Us</h3>
            <div class="linkat">
                <a href="#">
                    <i class="fab fa-facebook" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-youtube" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter" style="font-size:30px"></i>
                </a> 
            </div>
        </div>
        <div class="control">
            <a href="pages/logadmin.php">Control Panel</a>
        </div>
        <div class="payment-method">
            <h3>Payment Methods</h3>
            <div class="linkat">
                <a href="#">
                    <i class="fa fa-money" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-visa fa-2x" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-mastercard fa-2x" style="font-size:30px"></i>
                </a>
                <a href="#">
                    <i class="fab fa-cc-paypal fa-2x" style="font-size:30px"></i>
                </a> 
            </div>
        </div>

    </div>
    <script src="script.js"></script>
</body>
</html>
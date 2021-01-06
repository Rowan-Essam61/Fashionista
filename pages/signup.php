
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionista</title>
    <link rel="stylesheet" href="../CSS/signup.css">
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
                            <span>0</span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item active item2 top">
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="login.php
                        ">Login</a></button> 
                    </li>
                    <li class="nav-item active item2 top">
                        <button class="btn btn btn-danger my-2 my-sm-0" type="submit"><a class="nav-link" href="signup.php
                        ">Sign up</a></button> 
                    </li>
                    <li class="nav-item active item3 profile" style="visibility:hidden">
                        <a href="profile.php">
                            <i class="fas fa-user-circle fa-2x"></i>
                           <br> <span>Profile
                           </span>
                        </a> 
                    </li>
                  </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <form action="checksignup.php" method="POST">
            <button class="google btn1">
                <span><i class="fab fa-google"></i></span> 
                <span class="text">&nbsp; Sign up with Google</span>
            </button>
            <br>
            <button class="facebook btn1">
                <span><i class="fab fa-facebook-square"></i></span>
                <span class="text">&nbsp; Sign up with Facebook</span>
            </button>
            <br>
            <h4>or </h4>
            <input type="text" name="user" placeholder="User name" required><br>
            <input type="text" name="first" placeholder="First name" required><br>
            <input type="text" name="last" placeholder="Last name" required><br>
            <input type="text" name="email" placeholder="Email address" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="cpassword" placeholder="Confirm password" required><br>
            <input type="tel" name="phone" placeholder="Phone number" required><br>
            <input type="text" name="gender" placeholder="Gender" required><br>
            <input type="text" name="country" placeholder="Country" required><br>
            <input type="submit" value="Sign Up" class="submit" required
            style="margin-top: 50px;width: 200px;background-color: #043b5f;height: 50px; 
            margin-bottom: 30px;color: #fff;"><br>
            <br><br>
            <h5> Already have account? <a href="login.php" class="a2">click me </a></h5>    
        </form>
        <?php
            
            
            
        ?>
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
</body>
</html>
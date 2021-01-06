<?php
  session_start();
  if ( isset($_SESSION["user"])){
    
  }
  else{
    header("location:logadmin.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionista</title>
    <link rel="stylesheet" href="../CSS/control.css">
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
                    <li class="nav-item item1 top">
                      <a class="nav-link" href="control.php">Back</a>
                    </li>
                    
                    <li class="nav-item active item3 profile">
                        <a href="profile.php">
                            <i class="fas fa-user-circle fa-2x"></i>
                           <br> <span>
                           <?php
                                echo "Welcome " . $_SESSION['user'];
                            ?> 
                           </span>
                        </a> 
                    </li>
                    <li class="nav-item item1 out">
                      <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                  </ul>
            </div>
        </nav>
    </div>

    <div class="container">
            <div class="content"><a href="adddresses.php">Add Dresses</a></div>
            <div class="content"><a href="addpantalon.php">Add Pantalons</a></div>  
            <div class="content"><a href="addskirt.php">Add Skirts</a></div>
            <div class="content"><a href="addblouse.php">Add Blouses</a></div>
            <div class="content"><a href="addtshirt.php" >Add TShirts</a></div>
            <div class="content"><a href="addadmin.php" >Add Admin</a></div>
    </div>
   
</body>
</html>
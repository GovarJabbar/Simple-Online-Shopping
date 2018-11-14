<?php
    include 'conn.php'; 
    include 'functions.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=setting('about','title');?></title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="cart.ph"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="admin/"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
             
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart<i class="fa fa-shopping-cart"></i> <span class="product-count">
                            <?php 
                                if (isset($_SESSION['cart'])) {
                                 $items = explode(',',$_SESSION['cart']);
                                 echo count($items);
                                }else{
                                    echo "0";
                                }
                             ?>
                        </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <!-- <li><a href="shop.php">Shop page</a></li> -->
                        <!-- <li><a href="single-product.php">Single product</a></li> -->
                        <?php 
                            $query = "SELECT * FROM categories ORDER BY views DESC LIMIT 6";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                               ?>
                                <li><a href="cat.php?id=<?=$row['id'];?>"><?=$row['name'];?></a></li>
                               <?php
                            }
                         ?>
                        <li><a href="cart.php">Cart</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
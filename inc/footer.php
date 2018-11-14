
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Last Products</h2>
                        <?php 
                            $query = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                        <div class="single-wid-product">
                            <a href="single-product.php?id=<?=$row['id'];?>"><img src="<?=get_image($row['image']);?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id=<?=$row['id'];?>"><?=$row['title'];?></a></h2>
                           
                            <div class="product-wid-price">
                                <?php 
                                        if ($row['currency']=='$') {
                                            $price = $row['currency'].$row['price'];
                                        }else{
                                            $price = $row['price'].' '.$row['currency'];
                                        }
                                     ?>
                                <ins><?=$price;?></ins> 
                            </div>                            
                        </div>
                        <?php
                            }
                        ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <?php 
                            $query = "SELECT * FROM products ORDER BY views DESC LIMIT 3";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                        <div class="single-wid-product">
                            <a href="single-product.php?id=<?=$row['id'];?>"><img src="<?=get_image($row['image']);?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id=<?=$row['id'];?>"><?=$row['title'];?></a></h2>
                           
                            <div class="product-wid-price">
                                <?php 
                                        if ($row['currency']=='$') {
                                            $price = $row['currency'].$row['price'];
                                        }else{
                                            $price = $row['price'].' '.$row['currency'];
                                        }
                                     ?>
                                <ins><?=$price;?></ins> 
                            </div>                            
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Categories</h2>
                        <?php 
                            $query = "SELECT * FROM categories ORDER BY views DESC LIMIT 3";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                        <div class="single-wid-product">
                            <a href="cat.php?id=<?=$row['id'];?>"><img src="<?=get_image($row['image']);?>" alt="" class="product-thumb"></a>
                            <h2><a href="cat.php?id=<?=$row['id'];?>"><?=$row['name'];?></a></h2>
                           
                                                
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span><?=setting('about','title');?></span></h2>
                        <p><?=setting('about','about');?></p>
                        <div class="footer-social">
                            <a href="<?=setting('social','fb');?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?=setting('social','tw');?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="<?=setting('social','you');?>" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="<?=setting('social','li');?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Last Products</h2>
                        <ul>
                            <?php 
                            $query = "SELECT * FROM products ORDER BY id DESC LIMIT 5";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                            <li><a href="single-product.php?id=<?=$row['id'];?>"><?=$row['title'];?></a></li>
                        <?php
                            }
                        ?>
                            
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <?php 
                            $query = "SELECT * FROM categories ORDER BY views DESC LIMIT 5";
                            $result = mysqli_query($conn,$query);
                            while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                            <li><a href="cat.php?id=<?=$row['id'];?>"><?=$row['name'];?></a></li>
                        <?php
                            }
                        ?>                            
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2018 <?=setting('about','title');?>. All Rights Reserved. </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>
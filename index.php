<?php 
include 'inc/header.php';
 ?>
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                    <?php 
                        $query = "SELECT * FROM products ORDER BY views DESC LIMIT 5";
                        $result = mysqli_query($conn,$query);
                        while ($row = mysqli_fetch_assoc($result)) {
                     ?>
    					<li>
    						<img style=" width: 1206px; height: 378px; " src="<?=get_image($row['image']);?>" alt="<?=$row['title'];?>">
    						<div class="caption-group" style=" background: #fafafa; padding: 20px; border-radius: 15px; ">
    							<h2 class="caption title">
    								<?=$row['title'];?>
    							</h2>
    							<h4 class="caption subtitle"><?=substr($row['des'], 0,50);?></h4>
    							<a class="caption button-radius" href="single-product.php?id=<?=$row['id'];?>"><span class="icon"></span>Shop now</a>
    						</div>
    					</li>
                    <?php
                        }
                    ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                    <?php 
                        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 10";
                        $result = mysqli_query($conn,$query);
                        while ($row = mysqli_fetch_assoc($result)) {
                     ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img style="height: 270px" src="<?=get_image($row['image']);?>" alt="">
                                    <div class="product-hover">
                                        <a href="cart.php?add=<?=$row['id'];?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="single-product.php?id=<?=$row['id'];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.php?id=<?=$row['id'];?>"><?=$row['title'];?></a></h2>

                                <div class="product-carousel-price">
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
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <?php 
                                $query = "SELECT * FROM categories ORDER BY views DESC LIMIT 10";
                                $result = mysqli_query($conn,$query);
                                while ($row = mysqli_fetch_assoc($result)) {
                             ?>
                                <a href="cat.php?id=<?=$row['id'];?>">
                                    <img style="width: 270px;height: 120px" src="<?=get_image($row['image']);?>" alt="<?=$row['name'];?>" title="<?=$row['name'];?>">
                                </a>
                            <?php 
                                }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

<?php 
include 'inc/footer.php';
 ?>
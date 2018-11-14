<?php 
include 'inc/header.php';

    $id = @$_GET['id'];
    plus_views($id,'pro');
    $query = mysqli_query($conn,"SELECT * FROM products WHERE id='$id' LIMIT 1");
    $product = mysqli_fetch_array($query);
 ?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?=get_category($product['category_id'],'name');?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <?php 
                            $query = "SELECT * FROM products ORDER BY views DESC LIMIT 5";
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
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Home</a>
                            <a href="cat.php?id=<?=$product['category_id'];?>"><?=get_category($product['category_id'],'name');?></a>
                            <a><?=$product['title'];?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?=get_image($product['image']);?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?=$product['title'];?></h2>
                                    <div class="product-inner-price">
                                        <?php 
                                        if ($product['currency']=='$') {
                                            $price = $product['currency'].$product['price'];
                                        }else{
                                            $price = $product['price'].' '.$product['currency'];
                                        }
                                     ?>
                                        <ins><?=$price;?></ins> 
                                    </div>    
                                    <a class="add_to_cart_button" href="cart.php?add=<?=$product['id'];?>">Add Cart</a>
                                    
                                       <div class="product-inner-category">
                                        <p>
                                            Views : <a ><?=$product['views'];?></a>. 
                                        </p>
                                    </div> 
                                    
                                 
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <!-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li> -->
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?=$product['des'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                    <?php 
                        $cat_id = $product['category_id'];
                        $query = "SELECT * FROM products WHERE category_id='$cat_id' LIMIT 5";
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
        </div>
    </div>
<?php 
include 'inc/footer.php';
 ?>
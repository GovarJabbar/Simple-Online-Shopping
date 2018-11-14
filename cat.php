<?php 
include 'inc/header.php';
include 'inc/pagination.php';
    $id = @$_GET['id'];
    plus_views($id,'cat');
    $query = mysqli_query($conn,"SELECT * FROM categories WHERE id='$id' LIMIT 1");
    $category = mysqli_fetch_array($query);
 ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?=$category['name'];?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                    <?php 
                        while ($row = mysqli_fetch_assoc($nquery)) {
                     ?>
                    <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img style="width: 195px;height: 243px" src="<?=get_image($row['image']);?>" alt="">
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
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="">Add to cart</a>
                        </div>                       
                    </div>
                    </div>
                    <?php 
                        }
                     ?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <?php 
                                echo $pagination;
                             ?>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
include 'inc/footer.php';
 ?>
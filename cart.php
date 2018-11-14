<?php 
include 'inc/header.php';
if (isset($_GET['add']) AND !empty($_GET['add'])) {
    addcart($_GET['add']);
}

if (isset($_GET['rm']) AND !empty($_GET['rm'])) {
    rmcart($_GET['rm']);
}

if (isset($_GET['rmall'])) {
    unset($_SESSION['cart']);
}

 ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
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
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $items = explode(',',@$_SESSION['cart']);
                                            if (count($items)>0 AND isset($_SESSION['cart'])) {
                                            foreach ($items as  $item) {
                                         ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="cart.php?rm=<?=$item;?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.php?id=<?=$item;?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?=get_image(product_info($item,'image'));?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.php?id=<?=$item;?>"><?=product_info($item,'title');?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">
                                                    <?php 
                                                        if (product_info($item,'currency')=='$') {
                                                            $price = product_info($item,'currency').product_info($item,'price');
                                                        }else{
                                                            $price = product_info($item,'price').' '.product_info($item,'currency');
                                                        }
                                                        echo $price;
                                                     ?>

                                                </span> 
                                            </td>

                                        </tr>
                                        <?php 
                                            }
                                            }
                                         ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                    <a href="cart.php?rmall" class="checkout-button button alt wc-forward">Remove All</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php 
include 'inc/footer.php';
 ?>
<?php 
    include 'inc/header.php';
?>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <h4 class="c-grey-900 mB-20">products</h4>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" float: right; position: absolute; right: 35px; top: 22px;cursor: pointer; ">
                                    <i class="fa fa-plus-square"></i>&nbsp;
                                    Add New</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="title" required="" class="form-control">
                                                            </div>
                                                           <div class="form-group">
                                                                <label>Des</label>
                                                                <textarea name="des" class="form-control" rows="4"></textarea>
                                                            </div>
                                                           <div class="form-group">
                                                                <label>Category</label>
                                                                <select name="category_id" class="form-control">
                                                                    <?php 
                                                                        get_categories();
                                                                     ?>
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input type="number" class="form-control" name="price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Currency</label>
                                                                        <select name="currency" class="form-control">
                                                                            <option value="$">$</option>
                                                                            <option value="IQD">IQD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <input type="file" name="image" required="" class="form-control">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                                                    </div>
                                                </form>
                                                <?php 
                                                    if (isset($_POST['add'])) {
                                                        $title= $_POST['title'];
                                                        $des= $_POST['des'];
                                                        $price= $_POST['price'];
                                                        $currency= $_POST['currency'];
                                                        $category_id= $_POST['category_id'];
                                                        $img = upload();

                                                        $query = "INSERT INTO products (title,des,price,currency,category_id,image) VALUES ('$title','$des','$price','$currency','$category_id','$img') ";
                                                        if (mysqli_query($conn,$query)) {
                                                            echo "<script>alert('New Product Adedd Success.')</script>";
                                                        }
                                                    }
                                                 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <?php 
                                        $id = @$_GET['edit'];
                                        if (empty($id)) {
                                    ?>
                                    <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="100px">IMG</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th width="140px">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="100px">IMG</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th width="140px">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $query= "SELECT * FROM products order by id desc";
                                                $result = mysqli_query($conn,$query);
                                                if (mysqli_num_rows($result)!=0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                            <tr>
                                                <td >
                                                    <div class="peer">
                                                        <img src="<?php echo $row['image']; ?>" alt="" class="w-3r h-3r bdrs-50p">
                                                    </div>
                                                </td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo get_category($row['category_id'],'name'); ?></td>
                                                <td><?php echo $row['price'].$row['currency']; ?></td>
                                                <td>
                                                    <a href="products.php?edit=<?php echo $row['id']; ?>" class="btn btn-info btn-sm mrg"><i class="fa fa-edit"></i></a>
                                                    <a href="products.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm mrg confirmation"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                                        <?php
                                                    }
                                                    
                                                }
                                             ?>
                                            
                                        </tbody>
                                    </table>
                                    <?php
                                        }else{

                                            $query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
                                            $result = mysqli_query($conn,$query);
                                            $data = mysqli_fetch_array($result);
                                     ?>
                                                <form method="post" action="" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input value="<?=$data['title'];?>" type="text" name="title" required="" class="form-control">
                                                            </div>
                                                           <div class="form-group">
                                                                <label>Des</label>
                                                                <textarea name="des" class="form-control" rows="4"><?=$data['des'];?></textarea>
                                                            </div>
                                                           <div class="form-group">
                                                                <label>Category</label>
                                                                <select name="category_id" class="form-control">
                                                                    <?php 
                                                                        get_categories_by_id($data['category_id']);
                                                                     ?>
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input value="<?=$data['price'];?>" type="number" class="form-control" name="price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>Currency</label>
                                                                        <select name="currency" class="form-control">
                                                                            <option <?php selected('$',$data['currency']) ?> value="$">$</option>
                                                                            <option <?php selected('IQD',$data['currency']) ?> value="IQD">IQD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <input type="file" name="image"  class="form-control">
                                                            </div>
                                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                     <?php
                                                    if (isset($_POST['edit'])) {
                                                        $title= $_POST['title'];
                                                        $des= $_POST['des'];
                                                        $price= $_POST['price'];
                                                        $currency= $_POST['currency'];
                                                        $category_id= $_POST['category_id'];
                                                        $img = upload();

                                                        if ($img=='error') {
                                                            $query = "UPDATE products SET title='$title',des='$des',price='$price',category_id='$category_id',currency='$currency' WHERE id='$id'";
                                                        }else{
                                                            $query = "UPDATE products SET title='$title',des='$des',price='$price',category_id='$category_id',currency='$currency',image='$img' WHERE id='$id'";
                                                        }
                                                        
                                                        
                                                        if (mysqli_query($conn,$query)) {
                                                            direct('products.php');
                                                            // echo "<script>alert('Information Edited Success.')</script>";
                                                        }
                                                    }

                                        }

                                        $del = @$_GET['delete'];
                                        if (!empty($del)) {
                                                $query = "DELETE FROM products WHERE id='$del'";
                                                if (mysqli_query($conn,$query)) {
                                                    direct('products.php');
                                                    // echo "<script>alert('Information Edited Success.')</script>";
                                                }
                                        }
                                     ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<?php 
    include 'inc/footer.php';
?>
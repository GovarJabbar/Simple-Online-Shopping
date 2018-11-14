<?php 
    include 'inc/header.php';
?>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-6"></div>
                        <form action="" method="post">
                        <div class="masonry-item col-md-6">
                            <div class="bgc-white p-20 bd">
                                <?php 
                                    $query = "SELECT * FROM settings WHERE name='about'";
                                    $result = mysqli_query($conn,$query);
                                    $about = mysqli_fetch_array($result);
                                    $about = unserialize($about['meta']);

                                    $query = "SELECT * FROM settings WHERE name='social'";
                                    $result = mysqli_query($conn,$query);
                                    $social = mysqli_fetch_array($result);
                                    $social = unserialize($social['meta']);
                                    

                                 ?>
                                <h6 class="c-grey-900">About Website</h6>
                                <div class="mT-30">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input value="<?=$about['email'];?>" name="about[email]"  type="email" class="form-control"placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label >Title</label>
                                            <input value="<?=$about['title'];?>" name="about[title]" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label >About</label>
                                            <textarea name="about[about]" class="form-control"><?=$about['about'];?></textarea>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="masonry-item col-md-6">
                            <div class="bgc-white p-20 bd">
                                <h6 class="c-grey-900">Social Links</h6>
                                <div class="mT-30">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label >Facebook</label>
                                                <input value="<?=$social['fb'];?>" name="social[fb]" type="text" class="form-control" placeholder="Enter Url">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Twitter</label>
                                                <input value="<?=$social['tw'];?>" name="social[tw]" type="text" class="form-control" placeholder="Enter Url">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label >Youtube</label>
                                                <input value="<?=$social['you'];?>" name="social[you]" type="text" class="form-control" placeholder="Enter Url">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Linkedin</label>
                                                <input value="<?=$social['li'];?>" name="social[li]" type="text" class="form-control" placeholder="Enter Url">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php 
                            if (isset($_POST['saveall'])) {
                                $meta = serialize($_POST['about']);
                                $query = "UPDATE settings SET meta='$meta' WHERE name='about'";
                                $result = mysqli_query($conn,$query);

                                $meta2 = serialize($_POST['social']);
                                $query2 = "UPDATE settings SET meta='$meta2' WHERE name='social'";
                                $result2 = mysqli_query($conn,$query2);

                                if ($result AND $result2) {
                                    direct('settings.php');
                                }
                            }
                         ?>
                        <div class="masonry-item col-md-12">
                            <div class="bgc-white p-20 bd">
                                <button type="submit" name="saveall" class="btn btn-primary">Save All</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </main>
<?php 
    include 'inc/footer.php';
?>
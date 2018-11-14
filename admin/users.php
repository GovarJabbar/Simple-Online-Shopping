<?php 
    include 'inc/header.php';
?>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <h4 class="c-grey-900 mB-20">Users</h4>
								    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" float: right; position: absolute; right: 35px; top: 22px;cursor: pointer; ">
								    <i class="fa fa-plus-square"></i>&nbsp;
								    Add New</button>
								    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								        <div class="modal-dialog" role="document">
								            <div class="modal-content">
								                <div class="modal-header">
								                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">×</span>
								                    </button>
								                </div>
										        <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-body">
    										                <div class="form-group">
    										                    <label>Full Name</label>
    										                    <input type="text" name="name" required="" class="form-control">
    										                </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" required="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" name="password" required="" class="form-control">
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
                                                        $name= $_POST['name'];
                                                        $email= $_POST['email'];
                                                        $password= $_POST['password'];
                                                        $img = upload();

                                                        $query = "INSERT INTO users (name,email,password,image) VALUES ('$name','$email','$password','$img') ";
                                                        if (mysqli_query($conn,$query)) {
                                                            echo "<script>alert('New User Registerd Success.')</script>";
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th width="140px">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="100px">IMG</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th width="140px">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $query= "SELECT * FROM users order by id desc";
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
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td>
                                                    <a href="users.php?edit=<?php echo $row['id']; ?>" class="btn btn-info btn-sm mrg"><i class="fa fa-edit"></i></a>
                                                    <a href="users.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm mrg confirmation"><i class="fa fa-trash-o"></i></a>
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

                                            $query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
                                            $result = mysqli_query($conn,$query);
                                            $data = mysqli_fetch_array($result);
                                     ?>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="text" value="<?=$data['name'];?>" name="name" required="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" value="<?=$data['email'];?>" name="email" required="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" name="image" required="" class="form-control">
                                                        </div>
                                                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                            </form>
                                     <?php
                                                    if (isset($_POST['edit'])) {
                                                        $name= $_POST['name'];
                                                        $email= $_POST['email'];
                                                        $password= $_POST['password'];
                                                        $img = upload();

                                                        if (empty($password)) {
                                                            $query = "UPDATE users SET name='$name',email='$email',image='$img' WHERE id='$id'";
                                                        }else{
                                                            $query = "UPDATE users SET name='$name',email='$email',password='$password',image='$img' WHERE id='$id'";
                                                        }
                                                        

                                                        if (mysqli_query($conn,$query)) {
                                                            direct('users.php');
                                                            // echo "<script>alert('Information Edited Success.')</script>";
                                                        }
                                                    }

                                        }

                                        $del = @$_GET['delete'];
                                        if (!empty($del)) {
                                                $query = "DELETE FROM users WHERE id='$del'";
                                                if (mysqli_query($conn,$query)) {
                                                    direct('users.php');
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
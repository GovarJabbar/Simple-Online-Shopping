<?php 
require '../inc/conn.php';
require '../inc/functions.php';
if (isset($_SESSION['user_id'])) {
    direct('index.php');
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link href="style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/bg.jpeg)">
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
                    <img class="pos-a centerXY" src="assets\static\images\logo.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form method="post" action="">
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                     
                        <div class="peer">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                if (isset($_POST['submit'])) {
                    $email= @$_POST['email'];
                    $password= @$_POST['password'];
                    
                    $query= mysqli_query($conn,"SELECT id,email,password FROM users WHERE email='$email' AND password='$password' LIMIT 1");
                    $result = mysqli_fetch_array($query);
                    if (mysqli_num_rows($query)>0) {
                        $_SESSION['user_id']=$result['id'];
                        direct('index.php');
                    }else{
                        echo '<p class="alert alert-danger">Information not correct!</p>';
                    }
                }
             ?>
        </div>
    </div>
    <script type="text/javascript" src="vendor.js"></script>
    <script type="text/javascript" src="bundle.js"></script>
    <script type="text/javascript" src="assets/custom.js"></script>
</body>

</html>
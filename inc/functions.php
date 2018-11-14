<?php 
ob_start();
function direct($value)
{
  global $conn;
	header('Location: '.$value);
	exit;
}

function get_categories()
{
  global $conn;

  $query= "SELECT * FROM categories order by name asc";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='".$row['id']."'>".$row['name']."</option>";
  }
}

function get_categories_by_id($id)
{
  global $conn;

  $query= "SELECT * FROM categories order by name asc";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option ";
    if ($id==$row['id']) {
      echo "selected";
    }
    echo " value='".$row['id']."'>".$row['name']."</option>";
  }
}

function selected($v1,$v2)
{
  if ($v1==$v2) {
     echo "selected";
  }
}

function get_category($id,$arg)
{
  global $conn;

  $query= "SELECT * FROM categories where id='$id'";
  $result = mysqli_query($conn,$query);
  return mysqli_fetch_array($result)[$arg];
}

function product_info($id,$arg)
{
  global $conn;
  $query= "SELECT * FROM products where id='$id'";
  $result = mysqli_query($conn,$query);
  return mysqli_fetch_array($result)[$arg];
}


function plus_views($id,$type)
{
  global $conn;
  $query = "UPDATE products SET views = views + 1 WHERE id='$id'";
  if ($type=='cat') {
    $query = "UPDATE categories SET views = views + 1 WHERE id='$id'";
  }
  $result = mysqli_query($conn,$query);
  if ($result) {}
}

function upload($uploadDirectory = "../upload/")
{
    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName  = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $tmp = explode('.', $fileName);
    $fileExtension = end($tmp);
    $uploadPath = $uploadDirectory . date("YmdHis-") .basename($fileName); 

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 10000000) {
            $errors[] = "This file is more than 10MB. Sorry, it has to be less than or equal to 10MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                return $uploadPath;
            } else {
                return 'error';
            }
        } else {
            foreach ($errors as $error) {
                return 'error';
            }
        }
}



function get_image($var)
{
  return str_replace("../", "", $var);
}


function addcart($id)
{
  if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
      $items = $_SESSION['cart'];
      $cartitems = explode(",", $items); // 1,2,3
        if(in_array($id, $cartitems)){
          direct('cart.php');
        }else{
          $items .= "," . $id; // 1,22
          $_SESSION['cart'] = $items;
          direct('cart.php');
        }
  }else{
      $items = $id;
      $_SESSION['cart'] = $items;
      direct('cart.php');
  }
}

function rmcart($id)
{
  $items = $_SESSION['cart'];
  $cartitems = explode(",", $items);

  foreach ($cartitems as $item) {
    if ($id!=$item) {
      $data[] = $item;
    }
  }
  $itemids = implode(",", $data); // 1,2
  $_SESSION['cart'] = $itemids;
  direct('cart.php');
}


function setting($name,$arg)
{
   global $conn;
  $query= "SELECT * FROM settings where name='$name'";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($result);
  return unserialize($data['meta'])[$arg]; 
}
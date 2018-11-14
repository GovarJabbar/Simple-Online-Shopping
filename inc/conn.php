<?php 
session_start();
$host="localhost";
$user="root";
$pass="";
$database="shopping";

$conn = mysqli_connect($host,$user,$pass,$database);
// if ($conn) {
// 	echo "Success";
// }else{
// 	echo "Error!";
// }
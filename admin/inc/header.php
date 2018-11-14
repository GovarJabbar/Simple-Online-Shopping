<?php 
require '../inc/conn.php';
require '../inc/functions.php';
if (!isset($_SESSION['user_id'])) {
    direct('signin.php');
}

if (isset($_GET['logout'])) {
    $_SESSION['user_id']="";
    session_destroy();
    direct('signin.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopping System</title>
    <link href="style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>

    <div>
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed">
                            <a class="sidebar-link td-n" href="index.php" class="td-n">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo">
                                            <img src="assets\static\images\logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text">Shopping</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle">
                                <a href="" class="td-n">
                                    <i class="ti-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 active">
                        <a class="sidebar-link" href="index.php" default="">
                            <span class="icon-holder">
                                <i class="c-blue-500 ti-home"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="products.php">
                            <span class="icon-holder">
                                <i class="c-brown-500 fa fa-shopping-bag"></i>
                            </span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="categories.php">
                            <span class="icon-holder">
                                <i class="c-blue-500 fa fa-folder"></i>
                            </span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="sidebar-link" href="users.php">
                            <span class="icon-holder">
                                <i class="c-deep-orange-500 fa fa-group"></i>
                            </span>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="settings.php">
                            <span class="icon-holder">
                                <i class="c-orange-500 ti-layout-list-thumb"></i>
                            </span>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../" target="_blank">
                            <span class="icon-holder">
                                <i class="c-green-500 fa fa-refresh"></i>
                            </span>
                            <span class="title">View Site</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li>
                            <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="notifications dropdown">
                            <span class="counter bgc-red">5</span>
                            <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="pX-20 pY-15 bdB">
                                    <i class="ti-bell pR-10"></i>
                                    <span class="fsz-sm fw-600 c-grey-900">Reviews</span>
                                </li>
                                <li>
                                    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                        <li>
                                            <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                                <div class="peer mR-15">
                                                    <img class="w-3r bdrs-50p" src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                                                </div>
                                                <div class="peer peer-greed">
                                                    <span>
                                                        <span class="fw-500">Govar Jabar</span>
                                                        <span class="c-grey-600">Review Adam's
                                                            <span class="text-dark">product</span>
                                                        </span>
                                                    </span>
                                                    <p class="m-0">
                                                        <small class="fsz-xs">☆☆☆</small>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="notifications dropdown">
                            <span class="counter bgc-blue">5</span>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                                <div class="peer mR-10">
                                    <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
                                </div>
                                <div class="peer">
                                    <span class="fsz-sm c-grey-900">Govar Jabar</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li>
                                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-user mR-10"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="?logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                        <i class="ti-power-off mR-10"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
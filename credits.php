<?php
session_start();
if (array_key_exists("logout", $_GET)) {
    // check logout value 1 or not
            
             $_COOKIE["iddashboard"] = "";  
             $_COOKIE["signupas"] = "";
            
            session_destroy();
            
            setcookie("iddashboard", "", time() - 60*60);
            setcookie("signupas", "", time() - 60*60);
            header("Refresh:0; url=client_dashboard.php");
    //        $_COOKIE["id"] = "";  
    // destroy cookie and session
        }
include("./php/config.php");
// $_SESSION['iddashboard'] $_SESSION['signupas']
if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "client") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "client" )) {
   
}
 else {
    // echo '<script type="text/javascript">alert("hello!");</script>';
    header('location:index.php');
}
if(array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']){
    // getting id of customer
    $customerid =  $_COOKIE['iddashboard'];
    $tablename = $_COOKIE['signupas'];
  
    $query = "SELECT * FROM `$tablename` WHERE id = $customerid";
//getting email of customer
         if ($result = mysqli_query($conn, $query)) {
                 while( $row = mysqli_fetch_array($result)){
                $customeremail = $row['email'] ;
                $customername = $row['name'] ;
                $customerphone = $row['phone'] ;
                $customercredits = $row['Credits'] ;
                $customerrequests = $row['no_requests'] ;
                $customercompletedrequests = $row['no_completed_requests'] ;
                

                // echo $customeremail ;
                   }
                }
                else{
                    echo "hello";
                }
}
elseif (array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard']) 
{
     // getting id of customer
     $customerid =  $_SESSION['iddashboard'];
     $tablename = $_SESSION['signupas'];
     $query = "SELECT * FROM `$tablename` WHERE id = $customerid";
 //getting email of customer
          if ($result = mysqli_query($conn, $query)) {
                  while( $row = mysqli_fetch_array($result)){
                 $customeremail = $row['email'] ;
                 $customername = $row['name'] ;
                 $customerphone = $row['phone'] ;
                 $customercredits = $row['Credits'] ;
                $customerrequests = $row['no_requests'] ;
                $customercompletedrequests = $row['no_completed_requests'] ;
                //  echo $customeremail ;
                    }
                 }
                 else{
                     echo "hello";
                 }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Find a designer with just the right skill set, and get the perfect design.">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Credits</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" /> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<style>
    .categories-heading {
        font-size: 24px;
        margin-top: 0;
        font-family: Larsseit-Bold, sans-serif;
        font-weight: 400;
        line-height: 1.25;
        letter-spacing: -.005em;
        margin-bottom: 15px;
        color: #555;

    }

    .iconstylemob {
        display: inline-block;
        width: inherit;
        font-size: 1.25rem;
        line-height: 47px;
        text-align: center;
        color: #fff;
    }

    .btn-floating {
        position: relative;
        background: #4285f4;
        display: inline-block;
        padding: 0;
        margin: 10px 20px !important;
        overflow: hidden;
        vertical-align: middle;
        cursor: pointer;
        border-radius: 50%;
        -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        width: 47px;
        height: 47px;
    }

    .category-menu__item,
    .category-menu__search__button {
        text-align: left;
        padding: 0;
        border-radius: 5px;
        background: #e6e6e6;
        margin-right: 10px;
        border: 3px solid #e6e6e6;
    }

    button,
    html,
    input,
    select,
    textarea {
        color: #555;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.6;
    }

    .heading--h5 {
        font-size: 19px;
        margin-top: 0;
        margin-bottom: .8rem;
        font-weight: 400;
        line-height: 1.3;
        letter-spacing: 0;
    }

    .category-menu__item:hover,
    .category-menu__search__button:hover {
        background: #fff;
        box-shadow: 0 3px 9px 0 rgba(0, 0, 0, .1);
        border-color: #fff;
    }

    .category-menu__item:focus,
    .category-menu__item:hover,
    .category-menu__search__button:focus,
    .category-menu__search__button:hover {
        /* box-shadow: none; */
        text-decoration: none;
        outline: 0;
    }

    .first_div_form_type {
        display: block;
        text-decoration: none;
        color: inherit;
        position: relative;
        background: #fff;
        height: 100%;
        padding: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        color: #555;
    }

    .category__details__icon {
        margin-bottom: 7px;
    }

    .category--chameleon .category__details__text__name {
        color: currentColor;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .category__details__text__name {
        font-size: 20px;
        margin-top: 0;
        font-weight: 600;
        line-height: 1.3;
        letter-spacing: 0;
        color: #555;
        margin-bottom: 5px;
    }

    .category__details__text__price {
        color: #555;
        margin-bottom: 7px;
        font-size: 17px;
        margin-top: 0;
        font-weight: 400;
    }

    .category__description {
        color: #7a7474;
        font-size: 16px;
        line-height: 1.6;
        font-weight: 400;
        margin: 0;
    }

    .vertically_center {
        height: 330px;
        align-items: center;
        display: flex;
    }

    .border_styling {
        border-right: 4px solid #e6e6e6;
        border-bottom: 4px solid #e6e6e6;
    }

    .border_styling_sec {
        border-bottom: 4px solid #e6e6e6;
    }

    .form_icons {
        font-size: 46px;
    }

    .category:hover {
        box-shadow: 0 7px 21px 0 rgba(0, 0, 0, .1);
        -webkit-transform: scale(1.05, 1.05);
        transform: scale(1.05, 1.05);
        cursor: pointer;
    }

    .category:hover .category__details__text__name,
    .category:hover .form_icons {
        color: #3640e4;
    }

    .button_selected {
        background-color: #3640e4 !important;
        color: white !important;
        border: none !important;

    }
    .credits{
        background: #242933 !important;
        color: #1976d2 !important;
    }
    #credits i 
    {
        width: 27px;
        font-size: 19px;
        display: inline-block;
        vertical-align: middle;
        color: #1976d2;
    }
</style>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="client_dashboard.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo">
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo">
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo">
                            <!-- Light Logo text -->
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage"></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                                href="client_dashboard.php?logout=1">
                                <p style="color: #fff;margin: 0;">Logout</p>
                            </a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- mob -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="client_dashboard.php?logout=1">
                                <p style="color: #fff;margin: 0;">Logout</p>
                            </a> </li>
                        </li> 
                    </ul>
                </div>
            </nav>
        </header>
        <div id="header-desktop" ></div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Credits</h3>
                </div>
                <!-- <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div> -->
                <!-- <div>
                    <button
                        class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                            class="ti-settings text-white"></i></button>
                </div> -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="d-none d-lg-block">

                    <div class="container-fluid">
                        <div class="row">
                                <div class="container" style="width:50%">
                                    <div class="border_styling "
                                        style="width: 100%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Free Tier
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                200 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Get free 200 credits and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                $creditone = 200 ;
                                                ?>
                                                <form action="" class="form-submit" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="<?= number_format($creditone)?>">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                                        Claim Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                                <div class="container" style="width:50%">
                                    <div class="border_styling "
                                        style="width: 100%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Freelancer
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                400 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 400 credits at Rs 400 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditwo = 400 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="400">
                                                    <input type="hidden" class="money"
                                                        value="400">
                                                    <input type="hidden" class="creditname"
                                                        value="Freelancer">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            <!--  -->
                        </div>
                    </div>
                    <!--  -->
                    <div class="container-fluid">
                        <div class="row">
                                <div class="container" style="width:50%">
                                    <div class="border_styling "
                                        style="width: 100%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Startup
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                1000 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 1000 credits at Rs 1000 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditone = 200 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="1000">
                                                    <input type="hidden" class="money"
                                                        value="1000">
                                                    <input type="hidden" class="creditname"
                                                        value="Startup">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                                <div class="container" style="width:50%">
                                    <div class="border_styling "
                                        style="width: 100%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        SME
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                2000 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 2000 credits at Rs 2000 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditwo = 400 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="2000">
                                                    <input type="hidden" class="money"
                                                        value="2000">
                                                    <input type="hidden" class="creditname"
                                                        value="SME">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            <!--  -->
                        </div>
                    </div>
                </div>
                    <!-- end 5 part -->
                    <!-- 2nd form option -->
                <!--mobile  phone  -->
                <div class="d-lg-none">
                    <!-- carousel java html -->
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div  class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Free Tier
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                200 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Get free 200 credits and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                $creditone = 200 ;
                                                ?>
                                                <form action="" class="form-submit" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="<?= number_format($creditone)?>">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                                        Claim Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card  form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Freelancer
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                400 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 400 credits at Rs 400 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditwo = 400 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="400">
                                                    <input type="hidden" class="money"
                                                        value="400">
                                                    <input type="hidden" class="creditname"
                                                        value="Freelancer">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                    <!-- carousel java html -->
                        <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div  class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Startup
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                1000 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 1000 credits at Rs 1000 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditone = 200 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="1000">
                                                    <input type="hidden" class="money"
                                                        value="1000">
                                                    <input type="hidden" class="creditname"
                                                        value="Startup">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="mdi mdi-credit-card  form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        SME
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                2000 Credits
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Buy 2000 credits at Rs 2000 and find a designer with just the right skill set, and get the perfect design.
                                                </div>
                                                <?php
                                                // $creditwo = 400 ;
                                                ?>
                                                <form action="" class="form-submits" style="margin-right: 5px;margin-top: 10px;">
                                                    <input type="hidden" class="name"
                                                        value="<?= $customername ?>">
                                                    <input type="hidden" class="phone"
                                                        value="<?= $customerphone ?>">
                                                    <input type="hidden" class="email"
                                                        value="<?= $customeremail?>">
                                                    <input type="hidden" class="credit"
                                                        value="2000">
                                                    <input type="hidden" class="money"
                                                        value="2000">
                                                    <input type="hidden" class="creditname"
                                                        value="SME">
                                                    <!-- <button style="width: 100%;"
                                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                        to cart</button> -->
                                                    <a class="btn btn-primary addItemBtns" style="color:#fff;" type="button">
                                                        Buy Now
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div id="footer_client" ></div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>  
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        $(".designed_buttom").click(function () {
            var index = $(".designed_buttom").index(this);
            // alert( $(".list-group-item").index(this) );
            // alert(index);
            // $('#hiddenInputName').val(index);
            $('.designed_buttom').removeClass('button_selected');
            // $('.designed_buttom').removeClass('active');
            $(this).addClass('button_selected');
            $(this).addClass('button_selected');
            $(".forms_option").css('display', 'none');
            $(".forms_ground_option").css('display', 'none');
            element = document.getElementsByClassName('forms_option');
            element[index].style.setProperty("display", "block", "important");
            element_ground = document.getElementsByClassName('forms_ground_option');
            element_ground[index].style.setProperty("display", "block", "important");
        });

    </script>
     <script type="text/javascript">
        $("#header-desktop").load('templates/client_header.php');
        $("#footer_client").load('templates/client_footer.php');
    </script>
    <script>
    // free tier
    $(document).ready(function () {
            $('.addItemBtn').click(function (e) {
                e.preventDefault();
                // alert("Request Accepted!");
                var $form = $(this).closest(".form-submit");
                var name = $form.find(".name").val();
                var phone = $form.find(".phone").val();
                var email = $form.find(".email").val();
                var credit = $form.find(".credit").val();
                var total = parseInt(credit, 10);
               
                // alert("Request Accepted!");
                // alert(cid);
                // alert(dname);
                // alert(demail);
                // alert(dtablename);
                // alert(did);
                $.ajax({
                    type: 'POST',
                    url: './php/freetier.php',
                    dataType: "json",
                    data: {
                        "name": name,
                        "phone": phone,
                        "email": email,
                        "total": total,

                    },

                    success: function (data) {

                        if (data.status == 201) {
                            // window.dataLayer = window.dataLayer || [];
                            // window.dataLayer.push({ 'event': 'contact-form' });
                            // window.location = 'designer_dashboard.php';
                            alert("Already Claimed!");
                            // window.location = 'designer_all_requests.php';
                            // $("#contact-success-desktop").css('display','block');
                            // $("#contact-form-desktop").css('display','none');
                            // $("#ticket-id-desktop").html('#'+data.id);
                            // scrollTo(0,0);

                        }else if (data.status == 202) {
                            alert("Request Accepted!");
                            // window.location = 'designer_accepted_request.php';
                        }
                        // alert("Your form has been successfully submitted.")
                    }
                });
            });

            
        });
        // buy
        $(document).ready(function () {
            $('.addItemBtns').click(function (e) {
                e.preventDefault();
                // alert("Request Accepted!");
                var $form = $(this).closest(".form-submits");
                var name = $form.find(".name").val();
                var phone = $form.find(".phone").val();
                var creditname = $form.find(".creditname").val();
                var email = $form.find(".email").val();
                var credit = $form.find(".credit").val();
                var total = parseInt(credit, 10);
                var money = $form.find(".money").val();
                var moneytotal = parseInt(money, 10);
                // alert("total!");
                // alert(cid);
                // alert(dname);
                // alert(demail);
                // alert(dtablename);
                // alert(did);
                $.ajax({
                    type: 'POST',
                    url: './php/buycredits.php',
                    dataType: "json",
                    data: {
                        "name": name,
                        "phone": phone,
                        "email": email,
                        "money": money,
                        "total": total,
                        "creditname": creditname,
                        
                    },
                    success: function (data) {
                        if (data.status == 201) {
                            window.dataLayer = window.dataLayer || [];
                            window.dataLayer.push({'event': 'payment initiated'});
                            // alert("checked out");
                            var order_id = data.id;
                            var options = {
                                "key": "", 
                                "amount": (data.money)*100,
                                // "amount": (moneytotal)*100,
                                 // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.    
                                "currency": "INR",    
                                "name": "Credits",
                                "description": "Buying Credits",
                                // "image": "images/Finstreet-min-logo-e1577219490712.png",    
                                //"order_id": "order_9A33XWu170gUtm",//This is a sample Order ID. Create an Order using Orders API. (https://razorpay.com/docs/payment-gateway/orders/integration/#step-1-create-an-order). Refer the Checkout form table given below    
                                "handler": function (response){
                                    // alert(response.razorpay_payment_id);
                                    var razorpay_payment_id = response.razorpay_payment_id;
                                    // console.log(response);
                                    $.ajax({
                                        type:'POST',
                                        url:'php/buycredits-updated.php',
                                        dataType: "json",
                                        data:{
                                            id: data.id,
                                            total : data.total,
                                            money : data.money,
                                            name : '<?= $customername ?>',
                                            email : '<?= $customeremail ?>',
                                            creditname : data.creditname,
                                            razorpay_payment_id : razorpay_payment_id,
                                        },
                                        success:function(data){
                                            if(data.statuss == 'ok'){
                                                // window.location = "My_Courses";
                                                alert("Your payment has been successful");
                                                // window.location = "My_Courses";
                                                // $("#checkout-form").css('display','none');
                                                // $("#order-success").css('display','block');
                                                // $("#order-id").html('#'+ data.id);
                                                // window.scrollTo(0,0);
                                                // sessionStorage.useremail = $("#email-mobile").val();
                                                window.dataLayer = window.dataLayer || [];
                                                window.dataLayer.push({'event':'payment success'});
                                            }else{
                                                alert("Your payment unsuccessful please try again later");
                                                console.log("error");
                                            } 
                                        }
                                    });
                            
                                    
                                },"prefill": {
                                    "name": '<?= $customername ?>',
                                    "email": '<?= $customeremail ?>',
                                    // "phone": $("#phone-mobile").val()
                                },"notes": {
                                    // "country": $("#country-mobile").val(),
                                    // "address": $("#address-mobile").val(),
                                    // "state": $("#state-mobile").val(),
                                    // "postcode": $("#postcode-mobile").val(),
                                    // "productName": "

                                },"theme": {
                                    "color": "#2e3192"
                                }
                            };

                            var rzp1 = new Razorpay(options);
                            rzp1.open();
                            // window.dataLayer = window.dataLayer || [];
                            // window.dataLayer.push({ 'event': 'contact-form' });
                            // window.location = 'designer_dashboard.php';
                            // alert("Already Claimed!");
                            // window.location = 'designer_all_requests.php';
                            // $("#contact-success-desktop").css('display','block');
                            // $("#contact-form-desktop").css('display','none');
                            // $("#ticket-id-desktop").html('#'+data.id);
                            // scrollTo(0,0);
                        }else if (data.status == 202) {
                            alert("Request not Accepted!");
                            // window.location = 'designer_accepted_request.php';
                        }
                        // alert("Your form has been successfully submitted.")
                    }
                });
            });
        });
    </script>

</body>

</html>
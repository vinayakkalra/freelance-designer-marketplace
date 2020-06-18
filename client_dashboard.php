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
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Press Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
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
    .dashboard{
        background: #242933 !important;
        color: #1976d2 !important;
    }
    #dashboard i 
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
                    <h3 class="text-themecolor">Dashboard</h3>
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
                <div class="container">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                                        <h3 class=""><?=number_format("$customerrequests")?></h3>
                                        <h6 class="card-subtitle">Requests</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                                        <h3 class=""><?=number_format("$customercompletedrequests")?></h3>
                                        <h6 class="card-subtitle">Completed Requests</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <!-- <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                                        <h3 class="">$24561</h3>
                                        <h6 class="card-subtitle">Total Cost</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Column -->
                        <!-- Column -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                                        <h3 class=""><?=number_format("$customercredits")?></h3>
                                        <h6 class="card-subtitle">Total Credtis</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- carousel -->
                <!-- row -->

                <div class="container-fluid">
                    <div class="row">
                        <h1 class="categories-heading" style="margin: 0;">
                            What do you need designed?
                        </h1>

                    </div>
                </div>
                <div class="d-none d-lg-block">

                    <div class="container-fluid">
                        <div class="row">
                            <!--  -->
                            <section class="section-preview" style="width: 100%;">

                                <!--Carousel Wrapper-->
                                <div id="multi-item-example" class="carousel slide carousel-multi-item"
                                    data-ride="carousel" data-interval="false"
                                    style="padding-top: 30px;padding: 30px 30px;background-color: #ef5350;">

                                    <!--Controls-->

                                    <!--/.Controls-->

                                    <!--Indicators-->
                                    <!-- <ol class="carousel-indicators">
                                    <li data-target="#multi-item-example" data-slide-to="0" class=""></li>
                                    <li data-target="#multi-item-example" data-slide-to="1" class=""></li>
                                    <li data-target="#multi-item-example" data-slide-to="2" class="active"></li>
                                    </ol> -->
                                    <!--/.Indicators-->

                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox" style="margin-top: 10px;">

                                        <!--First slide-->
                                        <div class="carousel-item active">

                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom button_selected"
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                            Clothing & merchandise
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                        Web & app design
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                            Logo & identity
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                        </div>
                                        <!--/.First slide-->

                                        <!--Second slide-->
                                        <div class="carousel-item ">

                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom "
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                        Business & advertising
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom "
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                        Art & illustration
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                        Web & app design
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                            <div class="col-md-4">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design" style="width: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 22px 30px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                            Logo & identity
                                                        </span>
                                                    </div>
                                                </button>
                                            </div> -->

                                        </div>
                                        <!-- <div class="carousel-item">

                                        <div class="col-md-4">
                                            <button class="category-menu__item designed_buttom"
                                                data-category-menu="website-app-design" style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>

                                        <div class="col-md-4">
                                            <button class="category-menu__item designed_buttom"
                                                data-category-menu="website-app-design" style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>

                                        <div class="col-md-4">
                                            <button class="category-menu__item designed_buttom"
                                                data-category-menu="website-app-design" style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>

                                    </div> -->
                                        <!--/.Second slide-->

                                        <!--Third slide-->
                                        <!-- <div class="carousel-item ">

                                        <div class="col-md-4">
                                            <button class="category-menu__item" data-category-menu="website-app-design"
                                                style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="category-menu__item" data-category-menu="website-app-design"
                                                style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>

                                        <div class="col-md-4">
                                            <button class="category-menu__item" data-category-menu="website-app-design"
                                                style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                        Web &amp; app design
                                                    </span>
                                                </div>
                                            </button>
                                        </div>

                                    </div> -->
                                        <!--/.Third slide-->

                                    </div>
                                    <!--/.Slides-->
                                    <!-- controlls -->
                                    <div class="controls-top"
                                        style="display: flex;justify-content: center;margin-top: 20px;">
                                        <a class="btn-floating waves-effect waves-light" href="#multi-item-example"
                                            data-slide="prev"><i class="fa fa-arrow-left iconstylemob"></i></a>
                                        <a class="btn-floating waves-effect waves-light" href="#multi-item-example"
                                            data-slide="next"><i class="fa fa-arrow-right iconstylemob"></i></a>
                                    </div>
                                    <!-- control end -->

                                </div>
                                <!--/.Carousel Wrapper-->


                            </section>
                            <!--  -->
                        </div>
                    </div>

                    <!-- row end -->
                    <!-- caro-end -->
                    <!-- carousel java html -->
                    <div class="container forms_option">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=T-shirt';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            T-shirt
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Shirts they'll wanna keep in their closet
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=Clothing-or-apparel';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Clothing or apparel
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Apparel design that fits your style
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width:50%;height: 332px !important;">
                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=Jersey';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Jersey
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Custom jersey design that scores with fans
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=Sweatshirt-Hoodie';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Sweatshirt & Hoodie
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Sweatshirt and hoodie design that makes your brand hot
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=Merchandise';" class="border_styling "
                                        style="width: 50%;border-left: 4px solid #e6e6e6;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Merchandise
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Merchandise design to bring your product to life
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='clothing_design_request_sheet.php?form=Other-clothing-or-merchandise';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Other clothing or merchandise
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Clothing and merchandise that's more than one-size-fits all
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- carousel java end -->
                    <!-- 2nd form option -->
                    <!-- carousel java html -->
                    <div class="container forms_option " style="display: none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=Web-page';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Web page design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Engaging web pages that connect with visitors
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=Website-Redesign';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Website Redesign
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A refreshed website to better showcase your business
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width:50%;height: 332px !important;">
                                <div id="carouselExampleIndicators22" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators22" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators22" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators22" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators22" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators22" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="display: none; margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=Blog';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Blog
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Custom blog design to keep them reading
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=WordPress-theme';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        WordPress theme design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A custom WordPress theme that does everything you need it to
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=Landing-page';" class="border_styling "
                                        style="width: 50%;border-left: 4px solid #e6e6e6;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Landing page design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 349
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Landing page that gets clicks
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='web_app_design_request_sheet.php?form=App-design';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        App design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A user-friendly app that gets downloads
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                </div>
                <!-- 3 part of carusel -->
                <div class="container forms_option" style="display: none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='log_identity_design_request_sheet.php?form=Logo-design';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Logo design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                An unforgettable logo crafted for your brand
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='log_identity_design_request_sheet.php?form=Business-card';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Business card
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 169
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A unique card designed to build connections
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width:50%;height: 332px !important;">
                                <div id="carouselExampleIndicators23" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators23" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators23" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators23" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators23" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators23" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="margin-bottom: 30px;display: none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='log_identity_design_request_sheet.php?form=Stationery';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Stationery
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 219
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Letterhead and envelopes that send your brand's message
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <div class="container forms_option" style="display:none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Brochure';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Brochure
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                The printable, foldable way to engage with clients
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Booklet';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Booklet
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A booklet that tells your brand's story
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width:50%;height: 332px !important;">
                                <div id="carouselExampleIndicators24" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators24" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators24" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators24" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators24" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators24" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="margin-bottom: 30px;display:none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Pamphlet';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Pamphlet
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A pamphlet that delivers all the info you need
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Banner';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Banner
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 149
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Banners to fly your brand high
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Podcast';" class="border_styling "
                                        style="width: 50%;border-left: 4px solid #e6e6e6;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Podcast
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Custom podcast art that gets the word out
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='buisness_design_request_sheet.php?form=Signage';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Signage
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A sign or banner to get your brand noticed
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- carousel java end -->
                    <!-- 5 part -->
                    <div class="container forms_option" style="display:none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=Card-invitation';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Card or invitation
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Card or invitation design that sends a message
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=Greeting';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Greeting Card
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A greeting card that brightens the receiver's day
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width:50%;height: 332px !important;">
                                <div id="carouselExampleIndicators25" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators25" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators25" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators25" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 332px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators25" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators25" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="margin-bottom: 30px;display:none;">
                        <div class="container-fluid" style="padding: 0px;display: flex;">
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=Illustration-graphics';" class="border_styling "
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Illustration or graphics
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Stunning illustrations and graphics that will draw attention
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=3D';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        3D
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 449
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                3D digital design that takes it to the next dimension
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 50%;height: 334px !important;">
                                <div class="row" style="margin: 0px;">
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=3D-Architectural';" class="border_styling "
                                        style="width: 50%;border-left: 4px solid #e6e6e6;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        3D Architectural Rendering
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 449
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                3D architectural rendering to bring your project to life
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onClick="window.location='Art_illusion_design_request_sheet.php?form=Other-art';" class="border_styling_sec"
                                        style="width: 50%;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Other art or illustration
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 349
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Art and illustration so creative you can't categorize it
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- end 5 part -->
                    <!-- 2nd form option -->
                <!--mobile  phone  -->
                <div class="d-lg-none">
                    <div class="container-fluid">
                        <div class="row">
                            <!--  -->
                            <section class="section-preview" style="width: 100%;">

                                <!--Carousel Wrapper-->
                                <div id="multi-item-examplemob" class="carousel slide carousel-multi-item pointer-event"
                                    data-ride="carousel" data-interval="false"
                                    style="padding-top: 10px;padding: 10px 10px;background-color: #ef5350;">

                                    <!--Controls-->

                                    <!--/.Controls-->

                                    <!--Indicators-->
                                    <!-- <ol class="carousel-indicators">
                                    <li data-target="#multi-item-example" data-slide-to="0" class=""></li>
                                    <li data-target="#multi-item-example" data-slide-to="1" class=""></li>
                                    <li data-target="#multi-item-example" data-slide-to="2" class="active"></li>
                                </ol> -->
                                    <!--/.Indicators-->

                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox" style="margin-top: 10px;">

                                        <!--First slide-->
                                        <div class="carousel-item active" style="height: 100%;">
                                            <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom button_selected"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;height: 100%;margin: 0 auto;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                            Clothing & merchandise
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                            <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;margin: 0 auto;height: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5">
                                                            Design logo &amp; etc
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>

                                            <!-- <div class="col-md-4">
                                            <button class="category-menu__item designed_buttom"
                                                data-category-menu="website-app-design" style="width: 100%;">
                                                <div class="category-menu__item__text"
                                                    style="padding: 22px 30px;text-align: center;">
                                                    <span class="heading heading--h5">
                                                    Logo & identity
                                                    </span>
                                                </div>
                                            </button>
                                            </div> -->

                                        </div>
                                        <!--/.First slide-->

                                        <!--Second slide-->
                                        <div class="carousel-item " style="height: 100%;">
                                            <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;margin: 0 auto;height: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                        Logo & identity
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;margin: 0 auto;height: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                        Business & advertising
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/.Second slide-->
                                         <!--third slide-->
                                         <div class="carousel-item " style="height: 100%;">
                                            <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;margin: 0 auto;height: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                        Art & illustration
                                                        </span>
                                                    </div>
                                                </button>
                                            </div>
                                            <!-- <div class="" style="width: 50%;">
                                                <button class="category-menu__item designed_buttom"
                                                    data-category-menu="website-app-design"
                                                    style="width: 96%;margin: 0 auto;height: 100%;">
                                                    <div class="category-menu__item__text"
                                                        style="padding: 10px 10px;text-align: center;">
                                                        <span class="heading heading--h5" style="letter-spacing: 1px;">
                                                        Business & advertising
                                                        </span>
                                                    </div>
                                                </button>
                                            </div> -->
                                        </div>
                                        <!--/.third slide-->
                                    </div>
                                    <!--/.Slides-->
                                    <!-- controlls -->
                                    <div class="controls-top"
                                        style="display: flex;justify-content: center;margin-top: 20px;">
                                        <a class="btn-floating waves-effect waves-light" href="#multi-item-examplemob"
                                            data-slide="prev"><i class="fa fa-arrow-left iconstylemob"></i></a>
                                        <a class="btn-floating waves-effect waves-light" href="#multi-item-examplemob"
                                            data-slide="next"><i class="fa fa-arrow-right iconstylemob"></i></a>
                                    </div>
                                    <!-- control end -->

                                </div>
                                <!--/.Carousel Wrapper-->


                            </section>
                            <!--  -->
                        </div>
                    </div>

                    <!-- row end -->
                    <!-- caro-end -->
                    <!-- carousel java html -->
                    <div class="container forms_option" style="display: block !important;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=T-shirt';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            T-shirt
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Shirts they'll wanna keep in their closet
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=Clothing-or-apparel';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Clothing or apparel
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Apparel design that fits your style
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;margin: 10px 0;height: 300px !important;">
                                <div id="carouselExampleIndicators2mob" class="carousel slide pointer-event"
                                    data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2mob" data-slide-to="0" class="">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob" data-slide-to="1"
                                            class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob" data-slide-to="2" class="">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2mob" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2mob" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=Jersey';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Jersey
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Custom jersey design that scores with fans
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=Sweatshirt-Hoodie';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Sweatshirt &amp; Hoodie
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Sweatshirt and hoodie design that makes your brand hot
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=Merchandise';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Merchandise
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Merchandise design to bring your product to life
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='clothing_design_request_sheet.php?form=Other-clothing-or-merchandise';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Other clothing or merchandise
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    Clothing and merchandise that's more than one-size-fits all
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- carousel java end -->
                    <!-- 2nd form option -->
                    <!-- carousel java html -->
                    <div class="container forms_option" style="display: none ;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=Web-page';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Web page design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Engaging web pages that connect with visitors
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=Website-Redesign';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Website Redesign
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A refreshed website to better showcase your business
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;margin: 10px 0;height: 300px !important;">
                                <div id="carouselExampleIndicators2mob2" class="carousel slide pointer-event"
                                    data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2mob2" data-slide-to="0" class="">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob2" data-slide-to="1"
                                            class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob2" data-slide-to="2" class="">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2mob2"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2mob2"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="display: none;margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=Blog';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Blog
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Custom blog design to keep them reading
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=WordPress-theme';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        WordPress theme design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A custom WordPress theme that does everything you need it to
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=Landing-page';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Landing page design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 349
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Landing page that gets clicks
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='web_app_design_request_sheet.php?form=App-design';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        App design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 599
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A user-friendly app that gets downloads
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!--  -->
                    <!-- 3 part -->
                        <!-- carousel java html -->
                        <div class="container forms_option" style="display: none ;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='log_identity_design_request_sheet.php?form=Logo-design';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                            Logo design
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                    An unforgettable logo crafted for your brand
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='log_identity_design_request_sheet.php?form=Business-card';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Business card
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 169
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A unique card designed to build connections
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;margin: 10px 0;height: 300px !important;">
                                <div id="carouselExampleIndicators2mob23" class="carousel slide pointer-event"
                                    data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2mob23" data-slide-to="0" class="">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob23" data-slide-to="1"
                                            class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob23" data-slide-to="2" class="">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2mob23"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2mob23"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="display: none;margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='log_identity_design_request_sheet.php?form=Stationery';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Stationery
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 219
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Letterhead and envelopes that send your brand's message
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!-- 4part -->
                      <!-- 2nd form option -->
                    <!-- carousel java html -->
                    <div class="container forms_option" style="display: none ;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Brochure';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Brochure
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                The printable, foldable way to engage with clients
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Booklet';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Booklet
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A booklet that tells your brand's story
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;margin: 10px 0;height: 300px !important;">
                                <div id="carouselExampleIndicators2mob4" class="carousel slide pointer-event"
                                    data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2mob4" data-slide-to="0" class="">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob4" data-slide-to="1"
                                            class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob4" data-slide-to="2" class="">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2mob4"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2mob4"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="display: none;margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Pamphlet';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Pamphlet
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A pamphlet that delivers all the info you need
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Banner';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Banner
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 149
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Banners to fly your brand high
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Podcast';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Podcast
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Custom podcast art that gets the word out
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='buisness_design_request_sheet.php?form=Signage';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Signage
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A sign or banner to get your brand noticed
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!--  -->
                    <!-- end 4th part -->
                      <!-- 5nd form option -->
                      <!-- 5thd form option -->
                    <!-- carousel java html -->
                    <div class="container forms_option" style="display: none ;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=Card-invitation';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Card or invitation
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Card or invitation design that sends a message
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=Greeting';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Greeting Card
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 199
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                A greeting card that brightens the receiver's day
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;margin: 10px 0;height: 300px !important;">
                                <div id="carouselExampleIndicators2mob5" class="carousel slide pointer-event"
                                    data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2mob5" data-slide-to="0" class="">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob5" data-slide-to="1"
                                            class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators2mob5" data-slide-to="2" class="">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img3.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item active">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img4.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img style="height: 300px !important;" class="img-responsive"
                                                src="assets/images/big/img5.jpg" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2mob5"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2mob5"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!-- ground part -->
                    <div class="container forms_ground_option" style="display: none;margin-bottom: 30px;">
                        <div class="container-fluid" style="padding: 0px;/* display: flex; */">
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=Illustration-graphics';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Illustration or graphics
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 299
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Stunning illustrations and graphics that will draw attention
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=3D';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        3D
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 449
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                3D digital design that takes it to the next dimension
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- 2nd part caro -->
                            <div style="width: 100%;/* height: 334px !important; */">
                                <div class="row" style="margin: 0px;">
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=3D-Architectural';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        3D Architectural Rendering
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                    from CR 449
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                3D architectural rendering to bring your project to life
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- 2ndhalf -->
                                    <div onclick="window.location='Art_illusion_design_request_sheet.php?form=Other-art';" class="border_styling "
                                        style="width: 100%;padding: 0;margin: 10px 0px;">
                                        <!--  -->
                                        <div class="first_div_form_type vertically_center category"
                                            style="height: 220px;padding: 15px;">
                                            <div>
                                                <div class="category__details" style="color: #555;">
                                                    <div class="category__details__icon">
                                                        <span class="fa fa-television form_icons">
                                                        </span>
                                                    </div>
                                                    <div class="category__details__text">
                                                        <h5 class="category__details__text__name">
                                                        Other art or illustration
                                                        </h5>
                                                        <div class="category__details__text__price">
                                                            <span class="price">
                                                                <span class="price__amount">
                                                                from CR 349
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="category__description">
                                                Art and illustration so creative you can't categorize it
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- end 2nd half -->
                                </div>
                            </div>
                            <!-- end 2nd part car -->
                        </div>
                    </div>
                    <!--  -->
                    <!-- end 5th part -->
                </div>
                <!-- carousel java end -->
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Admin Press Admin by themedesigner.in
            </footer>
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
    </script>

</body>

</html>
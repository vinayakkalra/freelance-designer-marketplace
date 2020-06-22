<?php
session_start();
if (array_key_exists("logout", $_GET)) {
    // check logout value 1 or not
            
             $_COOKIE["iddashboard"] = "";  
             $_COOKIE["signupas"] = "";
            
            session_destroy();
            
            setcookie("iddashboard", "", time() - 60*60);
            setcookie("signupas", "", time() - 60*60);
            header('location:index');
            // header("Refresh:0; url=designer_dashboard");
    //        $_COOKIE["id"] = "";  
    // destroy cookie and session
        }
include("./php/config.php");
// $_SESSION['iddashboard'] $_SESSION['signupas']
if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "designer") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "designer" )) {
   
}
 else {
    // echo '<script type="text/javascript">alert("hello!");</script>';
    header('location:index');
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
                $customerrequest = $row['no_request_accepted'] ;
                $customercompletedrequest = $row['no_request_completed'] ;
                $customerredo = $row['no_of_redo'] ;
                $customercredits = $row['credits'] ;
               
                   }
                }
                else{
                    // echo "hello";
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
                 $customerrequest = $row['no_request_accepted'] ;
                 $customercompletedrequest = $row['no_request_completed'] ;
                 $customerredo = $row['no_of_redo'] ;
                 $customercredits = $row['credits'] ;
                
                    }
                 }
                 else{
                    //  echo "hello";
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
    <meta name="description" content="Accept and complete design requests and earn money.">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Designer Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/wizard/steps.css" rel="stylesheet">
    <!--alerts CSS -->
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .dropify-wrapper .dropify-message p {
        margin: 5px 0 0;
        text-align: center;
    }

    .request_show {
        display: flex;

        border-bottom: 2px solid #f3f2f0;
        padding: 20px 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .request_show:hover {
        background: linear-gradient(to right, #fff 0, #f6f6f6 35%, #f6f6f6 65%, #fff 100%);
        /* cursor: pointer; */
        box-shadow: 0 7px 21px 0 rgba(0, 0, 0, .1);
        -webkit-transform: scale(1.01, 1.01);
        transform: scale(1.01, 1.01);
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
                                href="designer_dashboard.php?logout=1">
                                <p style="color: #fff;margin: 0;">Logout</p>
                            </a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- mob -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="designer_dashboard.php?logout=1">
                                <p style="color: #fff;margin: 0;">Logout</p>
                            </a> </li>
                        </li> 
                    </ul>
                </div>
            </nav>
        </header>
        <div id="header-desktop" ></div>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">All Design Requests</h3>
                </div>
                <!-- <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">Form wizards</li>
                    </ol>
                </div> -->
                <div class="">
                    <button
                        class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                            class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- Row -->
            <div class="container">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                                        <h3 class=""><?=number_format("$customerrequest")?></h3>
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
                                        <h3 class=""><?=number_format("$customercompletedrequest")?></h3>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                                        <h3 class=""><?=number_format("$customerredo")?></h3>
                                        <h6 class="card-subtitle">Redos</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="d-none d-lg-block">
                <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                    <h1>Welcome back, <?= $customername ?></h1>
                </div>
                <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Validation wizard -->
                    <div class="row" style="display:flex;padding-bottom:20px;">
                    <!--  -->
                    <div style="width:15%">
                            <h3 style="margin-left: 10px;">Order No :</h3>
                        </div>
                        <div style="width:25%">
                            <h3>Request Information</h3>
                        </div>
                        <div style="width:20%">
                            <h3>View Request</h3>
                        </div>
                            <div style="width:20%">
                            <h3>Status</h3>
                        </div>
                            <div style="width:20%">
                            <h3>Accept Request</h3>
                        </div>
                    <!--  -->
                    </div>
                    <?php
                     $variablle = 0;
                     $variablless = 0;
                        $querysec = "SELECT * FROM `clothing_requests` WHERE status = 'Submitted'";
                        if ($resultsec = mysqli_query($conn, $querysec)) {

                        if( ! mysqli_num_rows($resultsec) ) {
                            $variablle =  $variablle + 1;
                        }else{
                            $i = 1;
                            while( $rowsec = mysqli_fetch_array($resultsec)){

                                if( $rowsec['status'] == "Submitted")
                            {  
                                ?>
                    <!--  -->
                    <div class="row request_show">
                        <div style="width:15%">
                            <h3 style="margin-left: 10px;"><?= $rowsec['orderid'] ?></h3>
                        </div>
                        <!--  -->
                        <div style="width:25%">
                            <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                    </span><?= $rowsec['project_name'] ?></p>
                            <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                    </span><?= $rowsec['type_of_design'] ?></p>
                        </div>
                        <!--  -->
                        <div style="width:20%">
                            <a class="btn btn-primary" href="designer_clothing_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                data-purpose="keep-shopping-action">
                                View Request
                            </a>
                        </div>
                        <div style="width:20%">
                            <h3><?= $rowsec['status'] ?></h3>
                        </div>
                        <div style="width:20%;text-align: center;">
                            <form action="" class="form-submit" style="margin-right: 5px;">
                                <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                <input type="hidden" class="cname"
                                    value="<?= $rowsec['name'] ?>">
                                <input type="hidden" class="cemail"
                                    value="<?= $rowsec['email'] ?>">
                                <input type="hidden" class="demail"
                                    value="<?= $customeremail?>">
                                <input type="hidden" class="dname"
                                    value="<?= $customername ?>">
                                <input type="hidden" class="did" value="<?= $customerid ?>">
                                <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                <!-- <button style="width: 100%;"
                                    class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                    to cart</button> -->
                                <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                    Accept
                                </a>
                            </form>
                           
                        </div>
                    </div>
                    <!--  -->

                    <?php
                            }
                            $i++ ;
                            }
                        }
                    }
                            $querysec = "SELECT * FROM `web_app_requests` WHERE status = 'Submitted'";
                            if ($resultsec = mysqli_query($conn, $querysec)) {

                            if( ! mysqli_num_rows($resultsec) ) {
                                $variablle =  $variablle + 1;
                            }else{
                                $i = 1;
                                while( $rowsec = mysqli_fetch_array($resultsec)){

                                    if( $rowsec['status'] == "Submitted")
                                {  
                                    ?>
                        <!--  -->
                        <div class="row request_show">
                            <div style="width:15%">
                                <h3 style="margin-left: 10px;"><?= $rowsec['orderid'] ?></h3>
                            </div>
                            <!--  -->
                            <div style="width:25%">
                                <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                        </span><?= $rowsec['project_name'] ?></p>
                                <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                        </span><?= $rowsec['type_of_design'] ?></p>
                            </div>
                            <!--  -->
                            <div style="width:20%">
                                <a class="btn btn-primary" href="designer_web_app_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                    data-purpose="keep-shopping-action">
                                    View Request
                                </a>
                            </div>
                            <div style="width:20%">
                                <h3><?= $rowsec['status'] ?></h3>
                            </div>
                            <div style="width:20%;text-align: center;">
                                <form action="" class="form-submit" style="margin-right: 5px;">
                                    <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                    <input type="hidden" class="cname"
                                        value="<?= $rowsec['name'] ?>">
                                    <input type="hidden" class="cemail"
                                        value="<?= $rowsec['email'] ?>">
                                    <input type="hidden" class="demail"
                                        value="<?= $customeremail?>">
                                    <input type="hidden" class="dname"
                                        value="<?= $customername ?>">
                                    <input type="hidden" class="did" value="<?= $customerid ?>">
                                    <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                    <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                    <!-- <button style="width: 100%;"
                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                        to cart</button> -->
                                    <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                        Accept
                                    </a>
                                </form>
                            
                            </div>
                        </div>
                        <!--  -->

                        <?php
                                }
                                $i++ ;
                                }
                            }
                        }
                                $querysec = "SELECT * FROM `logo_identity_requests` WHERE status = 'Submitted'";
                                if ($resultsec = mysqli_query($conn, $querysec)) {
            
                                if( ! mysqli_num_rows($resultsec) ) {
                                    $variablle =  $variablle + 1;
                                }else{
                                    $i = 1;
                                    while( $rowsec = mysqli_fetch_array($resultsec)){
            
                                        if( $rowsec['status'] == "Submitted")
                                    {  
                                        ?>
                            <!--  -->
                            <div class="row request_show">
                                <div style="width:15%">
                                    <h3 style="margin-left: 10px;"><?= $rowsec['orderid'] ?></h3>
                                </div>
                                <!--  -->
                                <div style="width:25%">
                                    <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                            </span><?= $rowsec['project_name'] ?></p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                            </span><?= $rowsec['type_of_design'] ?></p>
                                </div>
                                <!--  -->
                                <div style="width:20%">
                                    <a class="btn btn-primary" href="designer_logo_identity_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                        data-purpose="keep-shopping-action">
                                        View Request
                                    </a>
                                </div>
                                <div style="width:20%">
                                    <h3><?= $rowsec['status'] ?></h3>
                                </div>
                                <div style="width:20%;text-align: center;">
                                    <form action="" class="form-submit" style="margin-right: 5px;">
                                        <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                        <input type="hidden" class="cname"
                                            value="<?= $rowsec['name'] ?>">
                                        <input type="hidden" class="cemail"
                                            value="<?= $rowsec['email'] ?>">
                                        <input type="hidden" class="demail"
                                            value="<?= $customeremail?>">
                                        <input type="hidden" class="dname"
                                            value="<?= $customername ?>">
                                        <input type="hidden" class="did" value="<?= $customerid ?>">
                                        <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                        <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                        <!-- <button style="width: 100%;"
                                            class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                            to cart</button> -->
                                        <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                            Accept
                                        </a>
                                    </form>
                                
                                </div>
                            </div>
                            <!--  -->
            
                            <?php
                                    }
                                    $i++ ;
                                    }
                                }
                            }
                            $querysec = "SELECT * FROM `business_advert_requests` WHERE status = 'Submitted'";
                            if ($resultsec = mysqli_query($conn, $querysec)) {
        
                            if( ! mysqli_num_rows($resultsec) ) {
                                $variablle =  $variablle + 1;
                            }else{
                                $i = 1;
                                while( $rowsec = mysqli_fetch_array($resultsec)){
        
                                    if( $rowsec['status'] == "Submitted")
                                {  
                                    ?>
                        <!--  -->
                        <div class="row request_show">
                            <div style="width:15%">
                                <h3 style="margin-left: 10px;"><?= $rowsec['orderid'] ?></h3>
                            </div>
                            <!--  -->
                            <div style="width:25%">
                                <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                        </span><?= $rowsec['project_name'] ?></p>
                                <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                        </span><?= $rowsec['type_of_design'] ?></p>
                            </div>
                            <!--  -->
                            <div style="width:20%">
                                <a class="btn btn-primary" href="designer_business_advert_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                    data-purpose="keep-shopping-action">
                                    View Request
                                </a>
                            </div>
                            <div style="width:20%">
                                <h3><?= $rowsec['status'] ?></h3>
                            </div>
                            <div style="width:20%;text-align: center;">
                                <form action="" class="form-submit" style="margin-right: 5px;">
                                    <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                    <input type="hidden" class="cname"
                                        value="<?= $rowsec['name'] ?>">
                                    <input type="hidden" class="cemail"
                                        value="<?= $rowsec['email'] ?>">
                                    <input type="hidden" class="demail"
                                        value="<?= $customeremail?>">
                                    <input type="hidden" class="dname"
                                        value="<?= $customername ?>">
                                    <input type="hidden" class="did" value="<?= $customerid ?>">
                                    <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                    <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                    <!-- <button style="width: 100%;"
                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                        to cart</button> -->
                                    <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                        Accept
                                    </a>
                                </form>
                            
                            </div>
                        </div>
                        <!--  -->
        
                        <?php
                                }
                                $i++ ;
                                }
                            }
                        }
                        $querysec = "SELECT * FROM `art_illusion_advert_requests` WHERE status = 'Submitted'";
                        if ($resultsec = mysqli_query($conn, $querysec)) {
    
                        if( ! mysqli_num_rows($resultsec) ) {
                            $variablle =  $variablle + 1;
                        }else{
                            $i = 1;
                            while( $rowsec = mysqli_fetch_array($resultsec)){
    
                                if( $rowsec['status'] == "Submitted")
                            {  
                                ?>
                    <!--  -->
                    <div class="row request_show">
                        <div style="width:15%">
                            <h3 style="margin-left: 10px;"><?= $rowsec['orderid'] ?></h3>
                        </div>
                        <!--  -->
                        <div style="width:25%">
                            <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                    </span><?= $rowsec['project_name'] ?></p>
                            <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                    </span><?= $rowsec['type_of_design'] ?></p>
                        </div>
                        <!--  -->
                        <div style="width:20%">
                            <a class="btn btn-primary" href="designer_art_illusion_advert_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                data-purpose="keep-shopping-action">
                                View Request
                            </a>
                        </div>
                        <div style="width:20%">
                            <h3><?= $rowsec['status'] ?></h3>
                        </div>
                        <div style="width:20%;text-align: center;">
                            <form action="" class="form-submit" style="margin-right: 5px;">
                                <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                <input type="hidden" class="cname"
                                    value="<?= $rowsec['name'] ?>">
                                <input type="hidden" class="cemail"
                                    value="<?= $rowsec['email'] ?>">
                                <input type="hidden" class="demail"
                                    value="<?= $customeremail?>">
                                <input type="hidden" class="dname"
                                    value="<?= $customername ?>">
                                <input type="hidden" class="did" value="<?= $customerid ?>">
                                <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                <!-- <button style="width: 100%;"
                                    class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                    to cart</button> -->
                                <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                    Accept
                                </a>
                            </form>
                        
                        </div>
                    </div>
                    <!--  -->
    
                    <?php
                            }
                            $i++ ;
                            }
                        }
                    }
                    ?>
                    <?php
                                if( $variablle == 5  )
                                {
                            ?>
                                <div class="container " style="margin-bottom:20px;text-align: center;padding: 100px;">
                        <div class="container-fluid" style="margin-top:0px">
                            <!-- main -->
                            <div class="emptycartdiv">
    
                                <h1>No Request in the works</h1>
                                <!-- <h2>Launch a request or hire your favorite designer to get your design needs done.</h2> -->
                                <!-- <a class="btn btn-primary" href="form-wizard - Copy.php"
                                    data-purpose="keep-shopping-action">Click here</a> -->
                            </div>
                            <!--  -->
                        </div>
                    </div>
                            <?php
                            }
                            ?>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->

                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- desk end -->
            <!-- mobile -->
            <div class="d-lg-none">
                <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                    <h2>Welcome back, <?= $customername ?></h2>
                </div>
                <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Validation wizard -->
                    <div class="row" style="display:flex;padding-bottom:20px;">
                    <!--  -->
                        <div style="width:55%">
                            <h4>Request Information</h4>
                        </div>
                        <div style="width:45%">
                            <h4>View & Accept Request </h4>
                        </div>
                        <!-- <div style="width:30%">
                            <h3>Accept Request</h3>
                        </div> -->
                    </div>
                    <?php
                    $variablle = 0;
                    $variablless = 0;
                        $querysec = "SELECT * FROM `clothing_requests` WHERE  status = 'Submitted'";
                        if ($resultsec = mysqli_query($conn, $querysec)) {

                        if( ! mysqli_num_rows($resultsec) ) {
                            $variablle =  $variablle + 1;
                            ?>
                    
                    <?php
                        }else{
                            $i = 1;
                            while( $rowsec = mysqli_fetch_array($resultsec)){

                                if( $rowsec['status'] == "Submitted")
                            {  
                                ?>
                    <!--  -->
                    <div class="row request_show">
                            <div style="width:55%">
                                    <p><span style="font-size: 16px;font-weight: 700;">Order Number:
                                        </span><?= $rowsec['orderid'] ?></p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                        </span><?= $rowsec['project_name'] ?></p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                        </span><?= $rowsec['type_of_design'] ?></p>
                            </div>
                            <!--  -->
                        <div style="width:45%">
                            <p>
                                <a class="btn btn-primary" href="designer_clothing_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                    data-purpose="keep-shopping-action">
                                    View
                                </a>
                            </p>
                            <p><span style="font-size: 16px;font-weight: 700;">Status:
                                        </span><?= $rowsec['status'] ?>
                                    </p>
                            <form action="" class="form-submit" style="margin-right: 5px;">
                                <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                <input type="hidden" class="cname"
                                    value="<?= $rowsec['name'] ?>">
                                <input type="hidden" class="cemail"
                                    value="<?= $rowsec['email'] ?>">
                                <input type="hidden" class="demail"
                                    value="<?= $customeremail?>">
                                <input type="hidden" class="dname"
                                    value="<?= $customername ?>">
                                <input type="hidden" class="did" value="<?= $customerid ?>">
                                <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                <!-- <button style="width: 100%;"
                                    class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                    to cart</button> -->
                                <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                    Accept
                                </a>
                            </form>

                        </div>
                    </div>
                    <!--  -->

                    <?php
                            }
                            $i++ ;
                            }
                        }
                    }
                                    $querysec = "SELECT * FROM `web_app_requests` WHERE  status = 'Submitted'";
                                    if ($resultsec = mysqli_query($conn, $querysec)) {

                                    if( ! mysqli_num_rows($resultsec) ) {
                                        $variablle =  $variablle + 1;
                                        ?>
                                
                                <?php
                                    }else{
                                        $i = 1;
                                        while( $rowsec = mysqli_fetch_array($resultsec)){

                                            if( $rowsec['status'] == "Submitted")
                                        {  
                                            ?>
                                <!--  -->
                                <div class="row request_show">
                                        <div style="width:55%">
                                                <p><span style="font-size: 16px;font-weight: 700;">Order Number:
                                                    </span><?= $rowsec['orderid'] ?></p>
                                                <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                                    </span><?= $rowsec['project_name'] ?></p>
                                                <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                                    </span><?= $rowsec['type_of_design'] ?></p>
                                        </div>
                                        <!--  -->
                                    <div style="width:45%">
                                        <p>
                                            <a class="btn btn-primary" href="designer_web_app_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                                data-purpose="keep-shopping-action">
                                                View
                                            </a>
                                        </p>
                                        <p><span style="font-size: 16px;font-weight: 700;">Status:
                                                    </span><?= $rowsec['status'] ?>
                                                </p>
                                        <form action="" class="form-submit" style="margin-right: 5px;">
                                            <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                            <input type="hidden" class="cname"
                                                value="<?= $rowsec['name'] ?>">
                                            <input type="hidden" class="cemail"
                                                value="<?= $rowsec['email'] ?>">
                                            <input type="hidden" class="demail"
                                                value="<?= $customeremail?>">
                                            <input type="hidden" class="dname"
                                                value="<?= $customername ?>">
                                            <input type="hidden" class="did" value="<?= $customerid ?>">
                                            <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                            <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                            <!-- <button style="width: 100%;"
                                                class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                                to cart</button> -->
                                            <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                                Accept
                                            </a>
                                        </form>

                                    </div>
                                </div>
                                <!--  -->

                                <?php
                                        }
                                        $i++ ;
                                        }
                                    }
                                }
                                $querysec = "SELECT * FROM `logo_identity_requests` WHERE  status = 'Submitted'";
                                if ($resultsec = mysqli_query($conn, $querysec)) {

                                if( ! mysqli_num_rows($resultsec) ) {
                                    $variablle =  $variablle + 1;
                                    ?>
                            
                            <?php
                                }else{
                                    $i = 1;
                                    while( $rowsec = mysqli_fetch_array($resultsec)){

                                        if( $rowsec['status'] == "Submitted")
                                    {  
                                        ?>
                            <!--  -->
                            <div class="row request_show">
                                    <div style="width:55%">
                                            <p><span style="font-size: 16px;font-weight: 700;">Order Number:
                                                </span><?= $rowsec['orderid'] ?></p>
                                            <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                                </span><?= $rowsec['project_name'] ?></p>
                                            <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                                </span><?= $rowsec['type_of_design'] ?></p>
                                    </div>
                                    <!--  -->
                                <div style="width:45%">
                                    <p>
                                        <a class="btn btn-primary" href="designer_logo_identity_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                            data-purpose="keep-shopping-action">
                                            View
                                        </a>
                                    </p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Status:
                                                </span><?= $rowsec['status'] ?>
                                            </p>
                                    <form action="" class="form-submit" style="margin-right: 5px;">
                                        <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                        <input type="hidden" class="cname"
                                            value="<?= $rowsec['name'] ?>">
                                        <input type="hidden" class="cemail"
                                            value="<?= $rowsec['email'] ?>">
                                        <input type="hidden" class="demail"
                                            value="<?= $customeremail?>">
                                        <input type="hidden" class="dname"
                                            value="<?= $customername ?>">
                                        <input type="hidden" class="did" value="<?= $customerid ?>">
                                        <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                        <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                        <!-- <button style="width: 100%;"
                                            class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                            to cart</button> -->
                                        <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                            Accept
                                        </a>
                                    </form>

                                </div>
                            </div>
                            <!--  -->

                            <?php
                                    }
                                    $i++ ;
                                    }
                                }
                            }
                            $querysec = "SELECT * FROM `business_advert_requests` WHERE  status = 'Submitted'";
                            if ($resultsec = mysqli_query($conn, $querysec)) {

                            if( ! mysqli_num_rows($resultsec) ) {
                                $variablle =  $variablle + 1;
                                ?>
                        
                        <?php
                            }else{
                                $i = 1;
                                while( $rowsec = mysqli_fetch_array($resultsec)){

                                    if( $rowsec['status'] == "Submitted")
                                {  
                                    ?>
                        <!--  -->
                        <div class="row request_show">
                                <div style="width:55%">
                                        <p><span style="font-size: 16px;font-weight: 700;">Order Number:
                                            </span><?= $rowsec['orderid'] ?></p>
                                        <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                            </span><?= $rowsec['project_name'] ?></p>
                                        <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                            </span><?= $rowsec['type_of_design'] ?></p>
                                </div>
                                <!--  -->
                            <div style="width:45%">
                                <p>
                                    <a class="btn btn-primary" href="designer_business_advert_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                        data-purpose="keep-shopping-action">
                                        View
                                    </a>
                                </p>
                                <p><span style="font-size: 16px;font-weight: 700;">Status:
                                            </span><?= $rowsec['status'] ?>
                                        </p>
                                <form action="" class="form-submit" style="margin-right: 5px;">
                                    <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                    <input type="hidden" class="cname"
                                        value="<?= $rowsec['name'] ?>">
                                    <input type="hidden" class="cemail"
                                        value="<?= $rowsec['email'] ?>">
                                    <input type="hidden" class="demail"
                                        value="<?= $customeremail?>">
                                    <input type="hidden" class="dname"
                                        value="<?= $customername ?>">
                                    <input type="hidden" class="did" value="<?= $customerid ?>">
                                    <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                    <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                    <!-- <button style="width: 100%;"
                                        class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                        to cart</button> -->
                                    <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                        Accept
                                    </a>
                                </form>

                            </div>
                        </div>
                        <!--  -->

                        <?php
                                }
                                $i++ ;
                                }
                            }
                        }
                        $querysec = "SELECT * FROM `art_illusion_advert_requests` WHERE  status = 'Submitted'";
                        if ($resultsec = mysqli_query($conn, $querysec)) {

                        if( ! mysqli_num_rows($resultsec) ) {
                            $variablle =  $variablle + 1;
                            ?>
                    
                    <?php
                        }else{
                            $i = 1;
                            while( $rowsec = mysqli_fetch_array($resultsec)){

                                if( $rowsec['status'] == "Submitted")
                            {  
                                ?>
                    <!--  -->
                    <div class="row request_show">
                            <div style="width:55%">
                                    <p><span style="font-size: 16px;font-weight: 700;">Order Number:
                                        </span><?= $rowsec['orderid'] ?></p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Project Name:
                                        </span><?= $rowsec['project_name'] ?></p>
                                    <p><span style="font-size: 16px;font-weight: 700;">Design Type:
                                        </span><?= $rowsec['type_of_design'] ?></p>
                            </div>
                            <!--  -->
                        <div style="width:45%">
                            <p>
                                <a class="btn btn-primary" href="designer_art_illusion_advert_view_request.php?requestid=<?= $rowsec['orderid'] ?>"
                                    data-purpose="keep-shopping-action">
                                    View
                                </a>
                            </p>
                            <p><span style="font-size: 16px;font-weight: 700;">Status:
                                        </span><?= $rowsec['status'] ?>
                                    </p>
                            <form action="" class="form-submit" style="margin-right: 5px;">
                                <input type="hidden" class="cid" value="<?= $rowsec['orderid'] ?>">
                                <input type="hidden" class="cname"
                                    value="<?= $rowsec['name'] ?>">
                                <input type="hidden" class="cemail"
                                    value="<?= $rowsec['email'] ?>">
                                <input type="hidden" class="demail"
                                    value="<?= $customeremail?>">
                                <input type="hidden" class="dname"
                                    value="<?= $customername ?>">
                                <input type="hidden" class="did" value="<?= $customerid ?>">
                                <input type="hidden" class="dtablename" value="<?= $tablename ?>">
                                <input type="hidden" class="customertablename" value="<?= $rowsec['table_name']  ?>">
                                <!-- <button style="width: 100%;"
                                    class=" cartpopovercolor popoverbtn popoverbtn-lg popoverbtn-primary addItemBtn">Add
                                    to cart</button> -->
                                <a class="btn btn-primary addItemBtn" style="color:#fff;" type="button">
                                    Accept
                                </a>
                            </form>

                        </div>
                    </div>
                    <!--  -->

                    <?php
                            }
                            $i++ ;
                            }
                        }
                    }
                    if( $variablle == 5  )
                    {
                ?>
                    <div class="container " style="margin-bottom:20px;text-align: center;">
                        <div class="container-fluid" style="margin-top:0px;padding:0px;">
                            <!-- main -->
                            <div style="width:100%;">

                                <h2>No Request in the works</h2>
                                <!-- <h4>Launch a request or hire your favorite designer to get your design needs done.</h4> -->
                                <!-- <a class="btn btn-primary" href="form-wizard - Copy.php"
                                    data-purpose="keep-shopping-action">Click here</a> -->
                            </div>
                            <!--  -->
                        </div>
                    </div>
                        <?php
                        }
                    ?>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->

                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- mobile end -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div id="footer_designer" ></div>
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
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- <script src="assets/plugins/moment/min/moment.min.js"></script> -->
    <script src="assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- <script src="assets/plugins/wizard/steps.js"></script> -->
    <!-- ============================================================== -->
    <!-- Style switcher -->

    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript">
        $("#header-desktop").load('templates/designer_header.php');
        $("#footer_designer").load('templates/designer_footer.php');
    </script>
    <script>
         $(document).ready(function () {
            $('.addItemBtn').click(function (e) {
                e.preventDefault();
                // alert("Request Accepted!");
                var $form = $(this).closest(".form-submit");
                var cid = $form.find(".cid").val();
                var cname = $form.find(".cname").val();
                var cemail = $form.find(".cemail").val();
                var dname = $form.find(".dname").val();
                var demail = $form.find(".demail").val();
                var did = $form.find(".did").val();
                var dtablename = $form.find(".dtablename").val();
                var customertablename = $form.find(".customertablename").val();
                // alert("Request Accepted!");
                // alert(cid);
                // alert(dname);
                // alert(demail);
                // alert(dtablename);
                // alert(did);
                $.ajax({
                    type: 'POST',
                    url: './php/action.php',
                    dataType: "json",
                    data: {
                        "cid": cid,
                        "cname": cname,
                        "cemail": cemail,
                        "demail": demail,
                        "did": did,
                        "dtablename": dtablename,
                        "customertablename": customertablename,
                        "dname": dname,

                    },

                    success: function (data) {

                        if (data.status == 200) {
                            // window.dataLayer = window.dataLayer || [];
                            // window.dataLayer.push({ 'event': 'contact-form' });
                            // window.location = 'designer_dashboard.php';
                            alert("Request Accepted!");
                            window.location = 'designer_all_requests.php';
                            // $("#contact-success-desktop").css('display','block');
                            // $("#contact-form-desktop").css('display','none');
                            // $("#ticket-id-desktop").html('#'+data.id);
                            // scrollTo(0,0);

                        } else if (data.status == 201) {
                            console.log(data.error);
                            alert("Request already accepted by another designer!");
                            window.location = 'designer_dashboard.php';
                        } else if (data.status == 202) {
                            alert("Request Accepted!");
                            window.location = 'designer_accepted_request.php';
                        }
                        // alert("Your form has been successfully submitted.")
                    }
                });
            });

            
        });
    </script>
    <!-- <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script> -->
    <!-- <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script> -->
</body>

</html>
<?php
session_start();
include("./php/config.php");
// $_SESSION['iddashboard'] $_SESSION['signupas']
if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "designer") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "designer" )) {
   
}
 else {
    // echo '<script type="text/javascript">alert("hello!");</script>';
    header('location:pages-register - Copy.php');
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Press Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/wizard/steps.css" rel="stylesheet">
    <!--alerts CSS -->
    <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
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
        cursor: pointer;
        box-shadow: 0 7px 21px 0 rgba(0, 0, 0, .1);
        -webkit-transform: scale(1.01, 1.01);
        transform: scale(1.01, 1.01);
    }

    #downloadimmg:hover .downloadimmg {
        content: url("icon/icons8-download-96.png");
        width: 48px !important;
        height: 48px !important;
    }

    #downloadimmg:hover {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        background: #dce9ea;
        filter: brightness();
    }

    #downloadimmginsp:hover .downloadimmg {
        content: url("icon/icons8-download-96.png");
        width: 48px !important;
        height: 48px !important;
    }

    #downloadimmginsp:hover {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        background: #dce9ea;
        filter: brightness();
    }

    .downloadimmg {
        -webkit-transition: all 0.6s ease-in-out;
        transition: all 0.6s ease-in-out;
    }

    #downloadimmgmob:hover .downloadimmg {
        content: url("icon/icons8-download-96.png");
        width: 48px !important;
        height: 48px !important;
    }

    #downloadimmgmob:hover {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        background: #dce9ea;
        filter: brightness();
    }

    #downloadimmginspmob:hover .downloadimmg {
        content: url("icon/icons8-download-96.png");
        width: 48px !important;
        height: 48px !important;
    }

    #downloadimmginspmob:hover {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        background: #dce9ea;
        filter: brightness();
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
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo">
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo">
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo">
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage"></span>
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
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
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
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item"
                                    href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item"
                                    href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item"
                                    href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item"
                                    href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Steave Jobs</h4>
                                                <p class="text-muted">varun@gmail.com</p><a href="pages-profile.html"
                                                    class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <!-- <li class="nav-small-cap">PERSONAL</li> -->
                        <li >
                            <a href="designer_dashboard.php">
                                <i class="mdi mdi-gauge ">
                                </i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li >
                            <a href="designer_accepted_request.php">
                                <i class="mdi mdi-email ">
                                </i><span class="hide-menu">Accepted Requests </span>
                            </a>
                        </li>
                        <li>
                            <a href="designer_completed_request .php">
                                <i class="mdi mdi-file ">
                                </i><span class="hide-menu">Completed Requests </span>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="client_processing_request.php">
                                <i class="mdi mdi-email ">
                                </i><span class="hide-menu">Accepted Requests </span>
                            </a>
                        </li>
                        <li>
                            <a href="client_processing_request.php">
                                <i class="mdi mdi-email ">
                                </i><span class="hide-menu">Design Requests </span>
                            </a>
                        </li> -->

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">View Design</h3>
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="d-none d-lg-block">
                <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Validation wizard -->
                    <!-- name -->
                    <?php
                        $request_id = $_GET['request_id'];
                        // if( ! mysqli_num_rows($resultsec) ) {
                        $querysec = "SELECT * FROM `designer_completed_requests` WHERE designer_email = '".mysqli_real_escape_string($conn, $customeremail)."' AND request_id = $request_id " ;
                        if ($resultsec = mysqli_query($conn, $querysec)) 
                        {
                            if( ! mysqli_num_rows($resultsec) ) {
                                ?>
                    <div class="container " style="margin-bottom:20px;text-align: center;padding: 100px;">
                        <div class="container-fluid" style="margin-top:0px">
                            <div class="emptycartdiv">
                                <h1>Sorry! Please return back</h1>
                            </div>
                        </div>
                        <?php
                            }
                            else{
                                while( $rowsec = mysqli_fetch_array($resultsec))
                                {
                                    ?>
                        <div class="row" style="display:flex;padding-bottom:20px;">
                            <div style="width:50%">
                                <h3 style="margin-left: 40px;font-weight: 500;">Order Number : </h3>
                            </div>
                            <div style="width: 50%;">
                                <h3><?= $rowsec['request_id'] ?></h3>
                            </div>
                        </div>
                        <div class="row" style="display:flex;padding-bottom:20px;">
                            <div style="width:50%">
                                <h3 style="margin-left: 40px;font-weight: 500;">Designer Name : </h3>
                            </div>
                            <div style="width: 50%;">
                                <h3><?= $rowsec['designer_name'] ?></h3>
                            </div>
                        </div>
                        <!-- Describe your project -->
                        <div class="row" style="display:flex;padding-bottom:40px;">
                            <div style="width:50%">
                                <h3 style="margin-left: 40px;font-weight: 500;">Designer Message: </h3>
                            </div>
                            <div style="width: 50%;">
                                <h3><?= $rowsec['designer_message'] ?></h3>
                            </div>
                        </div>
                        <!-- Anything else you'd like to share with your designer? -->
                        <!-- <div class="row" style="display:flex;padding-bottom:20px;">
                            <div style="width:50%">
                                <h3 style="margin-left: 40px;font-weight: 500;">Anything else you'd like to share with
                                    your designer? </h3>
                            </div>
                            <div style="width: 50%;">
                            </div>
                        </div> -->
                        <!-- reference -->
                        <div class="row" style="display:flex;padding-bottom:20px;">
                            <div style="width:50%">

                                <h3 style="margin-left: 40px;font-weight: 500;">Designed files </h3>
                                <!-- <p style="margin-left: 40px;">Upload any files that your designer needs including your
                                    logo, photos, brand guide, fonts, copy, and any other documents.</p> -->
                                <h3 style="margin-left: 40px;font-weight: 500;">(Click image for download)</h3>
                            </div>
                            <div class="row" style="width: 50%;margin-left: 4px;">
                                <?php
                                                $no_of_ref_file = $rowsec['designed_files'] ;
                                                if($no_of_ref_file != ""){
                                                    $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                    for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                    
                                                    {
                                                        // echo $no_of_ref_files[$i];
                                                        ?>
                                <a id="downloadimmg" style="display: flex;margin: 5px;width:150px;height:150px;"
                                    id="downlloadimg" href="designed_files/<?=$no_of_ref_files[$i]?>"
                                    download="<?=$no_of_ref_files[$i]?>">
                                    <img class="downloadimmg" src="designed_files/<?=$no_of_ref_files[$i]?>" width="150x"
                                        height="150px">
                                </a>
                                <!-- <h1>heelo</h1> -->
                                <?php
                                                    }
                                                }
                                            ?>
                                <!--  -->
                            </div>
                        </div>
                        <!-- inspiration files -->
                        <?php
                                }
                            }
                            

                        }

                    ?>
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                </div>
                <!-- desk end -->
                <!-- mobile -->
                <div class="d-lg-none">
                    <div class="container-fluid" style="background-color:#fff;padding-top:20px;">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <!-- Validation wizard -->
                        <!-- name -->
                        <?php
                        $request_id = $_GET['request_id'];
                        // if( ! mysqli_num_rows($resultsec) ) {
                        $querysec = "SELECT * FROM `designer_completed_requests` WHERE designer_email = '".mysqli_real_escape_string($conn, $customeremail)."' AND request_id = $request_id " ;
                        if ($resultsec = mysqli_query($conn, $querysec)) 
                        {
                            if( ! mysqli_num_rows($resultsec) ) {
                                ?>
                        <div class="container " style="margin-bottom:20px;text-align: center;padding: 100px;">
                            <div class="container-fluid" style="margin-top:0px">
                                <div class="emptycartdiv">
                                    <h1>Sorry! Please return back</h1>
                                </div>
                            </div>
                            <?php
                            }
                            else{
                                while( $rowsec = mysqli_fetch_array($resultsec))
                                {
                                    ?>
                            <div class="row" style="display:flex;padding-bottom:20px;">
                                <div style="width:100%">
                                    <h3 style="margin-left: 20px;font-weight: 500;">Order Number : </h3>
                                </div>
                                <div style="width: 100%;">
                                    <h3 style="margin-left: 20px;"><?= $rowsec['request_id'] ?></h3>
                                </div>
                            </div>
                            <div class="row" style="display:flex;padding-bottom:20px;">
                                <div style="width:100%">
                                    <h3 style="margin-left: 20px;font-weight: 500;">Designer Name : </h3>
                                </div>
                                <div style="width: 100%;">
                                    <h3 style="margin-left: 20px;"><?= $rowsec['designer_name'] ?></h3>
                                </div>
                            </div>
                            <!-- designer message -->
                            <div class="row" style="display:flex;padding-bottom:30px;">
                                <div style="width:100%">
                                    <h3 style="margin-left: 20px;font-weight: 500;">Designer Message:</h3>
                                </div>
                                <div style="width: 100%;">
                                    <h3 style="margin-left: 20px;"><?= $rowsec['designer_message']?></h3>
                                </div>
                            </div>
                            <!-- reference -->
                            <div class="row" style="display:flex;padding-bottom:20px;">
                                <div style="width:100%">

                                    <h3 style="margin-left: 20px;font-weight: 500;">Designed files </h3>
                                    <!-- <p style="margin-left: 20px;">Upload any files that your designer needs including
                                        your logo, photos, brand guide, fonts, copy, and any other documents.</p> -->
                                    <h3 style="margin-left: 20px;font-weight: 500;">(Click image for download)</h3>
                                </div>
                                <div class="row" style="width: 100%;margin-left: 4px;">
                                    <?php
                                                $no_of_ref_file = $rowsec['designed_files'] ;
                                                if($no_of_ref_file != ""){
                                                    $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                    for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                    
                                                    {
                                                        // echo $no_of_ref_files[$i];
                                                        ?>
                                    <a id="downloadimmgmob" style="display: flex;margin: 5px;width:150px;height:150px;"
                                        id="downlloadimg" href="designed_files/<?=$no_of_ref_files[$i]?>"
                                        download="<?=$no_of_ref_files[$i]?>">
                                        <img class="downloadimmg" src="designed_files/<?=$no_of_ref_files[$i]?>"
                                            width="150x" height="150px">
                                    </a>
                                    <!-- <h1>heelo</h1> -->
                                    <?php
                                                    }
                                                }
                                            ?>
                                    <!--  -->
                                </div>
                            </div>
                            <?php
                                }
                            }
                            

                        }

                    ?>
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
            <script src="../assets/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
            <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="js/jquery.slimscroll.js"></script>
            <!--Wave Effects -->
            <script src="js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="js/sidebarmenu.js"></script>
            <!--stickey kit -->
            <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
            <!--Custom JavaScript -->
            <script src="js/custom.min.js"></script>
            <!-- <script src="../assets/plugins/moment/min/moment.min.js"></script> -->
            <script src="../assets/plugins/wizard/jquery.steps.min.js"></script>
            <script src="../assets/plugins/wizard/jquery.validate.min.js"></script>
            <!-- Sweet-Alert  -->
            <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
            <!-- <script src="../assets/plugins/wizard/steps.js"></script> -->
            <!-- ============================================================== -->
            <!-- Style switcher -->

            <!-- ============================================================== -->
            <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
            <!-- <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script> -->
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
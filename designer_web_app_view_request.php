<?php
session_start();
include("./php/config.php");
// $_SESSION['iddashboard'] $_SESSION['signupas']
if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "designer") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "designer" )) {
   
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
    <meta name="description" content="Accept and complete design requests and earn money.">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Web & app design View Request</title>
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

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">View Request</h3>
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
                        $request_id = $_GET['requestid'];
                        // echo $request_id ;
                        // if( ! mysqli_num_rows($resultsec) ) {
                        $querysec = "SELECT * FROM `web_app_requests` WHERE orderid = '".mysqli_real_escape_string($conn, $request_id)."'  order by id desc limit 1" ;
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
                                    
                                    if(($rowsec['type_of_design'] == "Web page design") or ($rowsec['type_of_design'] == "Website Redesign") or ($rowsec['type_of_design'] == "Blog") or ($rowsec['type_of_design'] == "WordPress theme design") or ($rowsec['type_of_design'] == "Landing page design")){

                                        ?>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Order Number : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['orderid'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Name : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['name'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- project name -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Name your project : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['project_name'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- type of design need  :  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What type of design do you need? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['type_of_design'] ?></h3>
                                            </div>
                                        </div>
                                        <?php
                                        if($rowsec['redo_status'] == "Redo"){
                                        ?>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What is it you Want to change? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['what_u_want_change'] ?></h3>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <!--How will your design be used?  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">How will your design be used? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['how_design_can_be_used'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- organisation name  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What is your organization or website name? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_is_your_organization_or_website_name'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- target audience -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Briefly describe what you do and your target audience. : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['Briefly_describe_what_you_do_and_your_target_audience'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- existing website -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">If you have an existing website, please list it here. : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['If_you_have_an_existing_website_please_list_it_here'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- select industry -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Select your industry : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['select_industry'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- style -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What ideas do you have for the style/theme of your website design? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_ideas_do_you_have_for_the_style/theme_of_your_product'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- website address -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Website address : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['Website_address'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- what u like about this site -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What do you like about this site? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_do_you_like_about_this_site'] ?></h3>
                                            </div>
                                        </div>
                                       <!-- how many pages -->
                                       <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">How many pages do you need designed for your website?  : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['How_many_pages_do_you_need_designed_for_your_product'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- on each page -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What would you like on each page? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_would_you_like_on_each_page'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- list colors -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">List any colors, themes or other elements that you don't want included : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['List_any_colors_themes_or_other_elements_include'] ?></h3>
                                            </div>
                                        </div>
                                        <!--communicated -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Is there anything else you would like to communicate to the designers? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['communicate'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- inspiration files -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                
                                                <h3 style="margin-left: 40px;font-weight: 500;">Do you have any images, sketches or documents that might be helpful? </h3>
                                                <p style="margin-left: 40px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</p>
                                                <h3 style="margin-left: 40px;font-weight: 500;">(Click image for download)</h3>
                                            </div>
                                            <div class="row" style="width: 50%;margin-left: 4px;">
                                                <?php
                                                                $no_of_ref_file = $rowsec['inspiration_files'] ;
                                                                if($no_of_ref_file != ""){
                                                                    $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                                    for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                                    
                                                                    {
                                                                        // echo $no_of_ref_files[$i];
                                                                        ?>
                                                <a id="downloadimmginsp" style="display: flex;margin: 5px;width:150px;height:150px;"
                                                    id="downlloadimg" href="upload_files/<?=$no_of_ref_files[$i]?>"
                                                    download="<?=$no_of_ref_files[$i]?>">
                                                    <img class="downloadimmg" src="upload_files/<?=$no_of_ref_files[$i]?>" width="150x"
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
                                        <?php
                                    }elseif(($rowsec['type_of_design'] == "App design") ){

                                        ?>
                                       <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Order Number : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['orderid'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Name : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['name'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- project name -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Name your project : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['project_name'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- type of design need  :  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What type of design do you need? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['type_of_design'] ?></h3>
                                            </div>
                                        </div>
                                        <?php
                                        if($rowsec['redo_status'] == "Redo"){
                                        ?>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What is it you Want to change? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['what_u_want_change'] ?></h3>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <!--How will your design be used?  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">How will your design be used? </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['how_design_can_be_used'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- app does  -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Briefly describe what your app does </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['Briefly_describe_what_you_do_and_your_target_audience'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- select industry -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Select your industry : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['select_industry'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- website -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">If you have an existing website, please list it here. : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['If_you_have_an_existing_website_please_list_it_here'] ?></h3>
                                            </div>
                                        </div>
                                         <!--style -->
                                         <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What ideas do you have for the style/theme of your website design? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_ideas_do_you_have_for_the_style/theme_of_your_product'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- website -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Website address : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['Website_address'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- about site -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What do you like about this site? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_do_you_like_about_this_site'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- app name -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What is the name of your app? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['app_name'] ?></h3>
                                            </div>
                                        </div>
                                       <!-- how many screens -->
                                       <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">How many screens do you want designed?  : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['How_many_pages_do_you_need_designed_for_your_product'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- Describe screen -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Describe the screens and the main work flows for your app : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['What_would_you_like_on_each_page'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- device name -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">What device do you need designs for : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['device_type'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- avoid -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Is there anything that should be avoided? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['Is_there_anything_that_should_be_avoided'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- communicate-->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                                                <h3 style="margin-left: 40px;font-weight: 500;">Is there anything else you would like to communicate to the designers? : </h3>
                                            </div>
                                            <div style="width: 50%;">
                                                <h3><?= $rowsec['communicate'] ?></h3>
                                            </div>
                                        </div>
                                        <!-- inspiration files -->
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                            <div style="width:50%">
                
                                                <h3 style="margin-left: 40px;font-weight: 500;">Do you have any images, sketches or documents that might be helpful? </h3>
                                                <p style="margin-left: 40px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</p>
                                                <h3 style="margin-left: 40px;font-weight: 500;">(Click image for download)</h3>
                                            </div>
                                            <div class="row" style="width: 50%;margin-left: 4px;">
                                                <?php
                                                                $no_of_ref_file = $rowsec['inspiration_files'] ;
                                                                if($no_of_ref_file != ""){
                                                                    $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                                    for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                                    
                                                                    {
                                                                        // echo $no_of_ref_files[$i];
                                                                        ?>
                                                <a id="downloadimmginsp" style="display: flex;margin: 5px;width:150px;height:150px;"
                                                    id="downlloadimg" href="upload_files/<?=$no_of_ref_files[$i]?>"
                                                    download="<?=$no_of_ref_files[$i]?>">
                                                    <img class="downloadimmg" src="upload_files/<?=$no_of_ref_files[$i]?>" width="150x"
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
                                        <?php
                                    }
                                        ?>
                                    <!-- common field -->
                                    <!-- Due Date -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:50%">
                                            <h3 style="margin-left: 40px;font-weight: 500;">Due Date : </h3>
                                        </div>
                                        <div style="width: 50%;">
                                            <h3><?= $rowsec['Due_Date'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- What's your budget?  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:50%">
                                            <h3 style="margin-left: 40px;font-weight: 500;">What's your budget? </h3>
                                        </div>
                                        <div style="width: 50%;">
                                            <h3><?= $rowsec['credits_pay'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Link to any inspiration on the Web -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:50%">
                                            <h3 style="margin-left: 40px;font-weight: 500;">Image Size :
                                            </h3>
                                        </div>
                                        <div style="width: 50%;">
                                            <h3><?= $rowsec['Image_Size'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Your Page Url  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:50%">
                                            <h3 style="margin-left: 40px;font-weight: 500;">Image Format : </h3>
                                        </div>
                                        <div style="width: 50%;">
                                            <h3><?= $rowsec['Image_Format'] ?></h3>
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
                        $request_id = $_GET['requestid'];
                        // if( ! mysqli_num_rows($resultsec) ) {
                            $querysec = "SELECT * FROM `web_app_requests` WHERE orderid = '".mysqli_real_escape_string($conn, $request_id)."'  order by id desc limit 1" ;
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
                                    if(($rowsec['type_of_design'] == "Web page design") or ($rowsec['type_of_design'] == "Website Redesign") or ($rowsec['type_of_design'] == "Blog") or ($rowsec['type_of_design'] == "WordPress theme design") or ($rowsec['type_of_design'] == "Landing page design")){
                                        ?>
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Order Number : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['orderid'] ?></h3>
                                        </div>
                                    </div>
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Name : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['name'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- project name -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Name your project : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['project_name'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- type of design need  :  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What type of design do you need?
                                            </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['type_of_design'] ?></h3>
                                        </div>
                                    </div>
                                    <!--How will your design be used?  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">How will your design be used? </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['how_design_can_be_used'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- redo -->
                                    <?php
                                    if($rowsec['redo_status'] == "Redo"){
                                    ?>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What is it you Want to change?  : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['what_u_want_change']?></h3>
                                        </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- organisation name -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What is your organization or website name? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['What_is_your_organization_or_website_name'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- target name -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Briefly describe what you do and your target audience. : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['Briefly_describe_what_you_do_and_your_target_audience'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- existing website -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">If you have an existing website, please list it here : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['If_you_have_an_existing_website_please_list_it_here'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- select industry -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Select your industry : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['select_industry']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- style -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What ideas do you have for the style/theme of your website design? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['What_ideas_do_you_have_for_the_style/theme_of_your_product'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- Website address-->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Website address : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['Website_address'] ?></h3>
                                        </div>
                                    </div>
                                     <!-- What do you like about this site? -->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What do you like about this site? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?=$rowsec['What_do_you_like_about_this_site'] ?></h3>
                                        </div>
                                    </div>
                                     <!-- How many pages do you need designed for your website?-->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">How many pages do you need designed for your website? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['How_many_pages_do_you_need_designed_for_your_product']  ?></h3>
                                        </div>
                                    </div>
                                     <!-- What would you like on each page? -->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What would you like on each page? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['What_would_you_like_on_each_page']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- List any colors -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">List any colors, themes or other elements that you don't want included : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['List_any_colors_themes_or_other_elements_include']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- communicate -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Is there anything else you would like to communicate to the designers?  :
                                            </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['communicate']?></h3>
                                        </div>
                                    </div>
                                    <!-- inspiration files -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">

                                            <h3 style="margin-left: 20px;font-weight: 500;">Do you have any images, sketches or documents that might be helpful? </h3>
                                            <p style="margin-left: 20px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</p>
                                            <h3 style="margin-left: 20px;font-weight: 500;">(Click image for download)</h3>
                                        </div>
                                        <div class="row" style="width: 100%;margin-left: 4px;">
                                            <?php
                                                        $no_of_ref_file = $rowsec['inspiration_files'] ;
                                                        if($no_of_ref_file != ""){
                                                            $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                            for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                            
                                                            {
                                                                // echo $no_of_ref_files[$i];
                                                                ?>
                                            <a id="downloadimmginspmob"
                                                style="display: flex;margin: 5px;width:150px;height:150px;" id="downlloadimg"
                                                href="upload_files/<?=$no_of_ref_files[$i]?>"
                                                download="<?=$no_of_ref_files[$i]?>">
                                                <img class="downloadimmg" src="upload_files/<?=$no_of_ref_files[$i]?>"
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
                                    }elseif(($rowsec['type_of_design'] == "App design")){
                                        ?>
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Order Number : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['orderid'] ?></h3>
                                        </div>
                                    </div>
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Name : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['name'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- project name -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Name your project : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['project_name'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- type of design need  :  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What type of design do you need?
                                            </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['type_of_design'] ?></h3>
                                        </div>
                                    </div>
                                    <!--How will your design be used?  -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">How will your design be used? </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['how_design_can_be_used'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- redo -->
                                    <?php
                                    if($rowsec['redo_status'] == "Redo"){
                                    ?>
                                        <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What is it you Want to change?  : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['what_u_want_change']?></h3>
                                        </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- app does-->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Briefly describe what your app does : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['Briefly_describe_what_you_do_and_your_target_audience']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- select industry -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Select your industry : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['select_industry']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- existing website -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">If you have an existing website, please list it here : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['If_you_have_an_existing_website_please_list_it_here'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- style -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What ideas do you have for the style/theme of your website design? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['What_ideas_do_you_have_for_the_style/theme_of_your_product'] ?></h3>
                                        </div>
                                    </div>
                                     <!-- Website address-->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Website address : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['Website_address'] ?></h3>
                                        </div>
                                    </div>
                                     <!-- What do you like about this site? -->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What do you like about this site? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?=$rowsec['What_do_you_like_about_this_site'] ?></h3>
                                        </div>
                                    </div>
                                    <!-- What is the name of your app? -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What is the name of your app? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['app_name'] ?></h3>
                                        </div>
                                    </div>
                                     <!-- How many pages do you need designed for your website?-->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">How many screens do you want designed? : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['How_many_pages_do_you_need_designed_for_your_product']  ?></h3>
                                        </div>
                                    </div>
                                     <!-- Describe the screens and the main work flows for your app -->
                                     <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Describe the screens and the main work flows for your app : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['What_would_you_like_on_each_page']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- What device do you need designs for -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">What device do you need designs for : </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['device_type']  ?></h3>
                                        </div>
                                    </div>
                                    <!-- avoid -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Is there anything that should be avoided?  :
                                            </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['Is_there_anything_that_should_be_avoided']?></h3>
                                        </div>
                                    </div>
                                    <!-- communicate -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">
                                            <h3 style="margin-left: 20px;font-weight: 500;">Is there anything else you would like to communicate to the designers?  :
                                            </h3>
                                        </div>
                                        <div style="width: 100%;">
                                            <h3 style="margin-left: 20px;"><?= $rowsec['communicate']?></h3>
                                        </div>
                                    </div>
                                    <!-- inspiration files -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                        <div style="width:100%">

                                            <h3 style="margin-left: 20px;font-weight: 500;">Do you have any images, sketches or documents that might be helpful? </h3>
                                            <p style="margin-left: 20px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</p>
                                            <h3 style="margin-left: 20px;font-weight: 500;">(Click image for download)</h3>
                                        </div>
                                        <div class="row" style="width: 100%;margin-left: 4px;">
                                            <?php
                                                        $no_of_ref_file = $rowsec['inspiration_files'] ;
                                                        if($no_of_ref_file != ""){
                                                            $no_of_ref_files = explode("++--",$no_of_ref_file);
                                                            for ($i = 0;$i < sizeof($no_of_ref_files);$i++ )
                                                            
                                                            {
                                                                // echo $no_of_ref_files[$i];
                                                                ?>
                                            <a id="downloadimmginspmob"
                                                style="display: flex;margin: 5px;width:150px;height:150px;" id="downlloadimg"
                                                href="upload_files/<?=$no_of_ref_files[$i]?>"
                                                download="<?=$no_of_ref_files[$i]?>">
                                                <img class="downloadimmg" src="upload_files/<?=$no_of_ref_files[$i]?>"
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
                                    ?>
                                    <!-- common fields  -->
                                    <!-- Due Date -->
                                    <div class="row" style="display:flex;padding-bottom:20px;">
                                       <div style="width:100%">
                                           <h3 style="margin-left: 20px;font-weight: 500;">Due Date : </h3>
                                       </div>
                                       <div style="width: 100%;">
                                           <h3 style="margin-left: 20px;"><?= $rowsec['Due_Date'] ?></h3>
                                       </div>
                                   </div>
                                   <!-- What's your budget?  -->
                                   <div class="row" style="display:flex;padding-bottom:20px;">
                                       <div style="width:100%">
                                           <h3 style="margin-left: 20px;font-weight: 500;">What's your budget? </h3>
                                       </div>
                                       <div style="width: 100%;">
                                           <h3 style="margin-left: 20px;"><?= $rowsec['credits_pay'] ?></h3>
                                       </div>
                                   </div>
                                   <!-- Image Size -->
                                   <div class="row" style="display:flex;padding-bottom:20px;">
                                       <div style="width:100%">
                                           <h3 style="margin-left: 20px;font-weight: 500;">Image Size : </h3>
                                       </div>
                                       <div style="width: 100%;">
                                           <h3 style="margin-left: 20px;"><?= $rowsec['Image_Size']  ?></h3>
                                       </div>
                                   </div>
                                   <!-- Image Format -->
                                   <div class="row" style="display:flex;padding-bottom:20px;">
                                       <div style="width:100%">
                                           <h3 style="margin-left: 20px;font-weight: 500;">Image Format : </h3>
                                       </div>
                                       <div style="width: 100%;">
                                           <h3 style="margin-left: 20px;"><?= $rowsec['Image_Format'] ?></h3>
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
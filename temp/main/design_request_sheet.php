<?php
session_start();
include("./php/config.php");
// $_SESSION['iddashboard'] $_SESSION['signupas']
if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "client") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "client" )) {
   
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
<?php
 $error="";
 if (array_key_exists("submit", $_POST)) {
      // connection.php for connecting to database

    //   include("php/config.php");
    // $conn= new mysqli("localhost","root","","content_engine");
    // if($conn->connect_error){
    //     die("connection Failed" .$conn->connect_error);
    // }

      $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    // $images = implode(",", $items);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $projectname = $_POST['projectname'];
    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $maintagline = $_POST['maintagline'];
    $agegroup = $_POST['agegroup'];
    $imagesize = $_POST['imagesize'];
    $imageformat = $_POST['imageformat'];
    $projectdescription = $_POST['projectdescription'];
    $duedate = $_POST['duedate'];
    $budget = $_POST['budget'];
    $inspirationlink = $_POST['inspirationlink'];
    $yourpageurl = $_POST['yourpageurl'];
    $messageconvey = $_POST['messageconvey'];
    $status = "processing";
    $error="";
    // check file uploaded or not
    $total = count($_FILES['images']['name']);


// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
$tmpFilePath = $_FILES['images']['tmp_name'][$i];

//Make sure we have a file path
if ($tmpFilePath != ""){
$img_folder = "upload_files/";
$img = $_FILES['images']['name'][$i];
$img_loc = $_FILES['images']['tmp_name'][$i];
// $img = $_FILES['images']['name'][$i];
// check upload file
if(file_exists("upload_files/" . $img)){
    $error = $img . " is already exists.<br>".$error;
    // echo $upload . " is already exists.";
}

}
}
// check inspiration file uploaded or not
$total = count($_FILES['refimages']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

$tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
//Make sure we have a file path
if ($tmpFilePath != ""){
$img_folder = "upload_files/";
$img = $_FILES['refimages']['name'][$i];
$img_loc = $_FILES['refimages']['tmp_name'][$i];
// $img = $_FILES['images']['name'][$i];
if(file_exists("upload_files/" . $img)){
    $error = $img . " is already exists.<br>".$error;
    // echo $upload . " is already exists.";
}
}
}

if ($error != "") {

    $error = "<p>There were error(s) in your form:</p>".$error;
    
}
     else
{
        // upload
$total = count($_FILES['images']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

$tmpFilePath = $_FILES['images']['tmp_name'][$i];
//Make sure we have a file path
if ($tmpFilePath != ""){
$img_folder = "upload_files/";
$img = $_FILES['images']['name'][$i];
$items[] = $_FILES['images']['name'][$i];
$img_loc = $_FILES['images']['tmp_name'][$i];
// $img = $_FILES['images']['name'][$i];
// check upload file
if(move_uploaded_file($img_loc,$img_folder.$img))
{
    ?>
<script>alert('file uploaded')</script>
<?php
}
else 
{
    ?>
<script>alert('file not uploaded')</script>
<?php
}


}
}
if (!empty($items)){
$refimages = implode("++--", $items);
}else{
$refimages = "";
}
// upload reference file end
// upload inspirational file
$total = count($_FILES['refimages']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

$tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
//Make sure we have a file path
if ($tmpFilePath != ""){
$img_folder = "upload_files/";
$img = $_FILES['refimages']['name'][$i];
$itemss[] = $_FILES['refimages']['name'][$i];
$img_loc = $_FILES['refimages']['tmp_name'][$i];
// $img = $_FILES['images']['name'][$i];
if(move_uploaded_file($img_loc,$img_folder.$img))
{
    ?>
<script>alert('file uploaded')</script>
<?php
}
else 
{
    ?>
<script>alert('file not uploaded')</script>
<?php
}
}
}
if (!empty($itemss)){
$inspimages = implode("++--", $itemss);
}else{
$inspimages = "";
}
// upload inspiration img end
$query = "INSERT INTO `requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_be_used`,`Main_tagline`,`Age_Group`,`Image_Size`,`Image_Format`,`Describe_your_project`,`Due_Date`,`credits_pay`,`link_to_any_inspiration`,`Your_Page_Url`,`message_convey`,`reference_files`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $maintagline)."','".mysqli_real_escape_string($conn, $agegroup)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $projectdescription)."','".mysqli_real_escape_string($conn, $duedate)."','".mysqli_real_escape_string($conn, $budget)."','".mysqli_real_escape_string($conn, $inspirationlink)."','".mysqli_real_escape_string($conn, $yourpageurl)."','".mysqli_real_escape_string($conn, $messageconvey)."','".mysqli_real_escape_string($conn, $refimages)."','".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."')";

// $query = "INSERT INTO `requests` (`name`, `email`,`phone`, `project_name`,`type_of_design`, `how_design_be_used`,`Main_tagline` , `Age_Group`, `Image_Size`,`Image_Format`,`Describe_your_project`,`Due_Date`,`credits_pay`,`link_to_any_inspiration`,`Your_Page_Url`,`message_convey`,`reference_files`,`inspiration_files`,`status` , `from_ip`,`from_browser`,`time`) VALUES ('".mysqli_real_escape_string($conn, $name)."', '".mysqli_real_escape_string($conn, $email)."','".mysqli_real_escape_string($conn, $phone)."','".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $maintagline)."','".mysqli_real_escape_string($conn, $agegroup)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $projectdescription)."','".mysqli_real_escape_string($conn, $duedate)."','".mysqli_real_escape_string($conn, $budget)."','".mysqli_real_escape_string($conn, $inspirationlink)."','".mysqli_real_escape_string($conn, $yourpageurl)."','".mysqli_real_escape_string($conn, $messageconvey)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $images)."','".mysqli_real_escape_string($conn, $refimages)."','$from_ip','$from_browser','$date_now')";


if (!mysqli_query($conn, $query)) {

    ?>
<script>alert('error in form')</script>
<?php

} else {
    ?>
<script>
alert('form submitted successfully!');
 window.location = 'client_processing_request.php';</script>
<?php
// header('location:client_processing_request.php');

}

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
                        <li>
                            <a href="client_dashboard.php">
                                <i class="mdi mdi-gauge ">
                                </i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="design_request_sheet.php">
                                <i class="mdi mdi-file ">
                                </i><span class="hide-menu">Design Request Sheet </span>
                            </a>
                        </li>
                        <li >
                            <a href="client_processing_request.php">
                                <i class="mdi mdi-email ">
                                </i><span class="hide-menu">Processing Requests </span>
                            </a>
                        </li>
                        <li>
                            <a href="client_accepted_request.php">
                                <i class="mdi mdi-email ">
                                </i><span class="hide-menu">Accepted Requests </span>
                            </a>
                        </li>
                        <li>
                            <a href="client_completed_request.php">
                                <i class="mdi mdi-email ">
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
                    <h3 class="text-themecolor">Design Request Form</h3>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Design Request Form</h4> -->
                                <!-- <h6 class="card-subtitle">You can us the validation like what we did</h6> -->
                                <!--  -->
                                <div class="container">
                                    <div class="container-fluid" id="homePageContainer" style="padding: 0;">
                                        <div class="container" style="width: 100%;">
                                            <div id="error">
                                                <?php if ($error!="") 
                            {
                                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                            } 
                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <form id="validations" method="post" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Step 1</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Name : <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" value="<?= $customername ?>"
                                                        class="form-control required" id="wfirstName2" name="name"
                                                        readonly> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2"> Email Address : <span
                                                            class="danger">*</span> </label>
                                                    <input type="email" value="<?= $customeremail ?>"
                                                        class="form-control required" id="wemailAddress2" name="email"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wphoneNumber2">Phone Number :</label>
                                                    <input type="number" value="<?= $customerphone ?>"
                                                        class="form-control" name="phone" id="wphoneNumber2" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectname"> Name your project : <span
                                                            class="danger">*</span> </label>
                                                    <input placeholder="E.g. Packaging for an organic juice company"
                                                        type="text" class="form-control required" id="projectname"
                                                        name="projectname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required"
                                                        name="designtype" id="designtype">
                                                        <optgroup label="Clothing & merchandise">
                                                            <option value="T-shirt">T-shirt</option>
                                                            <option value="Clothing or apparel">Clothing or apparel
                                                            </option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Sweatshirt & Hoodie">Sweatshirt & Hoodie
                                                            </option>
                                                            <option value="Merchandise">Merchandise</option>
                                                            <option value="Other clothing or merchandise">Other clothing
                                                                or merchandise</option>
                                                        </optgroup>
                                                        <optgroup label="Design logo & etc">
                                                            <option value="Logo design">Logo design</option>
                                                            <option value="Invitation">Invitation</option>
                                                            <option value="3D">3D</option>
                                                            <option value="Vector art">Vector art
                                                            </option>
                                                            <option value="Brochure">Brochure</option>
                                                            <option value="Pamphlet">Pamphlet</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designused">How will your design be used? <span
                                                            class="danger">*</span> </label>
                                                    <input
                                                        placeholder="E.g. Billboard, Facebook campaign, bookcover etc."
                                                        type="text" class="form-control required" id="designused"
                                                        name="designused">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Step 2</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="maintagline">Main tagline <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="maintagline"
                                                        name="maintagline">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="agegroup">Age Group<span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control " id="agegroup"
                                                        name="agegroup">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="imagesize"> Image Size : <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="imagesize"
                                                        name="imagesize">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="imageformat"> Image Format : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="imageformat"
                                                        name="imageformat">
                                                        <option value="JPEG">JPEG</option>
                                                        <option value="PNG">PNG
                                                        </option>
                                                        <option value="PDF">PDF</option>
                                                        <option value="Other:">Other:
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectdescription">Describe your project :</label>
                                                    <textarea name="projectdescription" id="projectdescription" rows="6"
                                                        class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Step 3</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="duedate">Due Date : <span
                                                            class="danger">*</span></label>
                                                    <input type="date" class="form-control required" name="duedate"
                                                        id="duedate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- <label for="webUrl3">Company URL :</label>
                                                    <input type="" class="form-control required" id="webUrl3"
                                                        name="webUrl3"> 
                                                    </div> -->
                                                    <label for="budget">What's your budget? : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="budget"
                                                        name="budget" value="10" min="10" max="10" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inspirationlink">Link to any inspiration on the Web<span
                                                            class="danger">*</span> </label>
                                                    <input placeholder="https://pinterest.com/99designs/" type="text"
                                                        class="form-control " id="inspirationlink"
                                                        name="inspirationlink">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="yourpageurl">Your Page Url :<span
                                                            class="danger">*</span>
                                                    </label>
                                                    <input placeholder="https://pinterest.com/99designs/" type="text"
                                                        class="form-control " id="yourpageurl" name="yourpageurl">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="messageconvey">Anything else you'd like to share
                                                        with your designer? :</label>
                                                    <textarea name="messageconvey" id="messageconvey" rows="6"
                                                        class="form-control "></textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Step 4</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4 class="card-title">Add reference files</h4>
                                                    <label style="height: 72px;">Upload any
                                                        files that your
                                                        designer needs including your logo, photos, brand guide,
                                                        fonts, copy, and any other documents.</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="images[]" multiple>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h4 class="card-title">Add inspiration files</h4>
                                                    <label style="height: 72px;">Upload any
                                                        designs or imagery you like so your designer gets an idea
                                                        of the style you're looking for.</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="refimages[]" multiple>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button
                                                class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                                name="submit" type="submit">Submit</button>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script>
        //script fot submit mob form
        $("#validations").submit(function (e) {
            var error = "";
            function validateEmail() {
                var email = $("#wemailAddress2").val();
                var emailReg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                if (emailReg.test(email)) {
                    return true;
                } else {
                    return false;
                }
            }
            if ($("#wfirstName2").val() == "") {
                $("#wfirstName2").css('border-color', 'red');
                $("#wfirstName2").css('border-width', '2px');
                $("#wfirstName2").attr('placeholder', 'Required Field');
                error = error + 'name';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }

            if ($("#wphoneNumber2").val() == "") {
                $("#wphoneNumber2").css('border-color', 'red');
                $("#wphoneNumber2").css('border-width', '2px');
                $("#wphoneNumber2").attr('placeholder', 'Required Field');
                error = error + 'Phone';
            } else {
                // $("#wemailAddress2").css('border-color','white');
                // $("#wemailAddress2").css('border-width','1px');
            }
            if (validateEmail()) {
                //   $("#wemailAddress2").css('border-color','white');
                // $("#wemailAddress2").css('border-width','1px');

            } else {
                $("#wemailAddress2").css('border-color', 'red');
                $("#wemailAddress2").css('border-width', '2px');
                $("#wemailAddress2").attr('placeholder', 'Required Field');
                error = error + 'email';
            }
            if ($("#projectname").val() == "") {
                $("#projectname").css('border-color', 'red');
                $("#projectname").css('border-width', '2px');
                $("#projectname").attr('placeholder', 'Required Field');
                error = error + 'projectname';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#designused").val() == "") {
                $("#designused").css('border-color', 'red');
                $("#designused").css('border-width', '2px');
                $("#designused").attr('placeholder', 'Required Field');
                error = error + 'designused';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#maintagline").val() == "") {
                $("#maintagline").css('border-color', 'red');
                $("#maintagline").css('border-width', '2px');
                $("#maintagline").attr('placeholder', 'Required Field');
                error = error + 'maintagline';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#agegroup").val() == "") {
                $("#agegroup").css('border-color', 'red');
                $("#agegroup").css('border-width', '2px');
                $("#agegroup").attr('placeholder', 'Required Field');
                error = error + 'agegroup';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#imagesize").val() == "") {
                $("#imagesize").css('border-color', 'red');
                $("#imagesize").css('border-width', '2px');
                $("#imagesize").attr('placeholder', 'Required Field');
                error = error + 'imagesize';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#projectdescription").val() == "") {
                $("#projectdescription").css('border-color', 'red');
                $("#projectdescription").css('border-width', '2px');
                $("#projectdescription").attr('placeholder', 'Required Field');
                error = error + 'projectdescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#duedate").val() == "") {
                $("#duedate").css('border-color', 'red');
                $("#duedate").css('border-width', '2px');
                $("#duedate").attr('placeholder', 'Required Field');
                error = error + 'duedate';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#budget").val() == "") {
                $("#budget").css('border-color', 'red');
                $("#budget").css('border-width', '2px');
                $("#budget").attr('placeholder', 'Required Field');
                error = error + 'budget';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if (error !== "") {
                alert('There are error in the form. Please check your submissions');
                return false;
            } else {
                return true;
            }
        })
    </script>
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
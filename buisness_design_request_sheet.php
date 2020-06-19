<?php
session_start();
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
                
                    }
                 }
                 else{
                     echo "hello";
                 }

}
?>
<?php
 $error="";
 $form_type = $_GET['form'];
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
    $imagesize = $_POST['imagesize'];
    $imageformat = $_POST['imageformat'];
    $duedate = $_POST['duedate'];
    $projectname = $_POST['projectname'];
    $designpackage = $_POST['designpackage'];
    $no_of_designs = 3 ;
    $hearaboutus = $_POST['hearaboutus'];
    $companydigital = $_POST['companydigital'];
    $oftendesignneed = $_POST['oftendesignneed'];
    $employesno = $_POST['employesno'];
    $table_name ="business_advert_requests";
    if($customercredits >=  $designpackage ){
        // 
        if(($form_type == "Brochure") or ($form_type == "Pamphlet") or ($form_type == "Booklet")){

            $designtype = $_POST['designtype'];
            $designused = $_POST['designused'];
            $organisation = $_POST['organisation'];
            $organisatintargetdescription = $_POST['organisatintargetdescription'];
            $productkind = $_POST['productkind'];
            $visualstyledescription = $_POST['visualstyledescription'];
            $bodypartdescription = $_POST['bodypartdescription'];
            $papersize = $_POST['papersize'];
            $avoidthing = $_POST['avoidthing'];
            $frontpartdescription = $_POST['frontpartdescription'];
            $backpartdescription = $_POST['backpartdescription'];
            $communicate = $_POST['communicate'];
            $status = "Submitted";
            $error="";
        // check inspiration file uploaded or not
        $total = count($_FILES['refimages']['name']);
        
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

            $tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != ""){
            $img_folder = "upload_files/";
            // 
            $extension = pathinfo($_FILES['refimages']['name'][$i], PATHINFO_EXTENSION);
            $img = $_FILES['refimages']['name'][$i];
            $img = $img.".".$customername.".".$extension ;
            // 
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
        // upload inspirational file
        $total = count($_FILES['refimages']['name']);
        
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

            $tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != ""){
            $img_folder = "upload_files/";
            $extension = pathinfo($_FILES['refimages']['name'][$i], PATHINFO_EXTENSION);
            $img = $_FILES['refimages']['name'][$i];
            $img = $img.".".$customername.".".$extension ;
            $itemss[] = $img;
            $img_loc = $_FILES['refimages']['tmp_name'][$i];
            // $img = $_FILES['images']['name'][$i];
            if(move_uploaded_file($img_loc,$img_folder.$img))
            {
                ?>
            <!-- <script>alert('file uploaded')</script> -->
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
        $result = mysqli_query($conn, "SELECT max(id) FROM `business_advert_requests`");
        
            while ($row = mysqli_fetch_array($result)) {
                $id = $row[0];  
            }
            $id = $id + 1 ;
            $orderid = "BIZ".$id ;
        
        $query = "INSERT INTO `business_advert_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`communicate`,`Due_Date`,`credits_pay`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Who_is_the_target_audience_for_your_Product`,`What_is_your_organization`,`What_kind_of_Product_do_you_want_designed`,`Do_you_have_ideas_about_the_visual_style_you_want`,`Is_there_anything_that_should_be_avoided`,`What_size_paper_will_your_Product_be_using`,`What_is_required_on_the_front_of_your_Product`,`What_is_required_in_the_body_of_your_Product`,`What_is_required_on_ the_back_cover_of_your_Product`,`no_of_designs`,`table_name`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $communicate)."','".mysqli_real_escape_string($conn, $duedate)."',$designpackage,'".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $organisatintargetdescription)."','".mysqli_real_escape_string($conn, $organisation)."','".mysqli_real_escape_string($conn, $productkind)."','".mysqli_real_escape_string($conn, $visualstyledescription)."','".mysqli_real_escape_string($conn, $avoidthing)."','".mysqli_real_escape_string($conn, $papersize)."','".mysqli_real_escape_string($conn, $frontpartdescription)."','".mysqli_real_escape_string($conn, $bodypartdescription)."','".mysqli_real_escape_string($conn, $backpartdescription)."',$no_of_designs,'".mysqli_real_escape_string($conn, $table_name)."')";
        
         if (!mysqli_query($conn, $query)) {
        
             ?>
         <script>alert('error in form')</script>
         <?php
        
           } else {
        
            $customerrequests = $customerrequests + 1  ;

    $query = "UPDATE `client` SET `no_requests` =  $customerrequests  WHERE email = '".mysqli_real_escape_string($conn, $customeremail)."' ";
                if($result = mysqli_query($conn, $query))  
                    {  
                        $customercredits = $customercredits - $designpackage;
                        $query = "UPDATE `client` SET `Credits` =  $customercredits  WHERE email = '".mysqli_real_escape_string($conn, $customeremail)."' ";
                        if($result = mysqli_query($conn, $query))  
                        {
                            ?>
                            <script>
             
                            alert('form submitted successfully!');
                             window.location = 'client_all_requests.php';</script>
                             <?php
                        }
                       
                    }  
        
         }
        
        }
        
         }elseif(($form_type == "Signage") or ($form_type == "Banner") or ($form_type == "Podcast")){
            //  
            $designtype = $_POST['designtype'];
            $designused = $_POST['designused'];
            $organisation = $_POST['organisation'];
            $organisatintargetdescription = $_POST['organisatintargetdescription'];
            $selectindustry = $_POST['selectindustry'];
            $designdescription = $_POST['designdescription'];
            $communicate = $_POST['communicate'];
            $status = "Submitted";
            $error="";
        // check inspiration file uploaded or not
        $total = count($_FILES['refimages']['name']);
        
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

            $tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != ""){
            $img_folder = "upload_files/";
            // 
            $extension = pathinfo($_FILES['refimages']['name'][$i], PATHINFO_EXTENSION);
            $img = $_FILES['refimages']['name'][$i];
            $img = $img.".".$customername.".".$extension ;
            // 
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
        // upload inspirational file
        $total = count($_FILES['refimages']['name']);
        
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

            $tmpFilePath = $_FILES['refimages']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != ""){
            $img_folder = "upload_files/";
            $extension = pathinfo($_FILES['refimages']['name'][$i], PATHINFO_EXTENSION);
            $img = $_FILES['refimages']['name'][$i];
            $img = $img.".".$customername.".".$extension ;
            $itemss[] = $img;
            $img_loc = $_FILES['refimages']['tmp_name'][$i];
            // $img = $_FILES['images']['name'][$i];
            if(move_uploaded_file($img_loc,$img_folder.$img))
            {
                ?>
            <!-- <script>alert('file uploaded')</script> -->
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
        $result = mysqli_query($conn, "SELECT max(id) FROM `business_advert_requests`");
        
            while ($row = mysqli_fetch_array($result)) {
                $id = $row[0];  
            }
            $id = $id + 1 ;
            $orderid = "BIZ".$id ;
        
        $query = "INSERT INTO `business_advert_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`communicate`,`Due_Date`,`credits_pay`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Who_is_the_target_audience_for_your_Product`,`What_is_your_organization`,`select_industry`,`Describe_what_you_want_designed`,`no_of_designs`,`table_name`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $communicate)."','".mysqli_real_escape_string($conn, $duedate)."',$designpackage,'".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $organisatintargetdescription)."','".mysqli_real_escape_string($conn, $organisation)."','".mysqli_real_escape_string($conn, $selectindustry)."','".mysqli_real_escape_string($conn, $designdescription)."',$no_of_designs,'".mysqli_real_escape_string($conn, $table_name)."')";
        
         if (!mysqli_query($conn, $query)) {
        
             ?>
         <script>alert('error in form')</script>
         <?php
        
           } else {

            $customerrequests = $customerrequests + 1  ;

            $query = "UPDATE `client` SET `no_requests` =  $customerrequests  WHERE email = '".mysqli_real_escape_string($conn, $customeremail)."' ";
                        if($result = mysqli_query($conn, $query))  
                            {  
                                $customercredits = $customercredits - $designpackage;
                                $query = "UPDATE `client` SET `Credits` =  $customercredits  WHERE email = '".mysqli_real_escape_string($conn, $customeremail)."' ";
                                if($result = mysqli_query($conn, $query))  
                                {
                                    ?>
                                    <script>
                     
                                    alert('form submitted successfully!');
                                     window.location = 'client_all_requests.php';</script>
                                     <?php
                                }
                               
                            } 
        
         }
        
        }
            // 
         }
        // 
    }else{
        ?>
        <script>
        alert("You don't have enough Credits!");
        window.location = 'credits.php';</script>
         <?php
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
    .visuallisteditem{
        font-size: 14px;
        color: #999;
    }
    .package--desktop{
        position: relative;
        text-align: left;
        cursor: pointer;
        -webkit-transition: opacity .3s ease-out;
        transition: opacity .3s ease-out;
        padding: 15px;
    }
    .package__box{
        border: 10px solid #e0b48c;
        padding: 15px;
    }
    .headingtop{
        font-size: 28px;
        color: #e0b48c;
        margin-bottom: 10px;
        font-family: Larsseit-Bold,sans-serif;
        font-weight: 600;
    }
    .selectedpackage{
        transition: box-shadow .3s ease-out;
        box-shadow: 0 14px 42px 0 rgba(0,0,0,.2);
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
            <div class="container">
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
                                    <?php 
                                    if(($form_type == "Brochure") or ($form_type == "Pamphlet") or ($form_type == "Booklet")){
                                        if($form_type == "Brochure"){
                                    ?>
                                    <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Brochure brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Brochure" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Pamphlet")){
                                            ?>
                                        <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Pamphlet brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Pamphlet" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Booklet")){
                                            ?>
                                        <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Booklet brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Booklet" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="organisation">What is your organization name? <span
                                                            class="danger">*</span> </label>
                                                    <input
                                                        placeholder="E.g. Acme"
                                                        type="text" class="form-control required" id="organisation"
                                                        name="organisation">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="organisatintargetdescription">Who is the target audience for your Product? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="organisatintargetdescription" id="organisatintargetdescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Age, gender, location, education, interests, lifestyle, behaviour, values.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="visualstyledescription">Do you have ideas about the visual style you want? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="visualstyledescription" id="visualstyledescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Content details</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="productkind">What kind of Product do you want designed? <span
                                                                class="danger">*</span> </label>
                                                        <input
                                                            placeholder="E.g. Half-fold (4 sides), Tri-fold (6 sides), Gate-fold (3 sides) etc."
                                                            type="text" class="form-control required" id="productkind"
                                                            name="productkind">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="papersize">What size paper will your Product be using? <span
                                                                class="danger">*</span> </label>
                                                        <input
                                                            placeholder="E.g. A4 (Folds to A5), A3 (Folds to A4) etc."
                                                            type="text" class="form-control required" id="papersize"
                                                            name="papersize">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="frontpartdescription">What is required on the front of your Product?: <span
                                                                class="danger">*</span></label>
                                                        <textarea name="frontpartdescription" id="frontpartdescription" rows="3"
                                                            class="form-control required"></textarea>
                                                        <ul>
                                                            <li class="visuallisteditem">E.g. Title text, photo, illustration, company logo, phone number.</li>
                                                            </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bodypartdescription">What is required in the body of your Product?: <span
                                                                class="danger">*</span></label>
                                                        <textarea name="bodypartdescription" id="bodypartdescription" rows="3"
                                                            class="form-control required"></textarea>
                                                        <ul>
                                                            <li class="visuallisteditem">E.g. You may also upload a document in the attachments area below.</li>
                                                            </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="backpartdescription">What is required on the back cover of your Product?: <span
                                                                class="danger">*</span></label>
                                                        <textarea name="backpartdescription" id="backpartdescription" rows="3"
                                                            class="form-control required"></textarea>
                                                        <ul>
                                                            <li class="visuallisteditem">E.g. Text, website link, contact details, QR code.</li>
                                                            </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="avoidthing">Is there anything that should be avoided? : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="avoidthing" id="avoidthing" rows="3"
                                                                class="form-control required"></textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        <h2 style="margin-bottom:15px;" >Other</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="communicate">Is there anything else you would like to communicate to the designers? :</label>
                                                    <textarea name="communicate" id="communicate" rows="3"
                                                        class="form-control required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Do you have any images, sketches or documents that might be helpful?</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="refimages[]" multiple>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary btn btn-info  waves-effect waves-light addItemBtn" style="color:#fff;padding: 7px 25px;" type="button">Next
                                        </a>
                                    </section>
                                    <?php
                                    }elseif(($form_type == "Signage") or ($form_type == "Banner") or ($form_type == "Podcast")){
                                        ?>
                                        <?php 
                                        if($form_type == "Signage"){
                                    ?>
                                    <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Signage brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Signage" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Banner")){
                                            ?>
                                        <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Banner brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Banner" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Podcast")){
                                                ?>
                                            <section class="form_option" >
                                            <h1 style="margin-bottom:10px;" >Podcast brief</h1>
                                            <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                            <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="designtype"> What type of design do you need? : <span
                                                                class="danger">*</span> </label>
                                                        <input value="Podcast" readonly
                                                            type="text" class="form-control required" id="designtype"
                                                            name="designtype">
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                            ?>
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="organisation">What is your organization name? <span
                                                                    class="danger">*</span> </label>
                                                            <input
                                                                placeholder="E.g. Acme"
                                                                type="text" class="form-control required" id="organisation"
                                                                name="organisation">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="organisatintargetdescription">Describe what your organization or product does and its target audience : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="organisatintargetdescription" id="organisatintargetdescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. We sell anvils and other industrial goods to manufacturing companies and hobbyists all over the world.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="selectindustry"> Select your industry : <span
                                                                    class="danger">*</span> </label>
                                                            <select class="custom-select form-control required"
                                                                    name="selectindustry" id="selectindustry">
                                                                    <option value="Accounting & Financial">Accounting & Financial</option>
                                                                    <option value="Agriculture">Agriculture
                                                                    </option>
                                                                    <option value="Animal & Pet">Animal & Pet</option>
                                                                    <option value="Architectural">Architectural
                                                                    </option>
                                                                    <option value="Art & Design">Art & Design</option>
                                                                    <option value="Attorney & Law">Attorney & Law</option>
                                                                    <option value="Automotive">Automotive</option>
                                                                    <option value="Bar & Nightclub">Bar & Nightclub</option>
                                                                    <option value="Business & Consulting">Business & Consulting</option>
                                                                    <option value="Childcare">Childcare</option>
                                                                    <option value="Cleaning & Maintenance">Cleaning & Maintenance</option>
                                                                    <option value="Communications">Communications</option>
                                                                    <option value="Community & Non-Profit">Community & Non-Profit</option>
                                                                    <option value="Computer">Computer</option>
                                                                    <!--  -->
                                                                    <option   value="Construction">Construction</option>
                                                                    <option   value="Cosmetics">Cosmetics &amp; Beauty</option>
                                                                    <option   value="Dating">Dating</option>
                                                                    <option   value="Education">Education</option>
                                                                    <option  value="Entertainment">Entertainment &amp; The Arts</option>
                                                                    <option   value="Environment">Environmental</option>
                                                                    <option  value="Fashion">Fashion</option>
                                                                    <option   value="Floral">Floral</option>
                                                                    <option   value="Food & Drink">Food &amp; Drink</option>
                                                                    <option  value="Games & Recreational">Games &amp; Recreational</option>
                                                                    <option   value="Home Furnishing">Home Furnishing</option>
                                                                    <option   value="Internet">Internet</option>
                                                                    <option   value="Landscaping">Landscaping</option>
                                                                    <option   value="Marketing">Marketing</option>
                                                                    <option   value="Medical & Pharmaceutical">Medical &amp; Pharmaceutical</option>
                                                                    <option   value="Photography">Photography</option>
                                                                    <option   value="Physical Fitness">Physical Fitness</option>
                                                                    <option   value="Politics">Political</option>
                                                                    <option   value="Realestate">Real Estate &amp; Mortgage</option>
                                                                    <option   value="Religious">Religious</option>
                                                                    <option   value="Restaurant">Restaurant</option>
                                                                    <option   value="Retail">Retail</option>
                                                                    <option   value="Security">Security</option>
                                                                    <option   value="Spa">Spa &amp; Esthetics</option>
                                                                    <option  value="Sales">Sales</option>
                                                                    <option  value="Sports">Sport</option>
                                                                    <option   value="Technology">Technology</option>
                                                                    <option  value="Travel & Hole;">Travel &amp; Hotel</option>
                                                                    <option   value="wedding">Wedding Service</option>
                                                                    <option   value="Other">Other</option>
                                                                    <!--  -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 style="margin-bottom:15px;" >Content details</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="designdescription">Describe what you want designed : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="designdescription" id="designdescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Describe your aims and requirements in detail here — the more specific, the better. Tell the designers what is required, but also let them know where they’re free to be creative.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 style="margin-bottom:15px;" >Other</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="communicate">Is there anything else you would like to communicate to the designers? :</label>
                                                            <textarea name="communicate" id="communicate" rows="3"
                                                                class="form-control required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Do you have any images, sketches or documents that might be helpful?</label>
                                                            <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                                data-max-file-size="2M" /> -->
                                                            <input type="file" name="refimages[]" multiple>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-primary btn btn-info  waves-effect waves-light addItemBtn" style="color:#fff;padding: 7px 25px;" type="button">Next
                                                </a>
                                            </section>
                                            <?php
                                    }
                                    ?>
                                    <!-- Step 2 -->
                                    <section class="form_option" style="display:none">
                                    <!--  -->
                                        <h1 style="margin-bottom:10px;" >Name your price:</h1>
                                        <!-- <h6 style="margin-bottom:15px;" >All t-shirt packages come with a 100% money-back guarantee and full copyright ownership of the final design.</h6> -->
                                        <div class="row" style="padding:5px;">
                                            <div class="col-md-6" style="margin: 5px 0px;">
                                                <div>
                                                <!-- start -->
                                    <?php 
                                    if(($form_type == "Pamphlet") or ($form_type == "Booklet") or ($form_type == "Brochure")){
                                    ?>
                                                <label for="designpackage">(299 minimum)  : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="designpackage"
                                                        name="designpackage" value="299" min="299"  >
                                                <!--  -->
                                                <?php
                                        }elseif(($form_type == "Podcast") or ($form_type == "Banner")){
                                            ?>
                                             <label for="designpackage">(149 minimum)  : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="designpackage"
                                                        name="designpackage" value="149" min="149"  >
                                            <?php
                                        }elseif($form_type == "Signage"){
                                            ?>
                                             <label for="designpackage">(199 minimum)  : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="designpackage"
                                                        name="designpackage" value="199" min="199"  >
                                            <?php
                                        }
                                        ?>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <!--  -->
                                        </div>
                                        <h2 style="margin-bottom:15px;margin-top:15px;" >Design options</h2>
                                        <h6 style="margin-bottom:15px;" >Customize your Design to suit your need</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectname"> Design Title : <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="projectname"
                                                        name="projectname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="imagesize"> Image Size : <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="imagesize"
                                                        name="imagesize">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
                                                        <option value="Other:">Other
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="duedate">Due Date : <span
                                                            class="danger">*</span></label>
                                                    <input type="date" class="form-control required" name="duedate"
                                                        id="duedate">
                                                </div>
                                            </div>
                                        </div>
                                    <!--  -->
                                        <a class="btn btn-primary btn btn-info  waves-effect waves-light previous" style="color:#fff;" type="button">Previous
                                        </a>
                                        <a class="btn btn-primary btn btn-info  waves-effect waves-light addItemBtn" style="color:#fff;padding: 7px 25px;" type="button">Next
                                        </a>
                                    </section>
                                    <!-- Step 3 -->
                                    <section class="form_option" style="display:none">
                                        <h1 style="margin-bottom:10px;" >Your details</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out your details, pay and we'll post your contest in our marketplace.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:15px;" >Contact details</h2>
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
                                        </div>
                                        <h2 style="margin-bottom:15px;margin-top:15px;" >And finally...</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hearaboutus"> How did you hear about 99designs? :  </label>
                                                    <select class="custom-select form-control required" id="hearaboutus"
                                                        name="hearaboutus">
                                                        <option value="Search engine (e.g. Google, Bing)">Search engine (e.g. Google, Bing)</option>
                                                        <option value="Referred by a friend">Referred by a friend
                                                        </option>
                                                        <option value="Influencer or business coach">Influencer or business coach</option>
                                                        <option value="Facebook">Facebook</option>
                                                        <option value="Instagram">Instagram</option>
                                                        <option value="Twitter">Twitter</option>
                                                        <option value="YouTube">YouTube</option>
                                                        <option value="From another website">From another website</option>
                                                        <option value="I've used 99designs before">I've used 99designs before</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="companydigital"> Is your company a digital, marketing or design agency? :  </label>
                                                    <select class="custom-select form-control required" id="companydigital"
                                                        name="companydigital">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="oftendesignneed"> How often do you (or your business) have new design needs? :  </label>
                                                    <select class="custom-select form-control required" id="oftendesignneed"
                                                        name="oftendesignneed">
                                                        <option value="Rarely">Rarely</option>
                                                        <option value="Quarterly">Quarterly</option>
                                                        <option value="Monthly">Monthly</option>
                                                        <option value="Weekly">Weekly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employesno"> How many employees does your company have including yourself? : </label>
                                                    <select class="custom-select form-control required" id="employesno"
                                                        name="employesno">
                                                        <option value="1">1</option>
                                                        <option value="2-5">2-5</option>
                                                        <option value="6-10">6-10</option>
                                                        <option value="11-20">11-20</option>
                                                        <option value="21-50">21-50</option>
                                                        <option value="51-100">51-100</option>
                                                        <option value="101-500">101-500</option>
                                                        <option value="500+">500+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary btn btn-info  waves-effect waves-light previous" style="color:#fff;" type="button">Previous
                                        </a>
                                            <button
                                                class="btn btn-primary btn btn-info  waves-effect waves-light"
                                                name="submit" type="submit">Submit</button>
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
        $("#header-desktop").load('templates/client_header.php');
    </script>
    <!-- <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script> -->
    <script>
        //script fot submit mob form
        $(document).ready(function () {
        <?php 
        if(($form_type == "Brochure") or ($form_type == "Pamphlet") or ($form_type == "Booklet")){
        ?>
            // $('.addItemBtn').click(function (e) {
            //     e.preventDefault();
            elements = document.getElementsByClassName('addItemBtn');
            // style.setProperty("display", "block", "important");
            elements[0].addEventListener("click", function(event){
                event.preventDefault();
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
            if ($("#designtype").val() == "") {
                $("#designtype").css('border-color', 'red');
                $("#designtype").css('border-width', '2px');
                $("#designtype").attr('placeholder', 'Required Field');
                error = error + 'designtype';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#organisation").val() == "") {
                $("#organisation").css('border-color', 'red');
                $("#organisation").css('border-width', '2px');
                $("#organisation").attr('placeholder', 'Required Field');
                error = error + 'organisation';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#visualstyledescription").val() == "") {
                $("#visualstyledescription").css('border-color', 'red');
                $("#visualstyledescription").css('border-width', '2px');
                $("#visualstyledescription").attr('placeholder', 'Required Field');
                error = error + 'visualstyledescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#productkind").val() == "") {
                $("#productkind").css('border-color', 'red');
                $("#productkind").css('border-width', '2px');
                $("#productkind").attr('placeholder', 'Required Field');
                error = error + 'productkind';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#sitedescription").val() == "") {
                $("#sitedescription").css('border-color', 'red');
                $("#sitedescription").css('border-width', '2px');
                $("#sitedescription").attr('placeholder', 'Required Field');
                error = error + 'sitedescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#organisatintargetdescription").val() == "") {
                $("#organisatintargetdescription").css('border-color', 'red');
                $("#organisatintargetdescription").css('border-width', '2px');
                $("#organisatintargetdescription").attr('placeholder', 'Required Field');
                error = error + 'organisatintargetdescription';
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
            if ($("#frontpartdescription").val() == "") {
                $("#frontpartdescription").css('border-color', 'red');
                $("#frontpartdescription").css('border-width', '2px');
                $("#frontpartdescription").attr('placeholder', 'Required Field');
                error = error + 'frontpartdescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#papersize").val() == "") {
                $("#papersize").css('border-color', 'red');
                $("#papersize").css('border-width', '2px');
                $("#papersize").attr('placeholder', 'Required Field');
                error = error + 'papersize';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#backpartdescription").val() == "") {
                $("#backpartdescription").css('border-color', 'red');
                $("#backpartdescription").css('border-width', '2px');
                $("#backpartdescription").attr('placeholder', 'Required Field');
                error = error + 'backpartdescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
            }
            if ($("#bodypartdescription").val() == "") {
                $("#bodypartdescription").css('border-color', 'red');
                $("#bodypartdescription").css('border-width', '2px');
                $("#bodypartdescription").attr('placeholder', 'Required Field');
                error = error + 'bodypartdescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if (error !== "") {
                alert('There are error in the form. Please check your submissions');
                // return false;
            } else {
                // return true;
                var index = $(".addItemBtn").index(this);
                var indexs = index + 1;
            // alert(indexs);
            $(".form_option").css('display', 'none');
            element = document.getElementsByClassName('form_option');
            element[indexs].style.setProperty("display", "block", "important");
            }
                // alert(dtablename);
                // alert(did);
            });
        <?php
        }elseif(($form_type == "Signage") or ($form_type == "Banner") or ($form_type == "Podcast")){
        ?>
        // 
        elements = document.getElementsByClassName('addItemBtn');
            // style.setProperty("display", "block", "important");
            elements[0].addEventListener("click", function(event){
                event.preventDefault();
                var error = "";
            if ($("#designtype").val() == "") {
                $("#designtype").css('border-color', 'red');
                $("#designtype").css('border-width', '2px');
                $("#designtype").attr('placeholder', 'Required Field');
                error = error + 'designtype';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#organisation").val() == "") {
                $("#organisation").css('border-color', 'red');
                $("#organisation").css('border-width', '2px');
                $("#organisation").attr('placeholder', 'Required Field');
                error = error + 'organisation';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#designdescription").val() == "") {
                $("#designdescription").css('border-color', 'red');
                $("#designdescription").css('border-width', '2px');
                $("#designdescription").attr('placeholder', 'Required Field');
                error = error + 'designdescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#organisatintargetdescription").val() == "") {
                $("#organisatintargetdescription").css('border-color', 'red');
                $("#organisatintargetdescription").css('border-width', '2px');
                $("#organisatintargetdescription").attr('placeholder', 'Required Field');
                error = error + 'organisatintargetdescription';
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
            if (error !== "") {
                alert('There are error in the form. Please check your submissions');
                // return false;
            } else {
                // return true;
                var index = $(".addItemBtn").index(this);
                var indexs = index + 1;
            // alert(indexs);
            $(".form_option").css('display', 'none');
            element = document.getElementsByClassName('form_option');
            element[indexs].style.setProperty("display", "block", "important");
            }
                // alert(dtablename);
                // alert(did);
            });
        // 
        <?php
        }
        ?>
        });
        // 
        $(document).ready(function () {
            elements = document.getElementsByClassName('addItemBtn');
            // style.setProperty("display", "block", "important");
            elements[1].addEventListener("click", function(event){
                event.preventDefault();
                var error = "";
            if ($("#projectname").val() == "") {
                $("#projectname").css('border-color', 'red');
                $("#projectname").css('border-width', '2px');
                $("#projectname").attr('placeholder', 'Required Field');
                error = error + 'projectname';
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
            if ($("#duedate").val() == "") {
                $("#duedate").css('border-color', 'red');
                $("#duedate").css('border-width', '2px');
                $("#duedate").attr('placeholder', 'Required Field');
                error = error + 'duedate';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if (error !== "") {
                alert('There are error in the form. Please check your submissions');
                // return false;
            } else {
                // return true;
                var index = $(".addItemBtn").index(this);
                var indexs = index + 1;
                // var indexss =  $("#wfirstName2").val();
            // alert(indexs);
            // alert(indexss);
            $(".form_option").css('display', 'none');
            element = document.getElementsByClassName('form_option');
            element[indexs].style.setProperty("display", "block", "important");
            }
            });
        });
        $(document).ready(function () {
            // $('.addItemBtn').click(function (e) {
            //     e.preventDefault();
            $('.previous').click(function (e) {
                e.preventDefault();
            // elements = document.getElementsByClassName('previous');
            // style.setProperty("display", "block", "important");
            // elements.addEventListener("click", function(event){
                event.preventDefault();
                // return true;
                var index = $(".previous").index(this);
                // var indexs = index + 1;
            // alert(index);
            $(".form_option").css('display', 'none');
            element = document.getElementsByClassName('form_option');
            element[index].style.setProperty("display", "block", "important");
            
                // alert(dtablename);
                // alert(did);
            });
        });
        $(".package_list_group_item").click(function () {
            var index = $(".package_list_group_item").index(this);
            // alert( $(".list-group-item").index(this) );
            // alert(index);
            // $('#hiddenInputName').val(index);
            $(".buttonselected").css('display', 'none');
            element = document.getElementsByClassName('buttonselected');
            element[index].style.setProperty("display", "block", "important");
            $(".buttonnotselected").css('display', 'block');
            element = document.getElementsByClassName('buttonnotselected');
            element[index].style.setProperty("display", "none", "important");
            $('.package_list_group_item').removeClass('selectedpackage');
            $(this).addClass('selectedpackage');

        });
        $("#validations").submit(function (e) {
            var error = "";
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
            if ($("#projectname").val() == "") {
                $("#projectname").css('border-color', 'red');
                $("#projectname").css('border-width', '2px');
                $("#projectname").attr('placeholder', 'Required Field');
                error = error + 'projectname';
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
            if ($("#duedate").val() == "") {
                $("#duedate").css('border-color', 'red');
                $("#duedate").css('border-width', '2px');
                $("#duedate").attr('placeholder', 'Required Field');
                error = error + 'duedate';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
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
            if (error !== "") {
                alert('There are error in the form. Please check your submissions');
                return false;
            } else {
                return true;
            }
        })

    </script>

</body>

</html>
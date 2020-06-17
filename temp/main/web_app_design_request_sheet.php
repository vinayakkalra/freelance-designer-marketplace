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
    $table_name ="web_app_requests";
    if($customercredits >=  $designpackage ){
// 
if(($form_type == "Web-page") or ($form_type == "WordPress-theme") or ($form_type == "Blog") or ( $form_type == "Website-Redesign")){

    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $organisation = $_POST['organisation'];
    $organisatintargetdescription = $_POST['organisatintargetdescription'];
    $websitename = $_POST['websitename'];
    $selectindustry = $_POST['selectindustry'];
    $visualstyledescription = $_POST['visualstyledescription'];
    $inspwebsitename = $_POST['inspwebsitename'];
    $sitedescription = $_POST['sitedescription'];
    $totalpages = $_POST['totalpages'];
    $eachpagedescription = $_POST['eachpagedescription'];
    $themecoloradd = $_POST['themecoloradd'];
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
$result = mysqli_query($conn, "SELECT max(id) FROM `web_app_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "WEB".$id ;

$query = "INSERT INTO `web_app_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`communicate`,`Due_Date`,`credits_pay`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Briefly_describe_what_you_do_and_your_target_audience`,`What_is_your_organization_or_website_name`,`select_industry`,`If_you_have_an_existing_website_please_list_it_here`,`What_ideas_do_you_have_for_the_style/theme_of_your_product`,`Website_address`,`What_do_you_like_about_this_site`,`How_many_pages_do_you_need_designed_for_your_product`,`What_would_you_like_on_each_page`,`List_any_colors_themes_or_other_elements_include`,`no_of_designs`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $communicate)."','".mysqli_real_escape_string($conn, $duedate)."',$designpackage,'".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $organisatintargetdescription)."','".mysqli_real_escape_string($conn, $organisation)."','".mysqli_real_escape_string($conn, $selectindustry)."','".mysqli_real_escape_string($conn, $websitename)."','".mysqli_real_escape_string($conn, $visualstyledescription)."','".mysqli_real_escape_string($conn, $inspwebsitename)."','".mysqli_real_escape_string($conn, $sitedescription)."','".mysqli_real_escape_string($conn, $totalpages)."','".mysqli_real_escape_string($conn, $eachpagedescription)."','".mysqli_real_escape_string($conn, $themecoloradd)."',$no_of_designs)";

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

 }elseif(( $form_type == "Landing-page")){
    //  
    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $organisation = $_POST['organisation'];
    $organisatintargetdescription = $_POST['organisatintargetdescription'];
    $websitename = $_POST['websitename'];
    $selectindustry = $_POST['selectindustry'];
    $visualstyledescription = $_POST['visualstyledescription'];
    $inspwebsitename = $_POST['inspwebsitename'];
    $sitedescription = $_POST['sitedescription'];
    $eachpagedescription = $_POST['eachpagedescription'];
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
$result = mysqli_query($conn, "SELECT max(id) FROM `web_app_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "WEB".$id ;

$query = "INSERT INTO `web_app_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`communicate`,`Due_Date`,`credits_pay`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Briefly_describe_what_you_do_and_your_target_audience`,`What_is_your_organization_or_website_name`,`select_industry`,`If_you_have_an_existing_website_please_list_it_here`,`What_ideas_do_you_have_for_the_style/theme_of_your_product`,`Website_address`,`What_do_you_like_about_this_site`,`What_would_you_like_on_each_page`,`no_of_designs`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $communicate)."','".mysqli_real_escape_string($conn, $duedate)."',$designpackage,'".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $organisatintargetdescription)."','".mysqli_real_escape_string($conn, $organisation)."','".mysqli_real_escape_string($conn, $selectindustry)."','".mysqli_real_escape_string($conn, $websitename)."','".mysqli_real_escape_string($conn, $visualstyledescription)."','".mysqli_real_escape_string($conn, $inspwebsitename)."','".mysqli_real_escape_string($conn, $sitedescription)."','".mysqli_real_escape_string($conn, $eachpagedescription)."',$no_of_designs)";

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
 }elseif(( $form_type == "App-design")){
    //  
    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $organisatintargetdescription = $_POST['organisatintargetdescription'];
    $websitename = $_POST['websitename'];
    $selectindustry = $_POST['selectindustry'];
    $visualstyledescription = $_POST['visualstyledescription'];
    $inspwebsitename = $_POST['inspwebsitename'];
    $sitedescription = $_POST['sitedescription'];
    $eachpagedescription = $_POST['eachpagedescription'];
    $communicate = $_POST['communicate'];
    $devicetype = $_POST['devicetype'];
    $avoidthing = $_POST['avoidthing'];
    $app_name = $_POST['app_name'];
    $totalpages = $_POST['totalpages'];
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
$result = mysqli_query($conn, "SELECT max(id) FROM `web_app_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "WEB".$id ;

$query = "INSERT INTO `web_app_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`communicate`,`Due_Date`,`credits_pay`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Briefly_describe_what_you_do_and_your_target_audience`,`device_type`,`select_industry`,`If_you_have_an_existing_website_please_list_it_here`,`What_ideas_do_you_have_for_the_style/theme_of_your_product`,`Website_address`,`What_do_you_like_about_this_site`,`What_would_you_like_on_each_page`,`app_name`,`Is_there_anything_that_should_be_avoided`,`How_many_pages_do_you_need_designed_for_your_product`,`no_of_designs`,`table_name`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $communicate)."','".mysqli_real_escape_string($conn, $duedate)."',$designpackage,'".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $organisatintargetdescription)."','".mysqli_real_escape_string($conn, $devicetype)."','".mysqli_real_escape_string($conn, $selectindustry)."','".mysqli_real_escape_string($conn, $websitename)."','".mysqli_real_escape_string($conn, $visualstyledescription)."','".mysqli_real_escape_string($conn, $inspwebsitename)."','".mysqli_real_escape_string($conn, $sitedescription)."','".mysqli_real_escape_string($conn, $eachpagedescription)."','".mysqli_real_escape_string($conn, $app_name)."','".mysqli_real_escape_string($conn, $avoidthing)."','".mysqli_real_escape_string($conn, $totalpages)."',$no_of_designs,'".mysqli_real_escape_string($conn, $table_name)."')";

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
                                    if(($form_type == "Web-page") or ($form_type == "WordPress-theme") or ($form_type == "Blog") or ( $form_type == "Website-Redesign") OR ( $form_type == "Landing-page")){
                                        if($form_type == "Web-page"){
                                    ?>
                                    <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Web page design brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Web page design" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "WordPress-theme")){
                                            ?>
                                        <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >WordPress theme design brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="WordPress theme design" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Blog")){
                                            ?>
                                        <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >Blog brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Blog" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <?php
                                            }elseif(( $form_type == "Website-Redesign")){
                                                ?>
                                            <section class="form_option" >
                                            <h1 style="margin-bottom:10px;" >Website Redesign brief</h1>
                                            <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                            <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="designtype"> What type of design do you need? : <span
                                                                class="danger">*</span> </label>
                                                        <input value="Website Redesign" readonly
                                                            type="text" class="form-control required" id="designtype"
                                                            name="designtype">
                                                    </div>
                                                </div>
                                            <?php
                                            }elseif(( $form_type == "Landing-page")){
                                                ?>
                                            <section class="form_option" >
                                            <h1 style="margin-bottom:10px;" >Landing page design brief</h1>
                                            <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                            <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="designtype"> What type of design do you need? : <span
                                                                class="danger">*</span> </label>
                                                        <input value="Landing page design" readonly
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
                                                    <label for="organisation">What is your organization or website name? <span
                                                            class="danger">*</span> </label>
                                                    <input
                                                        placeholder="E.g. Acme"
                                                        type="text" class="form-control required" id="organisation"
                                                        name="organisation">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="organisatintargetdescription">Briefly describe what you do and your target audience. : <span
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
                                                    <label for="websitename">If you have an existing website, please list it here. </label>
                                                    <input
                                                        placeholder="E.g. www.acme.com"
                                                        type="text" class="form-control required" id="websitename"
                                                        name="websitename">
                                                </div>
                                            </div>
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
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                        <?php
                                        if($form_type == "Landing-page"){
                                                ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="visualstyledescription">What style or theme do you want to use? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="visualstyledescription" id="visualstyledescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                </div>
                                            </div>
                                        <?php
                                        }else{
                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="visualstyledescription">What ideas do you have for the style/theme of your website design? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="visualstyledescription" id="visualstyledescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >What websites can designers draw inspiration from?</h2>
                                        <h6 style="margin-bottom:15px;" >List websites you like and describe what you like about them.</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inspwebsitename">Website address </label>
                                                    <input
                                                        placeholder="E.g. www.acme.com"
                                                        type="text" class="form-control required" id="inspwebsitename"
                                                        name="inspwebsitename">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sitedescription">What do you like about this site? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="sitedescription" id="sitedescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. I like the homepage of the website, the colors and imagery used as well as the menu and buttons.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Content details</h2>
                                        <?php
                                        if($form_type == "Landing-page"){
                                                ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eachpagedescription">What do you want to include on your landing page? : <span
                                                                class="danger">*</span></label>
                                                        <textarea name="eachpagedescription" id="eachpagedescription" rows="3"
                                                            class="form-control required"></textarea>
                                                        <ul>
                                                            <li class="visuallisteditem">Specify any necessary features to include on the landing page.</li>
                                                            <li class="visuallisteditem">E.g. Email capture form, sign up form, social sharing buttons, calls to action, etc...</li>
                                                            </ul>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php
                                        }else{
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="totalpages"> How many pages do you need designed for your website? : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required"
                                                            name="totalpages" id="totalpages">
                                                            <option value="onepage">1 page (from CR 599)</option>
                                                            <option value="twopage">2 pages (from CR 749)
                                                            </option>
                                                            <option value="threepage">3 pages (from CR 899)</option>
                                                            <option value="fourpage">4 pages (from CR 1,049)
                                                            </option>
                                                            <option value="fivepage">5 pages (from CR 1,199)</option>
                                                    </select>
                                                        <ul style="margin-top:5px;">
                                                        <li class="visuallisteditem">E.g. Homepage, payment section, loading screen, browse section.</li>
                                                        <li class="visuallisteditem">Tip: Need more than 5 pages? No problem. Once your contest is complete, work one-on-one with your winning designer to finish the remaining designs.</li>
                                                        </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="eachpagedescription">What would you like on each page? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="eachpagedescription" id="eachpagedescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <ul>
                                                        <li class="visuallisteditem">Outline the content for each page layout and also what the main goal of each page is.</li>
                                                        <li class="visuallisteditem">E.g. Homepage: We want a big featured image of our spices with an introduction of who we are. The page should direct customers to search or browse all our products.</li>
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="themecoloradd">List any colors, themes or other elements that you don't want included. : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="themecoloradd" id="themecoloradd" rows="3"
                                                        class="form-control required"></textarea>
                                                        <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Please do not use any drop down menus.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
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
                                    }elseif(($form_type == "App-design")){
                                        ?>
                                        <section class="form_option" >
                                                <h1 style="margin-bottom:10px;" >App design brief</h1>
                                                <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                                <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="designtype"> What type of design do you need? : <span
                                                                    class="danger">*</span> </label>
                                                            <input value="App design" readonly
                                                                type="text" class="form-control required" id="designtype"
                                                                name="designtype">
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="websitename">If you have an existing website, please list it here. </label>
                                                            <input
                                                                placeholder="E.g. www.acme.com"
                                                                type="text" class="form-control required" id="websitename"
                                                                name="websitename">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="organisatintargetdescription">Briefly describe what your app does : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="organisatintargetdescription" id="organisatintargetdescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. The app allows our customers to browse and purchase anvils on their mobile phone.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 style="margin-bottom:15px;" >Visual style</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="visualstyledescription">What ideas do you have for the style/theme of your app? : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="visualstyledescription" id="visualstyledescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 style="margin-bottom:15px;" >What websites can designers draw inspiration from?</h2>
                                                <h6 style="margin-bottom:15px;" >List websites you like and describe what you like about them.</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inspwebsitename">Website address </label>
                                                            <input
                                                                placeholder="E.g. www.acme.com"
                                                                type="text" class="form-control required" id="inspwebsitename"
                                                                name="inspwebsitename">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sitedescription">What do you like about this site? : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="sitedescription" id="sitedescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. I like the homepage of the website, the colors and imagery used as well as the menu and buttons.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 style="margin-bottom:15px;" >Content details</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="app_name">What is the name of your app? <span
                                                                    class="danger">*</span> </label>
                                                            <input
                                                                placeholder="E.g. AcmeApp"
                                                                type="text" class="form-control required" id="app_name"
                                                                name="app_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="totalpages"> How many screens do you want designed? : <span
                                                                    class="danger">*</span> </label>
                                                            <select class="custom-select form-control required"
                                                                    name="totalpages" id="totalpages">
                                                                    <option value="onepage">1 screen (from CR 599)</option>
                                                                    <option value="twopage">2 screens (from CR 699)
                                                                    </option>
                                                                    <option value="threepage">3 screens (from CR 799)</option>
                                                                    <option value="fourpage">4 screens (from CR 899)
                                                                    </option>
                                                                    <option value="fivepage">5 screens (from CR 999)</option>
                                                            </select>
                                                                <ul style="margin-top:5px;">
                                                                <li class="visuallisteditem">Tip: If you require more than 5 screens, we recommend you focus on identifying a design direction first and then working with the designer 1-to-1 after your contest, to complete the subsequent screens.</li>
                                                                </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eachpagedescription">Describe the screens and the main work flows for your app : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="eachpagedescription" id="eachpagedescription" rows="3"
                                                                class="form-control required"></textarea>
                                                            <ul>
                                                                <li class="visuallisteditem">Tip: How do people use your app? How do users move around from screen to screen?</li>
                                                                <li class="visuallisteditem">E.g. From the home screen users can either search or browse our range of anvils. From a search results or category page they can go through to an anvil details page. Here they can enter a quantity to purchase and add them to a shopping cart and checkout.</li>
                                                                </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="avoidthing">Is there anything that should be avoided? : <span
                                                                    class="danger">*</span></label>
                                                            <textarea name="avoidthing" id="avoidthing" rows="3"
                                                                class="form-control required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="devicetype">What device do you need designs for <span
                                                                    class="danger">*</span> </label>
                                                            <input
                                                                placeholder="E.g. iPhone, Android, iPad, Windows, Apple Mac etc."
                                                                type="text" class="form-control required" id="devicetype"
                                                                name="devicetype">
                                                            <ul>
                                                                <li class="visuallisteditem" style="margin-top:5px;">If you require designs for more than 1 device we recommend identifying a design direction first and then working with the designer 1-to-1 after the contest has finished.</li>
                                                            </ul>
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
                                    if(($form_type == "Web-page") or ($form_type == "WordPress-theme") or ($form_type == "Blog") or ( $form_type == "Website-Redesign") or ($form_type == "App-design")){
                                    ?>
                                                <label for="designpackage">(599 minimum)  : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="designpackage"
                                                        name="designpackage" value="599" min="599"  >
                                                <!--  -->
                                                <?php
                                        }elseif($form_type == "Landing-page"){
                                            ?>
                                             <label for="designpackage">(349 minimum)  : <span
                                                            class="danger">*</span></label>
                                                    <!-- <input type="hidden" name="gg" value="10"> -->
                                                    <input type="number" class="form-control required" id="designpackage"
                                                        name="designpackage" value="349" min="349"  >
                                            <?php
                                        }
                                        ?>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <!--  -->
                                        </div>
                                        <h2 style="margin-bottom:15px;margin-top:15px;" >Design options</h2>
                                        <h6 style="margin-bottom:15px;" >Customize your design to suit your need</h6>
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
    <script type="text/javascript">
        $("#header-desktop").load('templates/client_header.php');
    </script>
    <!-- <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script> -->
    <script>
        //script fot submit mob form
        $(document).ready(function () {
        <?php 
        if(($form_type == "Web-page") or ($form_type == "WordPress-theme") or ($form_type == "Blog") or ( $form_type == "Website-Redesign")){
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
            if ($("#inspwebsitename").val() == "") {
                $("#inspwebsitename").css('border-color', 'red');
                $("#inspwebsitename").css('border-width', '2px');
                $("#inspwebsitename").attr('placeholder', 'Required Field');
                error = error + 'inspwebsitename';
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
            if ($("#eachpagedescription").val() == "") {
                $("#eachpagedescription").css('border-color', 'red');
                $("#eachpagedescription").css('border-width', '2px');
                $("#eachpagedescription").attr('placeholder', 'Required Field');
                error = error + 'eachpagedescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#themecoloradd").val() == "") {
                $("#themecoloradd").css('border-color', 'red');
                $("#themecoloradd").css('border-width', '2px');
                $("#themecoloradd").attr('placeholder', 'Required Field');
                error = error + 'themecoloradd';
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
        }elseif(($form_type == "Landing-page")){
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
            if ($("#visualstyledescription").val() == "") {
                $("#visualstyledescription").css('border-color', 'red');
                $("#visualstyledescription").css('border-width', '2px');
                $("#visualstyledescription").attr('placeholder', 'Required Field');
                error = error + 'visualstyledescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#inspwebsitename").val() == "") {
                $("#inspwebsitename").css('border-color', 'red');
                $("#inspwebsitename").css('border-width', '2px');
                $("#inspwebsitename").attr('placeholder', 'Required Field');
                error = error + 'inspwebsitename';
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
            if ($("#eachpagedescription").val() == "") {
                $("#eachpagedescription").css('border-color', 'red');
                $("#eachpagedescription").css('border-width', '2px');
                $("#eachpagedescription").attr('placeholder', 'Required Field');
                error = error + 'eachpagedescription';
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
        }elseif(($form_type == "App-design")){
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
            if ($("#devicetype").val() == "") {
                $("#devicetype").css('border-color', 'red');
                $("#devicetype").css('border-width', '2px');
                $("#devicetype").attr('placeholder', 'Required Field');
                error = error + 'devicetype';
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
            if ($("#inspwebsitename").val() == "") {
                $("#inspwebsitename").css('border-color', 'red');
                $("#inspwebsitename").css('border-width', '2px');
                $("#inspwebsitename").attr('placeholder', 'Required Field');
                error = error + 'inspwebsitename';
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
            if ($("#eachpagedescription").val() == "") {
                $("#eachpagedescription").css('border-color', 'red');
                $("#eachpagedescription").css('border-width', '2px');
                $("#eachpagedescription").attr('placeholder', 'Required Field');
                error = error + 'eachpagedescription';
            } else {
                // $("#wfirstName2").css('border-color','white');
                // $("#wfirstName2").css('border-width','1px');
            }
            if ($("#app_name").val() == "") {
                $("#app_name").css('border-color', 'red');
                $("#app_name").css('border-width', '2px');
                $("#app_name").attr('placeholder', 'Required Field');
                error = error + 'app_name';
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
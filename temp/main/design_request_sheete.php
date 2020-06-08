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
    if($designpackage == "Bronze"){
        $budget = 20 ;
        $no_of_designs = 3 ;
    }elseif($designpackage == "Silver"){
        $budget = 30 ;
        $no_of_designs = 5 ;
    }elseif($designpackage == "Gold"){
        $budget = 40 ;
        $no_of_designs = 7 ;
    }elseif($designpackage == "Platinum"){
        $budget = 50 ;
        $no_of_designs = 9 ;
    }
    $hearaboutus = $_POST['hearaboutus'];
    $companydigital = $_POST['companydigital'];
    $oftendesignneed = $_POST['oftendesignneed'];
    $employesno = $_POST['employesno'];
if($form_type == "T-shirt"){

    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $productfor = $_POST['productfor'];
    $productcolor = $_POST['productcolor'];
    $projectdescription = $_POST['projectdescription'];
    $productkind = $_POST['productkind'];
    $avoidthing = $_POST['avoidthing'];
    $productrequired = $_POST['productrequired'];
    $status = "Submitted";
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
$result = mysqli_query($conn, "SELECT max(id) FROM `clothing_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "CLOTH".$id ;

$query = "INSERT INTO `clothing_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`design_package`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`Describe_Visual_style_of_project`,`Due_Date`,`credits_pay`,`reference_files`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Who_is_the_product_for`,`Do_you_have_any_specific_colors_in_mind`,`What_kind_of_product_do_you_want_designed`,`What_is_required_on_the_product`,`Is_there_anything_that_should_be_avoided`,`no_of_designs`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $designpackage)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $projectdescription)."','".mysqli_real_escape_string($conn, $duedate)."',$budget,'".mysqli_real_escape_string($conn, $refimages)."','".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $productfor)."','".mysqli_real_escape_string($conn, $productcolor)."','".mysqli_real_escape_string($conn, $productkind)."','".mysqli_real_escape_string($conn, $productrequired)."','".mysqli_real_escape_string($conn, $avoidthing)."',$no_of_designs)";

 if (!mysqli_query($conn, $query)) {

     ?>
 <script>alert('error in form')</script>
 <?php

   } else {
     ?>
 <script>
 alert('form submitted successfully!');
  </script>
 <?php
 // header('location:client_processing_request.php');

 }

}

 }elseif(($form_type == "Clothing-or-apparel") or ($form_type == "Jersey") or ($form_type == "Sweatshirt-Hoodie")){
    //  
    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $projectdescription = $_POST['projectdescription'];
    $projectdescriptionmain = $_POST['projectdescriptionmain'];
    $productkind = $_POST['productkind'];
    $avoidthing = $_POST['avoidthing'];
    $productrequired = $_POST['productrequired'];
    $status = "Submitted";
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
$result = mysqli_query($conn, "SELECT max(id) FROM `clothing_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "CLOTH".$id ;

$query = "INSERT INTO `clothing_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`design_package`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`Describe_Visual_style_of_project`,`Due_Date`,`credits_pay`,`reference_files`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Describe_your_product_and_its_purpose`,`What_kind_of_product_do_you_want_designed`,`What_is_required_on_the_product`,`Is_there_anything_that_should_be_avoided`,`no_of_designs`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $designpackage)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $projectdescription)."','".mysqli_real_escape_string($conn, $duedate)."',$budget,'".mysqli_real_escape_string($conn, $refimages)."','".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $projectdescriptionmain)."','".mysqli_real_escape_string($conn, $productkind)."','".mysqli_real_escape_string($conn, $productrequired)."','".mysqli_real_escape_string($conn, $avoidthing)."',$no_of_designs)";

 if (!mysqli_query($conn, $query)) {

     ?>
 <script>alert('error in form')</script>
 <?php

   } else {
     ?>
 <script>
 alert('form submitted successfully!');
  </script>
 <?php
 // header('location:client_processing_request.php');

 }

}
    // 
 }elseif(($form_type == "Merchandise") or ($form_type == "Other-clothing-or-merchandise")){
    //  
    $designtype = $_POST['designtype'];
    $designused = $_POST['designused'];
    $projectdescription = $_POST['projectdescription'];
    $projectdescriptionmain = $_POST['projectdescriptionmain'];
    $organisation = $_POST['organisation'];
    $selectindustry = $_POST['selectindustry'];
    $communicate = $_POST['communicate'];
    $status = "Submitted";
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
$result = mysqli_query($conn, "SELECT max(id) FROM `clothing_requests`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1 ;
    $orderid = "CLOTH".$id ;

$query = "INSERT INTO `clothing_requests` (`email`,`name`,`phone`,`project_name`,`type_of_design`,`how_design_can_be_used`,`design_package`,`How_did_you_hear_about_us`,`Image_Size`,`Image_Format`,`Describe_Visual_style_of_project`,`Due_Date`,`credits_pay`,`reference_files`,`inspiration_files`,`status`,`from_ip`,`from_browser`,`time`,`orderid`,`Is_your_company_a_digital_marketing_or_design_agency`,`how_often_you_need_design`,`How_many_employees_you_company_have`,`Describe_your_product_and_its_purpose`,`What_is_your_organization_name`,`select_industry`,`communicate`,`no_of_designs`) VALUES ('".mysqli_real_escape_string($conn, $email)."', '".mysqli_real_escape_string($conn, $name)."','".mysqli_real_escape_string($conn, $phone)."', '".mysqli_real_escape_string($conn, $projectname)."','".mysqli_real_escape_string($conn, $designtype)."','".mysqli_real_escape_string($conn, $designused)."','".mysqli_real_escape_string($conn, $designpackage)."','".mysqli_real_escape_string($conn, $hearaboutus)."','".mysqli_real_escape_string($conn, $imagesize)."','".mysqli_real_escape_string($conn, $imageformat)."','".mysqli_real_escape_string($conn, $projectdescription)."','".mysqli_real_escape_string($conn, $duedate)."',$budget,'".mysqli_real_escape_string($conn, $refimages)."','".mysqli_real_escape_string($conn, $inspimages)."','".mysqli_real_escape_string($conn, $status)."','".mysqli_real_escape_string($conn, $from_ip)."','".mysqli_real_escape_string($conn, $from_browser)."','".mysqli_real_escape_string($conn, $date_now)."','".mysqli_real_escape_string($conn, $orderid)."','".mysqli_real_escape_string($conn, $companydigital)."','".mysqli_real_escape_string($conn, $oftendesignneed)."','".mysqli_real_escape_string($conn, $employesno)."','".mysqli_real_escape_string($conn, $projectdescriptionmain)."','".mysqli_real_escape_string($conn, $organisation)."','".mysqli_real_escape_string($conn, $selectindustry)."','".mysqli_real_escape_string($conn, $communicate)."',$no_of_designs)";

 if (!mysqli_query($conn, $query)) {

     ?>
 <script>alert('error in form')</script>
 <?php

   } else {
     ?>
 <script>
 alert('form submitted successfully!');
  </script>
 <?php
 // header('location:client_processing_request.php');

 }

}
    // 
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
                                    if($form_type == "T-shirt"){
                                    ?>
                                    <section class="form_option" >
                                        <h1 style="margin-bottom:10px;" >T-shirt brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;margin-top:20px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="T-shirt" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productfor"> Who is the t-shirt for? : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required"
                                                        name="productfor" id="productfor">
                                                            <option value="Men">Men</option>
                                                            <option value="Women">Women
                                                            </option>
                                                            <option value="Boys">Boys</option>
                                                            <option value="Girls">Girls
                                                            </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productcolor">Do you have any specific colors in mind? </label>
                                                    <input
                                                        placeholder="E.g. red, yellow, mauve"
                                                        type="text" class="form-control required" id="productcolor"
                                                        name="productcolor">
                                                        <h5 style="font-size: 14px;color: #999;margin-top: 15px;font-weight: 500;">Common associations in Western culture</h5>
                                                        <ul>
                                                        <li class="visuallisteditem">Red: Passion, Anger, Vigor, Love, Danger</li>
                                                        <li class="visuallisteditem">Yellow: Knowledge, Energy, Joy, Intellect, Youth</li>
                                                        <li class="visuallisteditem">Green: Fertility, Wealth, Healing, Success, Growth</li>
                                                        <li class="visuallisteditem">White: Purity, Healing, Perfection, Clean, Virtue</li>
                                                        <li class="visuallisteditem">Blue: Knowledge, Trust, Tranquility, Calm, Peace, Cool</li>
                                                        </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectdescription">Do you have ideas about the visual style you want? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="projectdescription" id="projectdescription" rows="5"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Content details</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productkind"> What kind of t-shirt do you want designed? : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required"
                                                            name="productkind" id="productkind">
                                                            <option value="Standard short-sleeve Tshirt">Standard short-sleeve Tshirt</option>
                                                            <option value="Tank top">Tank top
                                                            </option>
                                                            <option value="Polo shirt">Polo shirt</option>
                                                            <option value="Short sleeved button up shirt">Short sleeved button up shirt
                                                            </option>
                                                            <option value="Polo shirt">Dress/business shirt</option>
                                                            <option value="Other, please specify">Other, please specify</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Do you have a logo you want on the t-shirt?</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="images[]" multiple>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productrequired">What is required on the t-shirt? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="productrequired" id="productrequired" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Slogan, organisation or product name, website address, phone number.</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="avoidthing">Is there anything that should be avoided? :</label>
                                                    <textarea name="avoidthing" id="avoidthing" rows="3"
                                                        class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Other</h2>
                                        <div class="row">
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
                                    }elseif(($form_type == "Clothing-or-apparel") or ($form_type == "Jersey") or ($form_type == "Sweatshirt-Hoodie")){
                                        ?>
                                    <!--  -->
                                    <section class="form_option" >
                                    <?php
                                    if($form_type == "Clothing-or-apparel"){
                                        ?>
                                        <h1 style="margin-bottom:10px;" >Clothing or apparel brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Clothing or apparel" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                        <?php
                                    }elseif( $form_type == "Jersey")
                                    {
                                        ?>
                                        <h1 style="margin-bottom:10px;" >Jersey</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Jersey" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                        <?php
                                    }elseif( $form_type == "Sweatshirt-Hoodie")
                                    {
                                        ?>
                                        <h1 style="margin-bottom:10px;" >Sweatshirt & Hoodie</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you’re looking for.</h6>
                                        <h2 style="margin-bottom:15px;" >Visual style</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Sweatshirt & Hoodie" readonly
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
                                                    <label for="projectdescription">Do you have ideas about the visual style you want? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="projectdescription" id="projectdescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Tip: Providing any thoughts on colors, illustration or photography will help guide designers.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Content details</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productkind"> What apparel do you want designed? : <span
                                                            class="danger">*</span> </label>
                                                    <select class="custom-select form-control required"
                                                            name="productkind" id="productkind">
                                                            <option value="Jacket">Jacket</option>
                                                            <option value="Cap">Cap
                                                            </option>
                                                            <option value="Bag">Bag</option>
                                                            <option value="Shoe">Shoe
                                                            </option>
                                                            <option value="Other, please specify">Other, please specify</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Do you have a logo you want on the apparel?</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="images[]" multiple>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productrequired">What is required on the t-shirt? : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="productrequired" id="productrequired" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Slogan, organisation or product name, website address, phone number.</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="avoidthing">Is there anything that should be avoided? :</label>
                                                    <textarea name="avoidthing" id="avoidthing" rows="3"
                                                        class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectdescriptionmain">Describe your apparel and its purpose : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="projectdescriptionmain" id="projectdescriptionmain" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. A fitted men's cap for Acme employees.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Other</h2>
                                        <div class="row">
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
                                    <!--  -->
                                        <?php
                                    }elseif(($form_type == "Merchandise") or ($form_type == "Other-clothing-or-merchandise")){
                                        ?>
                                    <!--  -->
                                    <section class="form_option" >
                                    <?php
                                    if($form_type == "Merchandise"){
                                        ?>
                                        <h1 style="margin-bottom:10px;" >Merchandise brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you‘re looking for.</h6>
                                        <h2 style="margin-bottom:15px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Merchandise" readonly
                                                        type="text" class="form-control required" id="designtype"
                                                        name="designtype">
                                                </div>
                                            </div>
                                        <?php
                                    }elseif( $form_type == "Other-clothing-or-merchandise")
                                    {
                                        ?>
                                        <h1 style="margin-bottom:10px;" >Other clothing or merchandise brief</h1>
                                        <h6 style="margin-bottom:15px;" >Fill out the brief so the designers know what you‘re looking for.</h6>
                                        <h2 style="margin-bottom:15px;" >Background information</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designtype"> What type of design do you need? : <span
                                                            class="danger">*</span> </label>
                                                    <input value="Other clothing or merchandise" readonly
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectdescription">Describe what your organization or product does and its target audience : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="projectdescription" id="projectdescription" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. We sell anvils and other industrial goods to manufacturing companies and hobbyists all over the world.</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 style="margin-bottom:15px;" >Content details</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectdescriptionmain">Describe what you want designed : <span
                                                            class="danger">*</span></label>
                                                    <textarea name="projectdescriptionmain" id="projectdescriptionmain" rows="3"
                                                        class="form-control required"></textarea>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">Describe your aims and requirements in detail here — the more specific, the better. Tell the designers what is required, but also let them know where they’re free to be creative.</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Do you have a logo you want on the apparel?</label>
                                                    <!-- <input type="file" id="input-file-max-fs" class="dropify"
                                                        data-max-file-size="2M" /> -->
                                                    <input type="file" name="images[]" multiple>
                                                    <h5 style="font-size: 14px;color: #999;margin-top: 7px;">E.g. Your current logo, fonts, photos, illustrations, content, layout ideas etc.</h5>
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
                                    <!--  -->
                                        <?php
                                    }
                                    ?>
                                    <!-- Step 2 -->
                                    <section class="form_option" style="display:none">
                                    <!--  -->
                                        <h1 style="margin-bottom:10px;" >Which design package do you want?</h1>
                                        <h6 style="margin-bottom:15px;" >All t-shirt packages come with a 100% money-back guarantee and full copyright ownership of the final design.</h6>
                                        <div class="row" style="padding:5px;">
                                            <div class="col-md-3" style="margin: 5px 0px;">
                                                <div>
                                                <!-- start -->
                                                <label style="width: 100%;">
                                                    <input type="radio" name="designpackage" value="Bronze" checked  >
                                                    <div class="package package--desktop package_list_group_item selectedpackage" >
                                                        <div class="package__box" >
                                                            <div class="package__box__inner">
                                                                <div class="bordered-box bordered-box--reduced-padding">
                                                                    <h4 class="headingtop">
                                                                        Bronze
                                                                    </h4>
                                                                    <div>
                                                                        <p class="paragraph" style="margin-bottom: 10px;">
                                                                            Expect 3 designs</p>
                                                                    </div>
                                                                    <div class="bordered-box__bottom-right-element">
                                                                        <h5 class="heading " style="margin-bottom: 10px;">
                                                                            <span><span>20 Credits</span></span>
                                                                        </h5>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonselected" style="width:100%;color: #fff;background-color: #e0b48c;"><i class="fa fa-check" aria-hidden="true"></i>  Bronze</a>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonnotselected" style="display:none;border: 3px solid #b2b2b2;width:100%;color: #b2b2b2;background-color: #fff;">Select</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <!-- 2nd -->
                                            <div class="col-md-3" style="margin: 5px 0px;">
                                                <div>
                                                <!-- start -->
                                                <label style="width: 100%;">
                                                    <input  type="radio" name="designpackage" value="Silver"  >
                                                    <div class="package package--desktop package_list_group_item " >
                                                        <div class="package__box" >
                                                            <div class="package__box__inner">
                                                                <div class="bordered-box bordered-box--reduced-padding">
                                                                    <h4 class="headingtop">
                                                                        Silver
                                                                    </h4>
                                                                    <div>
                                                                        <p class="paragraph" style="margin-bottom: 10px;">
                                                                            Expect 5 designs</p>
                                                                    </div>
                                                                    <div class="bordered-box__bottom-right-element">
                                                                        <h5 class="heading "style="margin-bottom: 10px;">
                                                                            <span><span>30 Credits</span></span>
                                                                        </h5>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonselected" style="display:none;width:100%;color: #fff;background-color: #e0b48c;"><i class="fa fa-check" aria-hidden="true"></i>  Silver</a>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonnotselected" style="border: 3px solid #b2b2b2;width:100%;color: #b2b2b2;background-color: #fff;">Select</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin: 5px 0px;">
                                                <div>
                                                <!-- start -->
                                                <label style="width: 100%;">
                                                    <input  type="radio" name="designpackage" value="Gold"  >
                                                    <div class="package package--desktop package_list_group_item " >
                                                        <div class="package__box" >
                                                            <div class="package__box__inner">
                                                                <div class="bordered-box bordered-box--reduced-padding">
                                                                    <h4 class="headingtop">
                                                                        Gold
                                                                    </h4>
                                                                    <div>
                                                                        <p class="paragraph" style="margin-bottom: 10px;">
                                                                            Expect 7 designs</p>
                                                                    </div>
                                                                    <div class="bordered-box__bottom-right-element">
                                                                        <h5 class="heading " style="margin-bottom: 10px;">
                                                                            <span><span>40 Credits</span></span>
                                                                        </h5>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonselected" style="display:none;width:100%;color: #fff;background-color: #e0b48c;"><i class="fa fa-check" aria-hidden="true"></i>  Gold</a>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonnotselected" style="border: 3px solid #b2b2b2;width:100%;color: #b2b2b2;background-color: #fff;">Select</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin: 5px 0px;">
                                                <div>
                                                <!-- start -->
                                                <label style="width: 100%;">
                                                    <input  type="radio" name="designpackage" value="Platinum"  >
                                                    <div class="package package--desktop package_list_group_item " >
                                                        <div class="package__box" >
                                                            <div class="package__box__inner">
                                                                <div class="bordered-box bordered-box--reduced-padding">
                                                                    <h4 class="headingtop">
                                                                    Platinum
                                                                    </h4>
                                                                    <div>
                                                                        <p class="paragraph" style="margin-bottom: 10px;">
                                                                            Expect 9 designs</p>
                                                                    </div>
                                                                    <div class="bordered-box__bottom-right-element">
                                                                        <h5 class="heading " style="margin-bottom: 10px;">
                                                                            <span><span>50 Credits</span></span>
                                                                        </h5>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonselected" style="display:none;width:100%;color: #fff;background-color: #e0b48c;"><i class="fa fa-check" aria-hidden="true"></i>  Platinum</a>
                                                                    </div>
                                                                    <div >
                                                                        <a class="btn buttonnotselected" style="border: 3px solid #b2b2b2;width:100%;color: #b2b2b2;background-color: #fff;">Select</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                                <!-- end -->
                                                </div>
                                            </div>
                                            <!--  -->
                                        </div>
                                        <h2 style="margin-bottom:15px;margin-top:15px;" >Contest options</h2>
                                        <h6 style="margin-bottom:15px;" >Customize your contest to suit your need</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectname"> Contest Title : <span class="danger">*</span>
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
                                                    <label for="hearaboutus"> How did you hear about 99designs? : <span
                                                            class="danger">*</span> </label>
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
                                                    <label for="companydigital"> Is your company a digital, marketing or design agency? : <span
                                                            class="danger">*</span> </label>
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
                                                    <label for="oftendesignneed"> How often do you (or your business) have new design needs? : <span
                                                            class="danger">*</span> </label>
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
                                                    <label for="employesno"> How many employees does your company have including yourself? : <span
                                                            class="danger">*</span> </label>
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
        if($form_type == "T-shirt"){
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
            if ($("#productrequired").val() == "") {
                $("#productrequired").css('border-color', 'red');
                $("#productrequired").css('border-width', '2px');
                $("#productrequired").attr('placeholder', 'Required Field');
                error = error + 'productrequired';
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
        <?php
        }elseif(($form_type == "Clothing-or-apparel") or ($form_type == "Jersey") or ($form_type == "Sweatshirt-Hoodie")){
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
            if ($("#productrequired").val() == "") {
                $("#productrequired").css('border-color', 'red');
                $("#productrequired").css('border-width', '2px');
                $("#productrequired").attr('placeholder', 'Required Field');
                error = error + 'productrequired';
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
            if ($("#projectdescriptionmain").val() == "") {
                $("#projectdescriptionmain").css('border-color', 'red');
                $("#projectdescriptionmain").css('border-width', '2px');
                $("#projectdescriptionmain").attr('placeholder', 'Required Field');
                error = error + 'projectdescriptionmain';
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
        }elseif(($form_type == "Merchandise") or ($form_type == "Other-clothing-or-merchandise")){
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
                if ($("#projectdescription").val() == "") {
                    $("#projectdescription").css('border-color', 'red');
                    $("#projectdescription").css('border-width', '2px');
                    $("#projectdescription").attr('placeholder', 'Required Field');
                    error = error + 'projectdescription';
                } else {
                    // $("#wfirstName2").css('border-color','white');
                    // $("#wfirstName2").css('border-width','1px');
                }
                if ($("#projectdescriptionmain").val() == "") {
                    $("#projectdescriptionmain").css('border-color', 'red');
                    $("#projectdescriptionmain").css('border-width', '2px');
                    $("#projectdescriptionmain").attr('placeholder', 'Required Field');
                    error = error + 'projectdescriptionmain';
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
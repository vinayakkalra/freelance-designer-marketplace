<?php

    session_start();


    $error = "";  

    if (array_key_exists("submit", $_POST)) {

        // connection.php for connecting to database

        include("./php/config.php");
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            // checking signup or log in
        if ($_POST['signUp'] == '1') {

                if (!$_POST['email']) {
            
                    $error .= "An Email address is required<br>";
                    
                } 
                
                if (!$_POST['password']) {
                    
                    $error .= "A Password is required<br>";
                    
                } 
                if (!$_POST['name']) {
            
                     $error .= "A Name is required<br>";
            
                        } 
                if (!$_POST['phone']) {
                    
                    $error .= "A Phone number is required<br>";
                    
                } 
                if (!$_POST['confirmpassword']) {
                    
                    $error .= "A Confirm password is required<br>";
                    
                } 
                if ($_POST['confirmpassword'] !=  $_POST['password'] ) {
                    
                    $error .= "Password and Confirm password fields do not match<br>";
                    
                } 
                if ($error != "") {

                    $error = "<p>There were error(s) in your form:</p>".$error;
                    
                }
                     else
                {

                    $tablename = $_POST['fileformat'];
                // checking email already taken or not
                $query = "SELECT id FROM `$tablename` WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {
                    $data = array();  
                    $from_ip = $_SERVER['REMOTE_ADDR'];
                    $from_browser = $_SERVER['HTTP_USER_AGENT'];
                    date_default_timezone_set("Asia/Calcutta");
                    $date_now = date("r");


                    // inserting email and password
                    $query = "INSERT INTO `$tablename` (`email`, `password`,`name`, `phone`,`from_ip`, `from_browser`,`time`) VALUES ('".mysqli_real_escape_string($conn, $_POST['email'])."', '".mysqli_real_escape_string($conn, $_POST['password'])."','".mysqli_real_escape_string($conn, $_POST['name'])."','".mysqli_real_escape_string($conn, $_POST['phone'])."','$from_ip', '$from_browser','$date_now')";

                    if (!mysqli_query($conn, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {


                        // setting password with md5
                        $currentrowid = mysqli_insert_id($conn) ;
                        $hashed_password1 = hash("sha512", $currentrowid);
                        $hashed_password2 =  $hashed_password1.$_POST['password'];
                        $hashed_password3 = hash("sha512",$hashed_password2);

                        $query = "UPDATE `$tablename` SET password = '".$hashed_password3."' WHERE id = ".mysqli_insert_id($conn)." LIMIT 1";
                       
                        
                        $id = mysqli_insert_id($conn);
                        // $name = mysqli_insert_name($conn);
                        //  $email = mysqli_insert_email($conn);
                        mysqli_query($conn, $query);

                        $_SESSION['iddashboard'] = $id;
                        $_SESSION['signupas'] = $tablename;
                        // $_SESSION['email'] = $email;
                        // $querysec = "SELECT * FROM `$tablename` WHERE id = ".mysqli_insert_id($conn)." LIMIT 1";
                        // $result = mysqli_query($conn, $querysec);
                        // $row = mysqli_fetch_array($result);
                        // if (isset($row)) {
                        //     $_SESSION['email'] = $row['email'];
                        // }

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("iddashboard", $id, time() + 60*60*24*365);
                            setcookie("signupas", $tablename, time() + 60*60*24*365);

                        } 
                        if($tablename == "client"){
                            header("Location: client_dashboard.php");
                            }else{
                                ?>
                                    <script>alert("Please SignUp AS Client")</script>
                                <?php
                            }
                        // header("Location: My_Courses");

                    }

                } 
                
            } 
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

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="d-none d-lg-block">
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">

            <div class="login-register"
                style="/* display: flex; */position: relative;position: fixed;height: 100%;/* align-items: center; */background-image:url(../assets/images/background/login-register.jpg);">
            </div>
            <div
                style="width: 100%;/* justify-content: center; */position: absolute;top: 50%;height: 100%;margin: 120px auto;transform: translateY(-50%);/* height: 100%; */">
                <div
                    style="width: 100%;align-items: center;height: 100%;/* margin: 120px auto; */justify-content: center;display:flex;">
                    <div class="login-box card" style="position: absolute;top: 50%;transform: translateY(-50%);">
                        <div class="card-body">
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
                            <form class="form-horizontal form-material" id="signUpForm" method="post">
                                <h3 class="box-title m-b-20">Sign Up</h3>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <!-- <input class="form-control" type="text" placeholder="Email"> -->
                                        <input class="form-control textradius" type="number" name="phone"
                                            placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="confirmpassword"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group" style="display: flex;">
                                    <div style="width: 40%;align-items: center;display: flex;">
                                        <label class="form-control" style="margin-bottom: 3px;">Sign Up as </label>
                                    </div>
                                    <div style="width: 60%;">
                                        <select class="form-control" name="fileformat" id="fileformat">
                                            <option>client</option>
                                            <option>designer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 font-14" style="padding: 0 !important;">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            <input id="checkbox-signup" name="stayLoggedIn" value=1 type="checkbox">
                                            <label for="checkbox-signup"> Stay logged in </label>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                                    </div>
                                </div>
                            </div> -->
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="signUp" value="1">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            name="submit" type="submit">Sign Up</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <div>Already have an account? <a href="pages-login - Copy.php"
                                                class="text-info m-l-5"><b>Log In</b></a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="d-lg-none">
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">

            <div class="login-register"
                style="/* display: flex; */position: relative;position: fixed;height: 100%;/* align-items: center; */background-image:url(../assets/images/background/login-register.jpg);">
            </div>
            <div
                style="width: 100%;/* justify-content: center; */position: absolute;top: 50%;height: 100%;margin: 200px auto;transform: translateY(-50%);/* height: 100%; */">
                <div
                    style="width: 100%;align-items: center;height: 100%;/* margin: 120px auto; */justify-content: center;display:flex;">
                    <div class="login-box card" style="position: absolute;top: 50%;transform: translateY(-50%);">
                        <div class="card-body">
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
                            <form class="form-horizontal form-material" id="signUpFormmob" method="post">
                                <h3 class="box-title m-b-20">Sign Up</h3>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <!-- <input class="form-control" type="text" placeholder="Email"> -->
                                        <input class="form-control textradius" type="number" name="phone"
                                            placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="confirmpassword"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group" style="display: flex;">
                                    <div style="width: 40%;align-items: center;display: flex;">
                                        <label class="form-control" style="margin-bottom: 3px;">Sign Up as </label>
                                    </div>
                                    <div style="width: 60%;">
                                        <select class="form-control" name="fileformat" id="fileformat">
                                            <option>client</option>
                                            <option>designer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 font-14" style="padding: 0 !important;">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            <input id="checkbox-signupmob" name="stayLoggedIn" value=1 type="checkbox">
                                            <label for="checkbox-signupmob"> Stay logged in </label>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <!-- <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                                    </div>
                                </div>
                            </div> -->
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="signUp" value="1">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            name="submit" type="submit">Sign Up</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <div>Already have an account? <a href="pages-login - Copy.php"
                                                class="text-info m-l-5"><b>Log In</b></a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
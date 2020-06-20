<?php

    session_start();
    if ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "client") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "client" )) {
        header('location:client_dashboard');
    }
     elseif ((array_key_exists("iddashboard", $_SESSION) and $_SESSION['iddashboard'] and $_SESSION['signupas'] == "designer") or (array_key_exists("iddashboard", $_COOKIE) and $_COOKIE['iddashboard']  and $_COOKIE['signupas'] == "designer" )) {
        header('location:designer_dashboard');
    } 
    // 

    $error = "";  

    if (array_key_exists("submit", $_POST)) {

        // connection.php for connecting to database

        include("./php/config.php");
        
       
      
        
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            // checking log in
        if ($_POST['changepassword'] == '1') 
        
        {
            if (!$_POST['email']) {
            
                $error .= "An Email address is required<br>";
                
            } 
            
            if (!$_POST['password']) {
                
                $error .= "A Password is required<br>";
                
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
            
                    
                    // checking email for log in
                    $tablename = $_POST['fileformat'];
                    $query = "SELECT * FROM `$tablename` WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."'";
                
                    $result = mysqli_query($conn, $query);
                
                    $row = mysqli_fetch_array($result);

                    // if email match then fetch array
                    if (isset($row)) {
                        
                        // concatinating row id to password for md5 password
                        $currentrowidcheck = $row['id'] ;
                        $hashed_password1check = hash("sha512", $currentrowidcheck);
                        $hashed_password2check =  $hashed_password1check.$_POST['password'];
                        $hashedPassword = hash("sha512",$hashed_password2check);
                        $query = "UPDATE `$tablename` SET password = '".$hashedPassword."' WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."' LIMIT 1";
                        mysqli_query($conn, $query);
                        header("Location: login");
                        // $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        
                    } else {
                        
                        $error = "Invalid Registered Email .";
                        
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
    <meta name="description" content="Accept and complete design requests and earn money or find a designer and get the perfect design.">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Forgot Password?</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                style="/* display: flex; */position: relative;position: fixed;height: 100%;/* align-items: center; */background-image:url(assets/images/background/login-register.jpg);">
            </div>
            <div
                style="width: 100%;/* justify-content: center; */position: absolute;top: 50%;height: 100%;margin: 100px auto;transform: translateY(-50%);/* height: 100%; */">
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
                            <form class="form-horizontal form-material" id="logInForm" method="post">
                                <h3 class="box-title m-b-20">Forgot Password?</h3>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-group">
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
                                <div class="form-group" style="display: flex;">
                                    <div style="width: 40%;align-items: center;display: flex;">
                                        <label class="form-control" style="margin-bottom: 3px;">You are </label>
                                    </div>
                                    <div style="width: 60%;">
                                        <select class="form-control" name="fileformat" id="fileformat">
                                            <option>client</option>
                                            <option>designer</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-12 font-14">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            <input id="checkbox-signup" name="stayLoggedIn" value=1 type="checkbox">
                                            <label for="checkbox-signup"> Remember me </label>
                                        </div> -->
                                        <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>  Forgot pwd?</a>  -->
                                    <!-- </div> -->
                                <!-- </div> -->
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="changepassword" value="1">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            name="submit" type="submit">Change Password</button>
                                    </div>
                                </div>
                                <!-- <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div> -->
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <div>Don't have an account? <a href="index"
                                                class="text-info m-l-5"><b>Sign Up</b></a></div>
                                    </div>
                                </div>
                            </form>
                            <!-- <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                         </div> -->
                            <!-- </form>  -->
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
                style="/* display: flex; */position: relative;position: fixed;height: 100%;/* align-items: center; */background-image:url(assets/images/background/login-register.jpg);">
            </div>
            <div
                style="width: 100%;/* justify-content: center; */position: absolute;top: 50%;height: 100%;margin: 80px auto;transform: translateY(-50%);/* height: 100%; */">
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
                            <form class="form-horizontal form-material" id="logInFormmob" method="post">
                                <h3 class="box-title m-b-20">Forgot Password?</h3>
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-group">
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
                                <div class="form-group" style="display: flex;">
                                    <div style="width: 40%;align-items: center;display: flex;">
                                        <label class="form-control" style="margin-bottom: 3px;">You are </label>
                                    </div>
                                    <div style="width: 60%;">
                                        <select class="form-control" name="fileformat" id="fileformat">
                                            <option>client</option>
                                            <option>designer</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-12 font-14">
                                        <div class="checkbox checkbox-primary pull-left p-t-0">
                                            <input id="checkbox-signupmob" name="stayLoggedIn" value=1 type="checkbox">
                                            <label for="checkbox-signupmob"> Remember me </label>
                                        </div> -->
                                        <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>  Forgot pwd?</a>  -->
                                    <!-- </div> -->
                                <!-- </div> -->
                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="changepassword" value="1">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            name="submit" type="submit">Change Password</button>
                                    </div>
                                </div>
                                <!-- <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div> -->
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <div>Don't have an account? <a href="index"
                                                class="text-info m-l-5"><b>Sign Up</b></a></div>
                                    </div>
                                </div>
                            </form>
                            <!-- <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                         </div> -->
                            <!-- </form>  -->
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
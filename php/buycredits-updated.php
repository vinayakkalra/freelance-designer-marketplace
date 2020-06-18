
<?php

//require_once 'PHPMailer.php';
//require_once 'Exception.php';
//require_once 'SMTP.php';
session_start();
// ini_set( "display_errors", 0); 
// require './php/config.php';
require 'config.php';

if(isset($_POST['name'])){

    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $creditname = mysqli_real_escape_string($conn, $_POST['creditname']) ;
    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $total = $_POST['total'];
    $money = $_POST['money'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $status = "Paid";
    $id = $_POST['id'];
    $query = "UPDATE `credits` SET `status` = 'paid', `razorpay_payment_id` = '$razorpay_payment_id' WHERE `id` = $id ";
    if($result = mysqli_query($conn, $query))  
    {  
        $querysec = "SELECT * FROM `client` WHERE email = '".mysqli_real_escape_string($conn, $email)."' limit 1";
            if ($resultsec = mysqli_query($conn, $querysec)) {
            while( $rowsec = mysqli_fetch_array($resultsec)){
                $freelancer = $rowsec['freelancer'];
                $Credits = $rowsec['Credits'];
                $startups = $rowsec['startups'];
                $sme = $rowsec['sme'];
            if($creditname == "Freelancer"){
                $Credits = $Credits + $total;
                $freelancer = $freelancer + 1;
                // echo  $freelancer ;
                // echo $Credits ;
    
                $query = "UPDATE `client` SET `freelancer` =  $freelancer , `Credits` =  $Credits  WHERE email = '".mysqli_real_escape_string($conn, $email)."' ";
                if($result = mysqli_query($conn, $query))  
                    {  
                        $data['statuss'] = 'ok';
                        // $data['id'] = $id;
                        echo json_encode($data);
                    } 
            }elseif($creditname == "Startup"){
                $Credits = $Credits + $total;
                $startups = $startups + 1;
                // echo  $freelancer ;
                // echo $Credits ;
    
                $query = "UPDATE `client` SET `startups` =  $startups , `Credits` =  $Credits  WHERE email = '".mysqli_real_escape_string($conn, $email)."' ";
                if($result = mysqli_query($conn, $query))  
                    {  
                        $data['statuss'] = 'ok';
                        // $data['id'] = $id;
                        echo json_encode($data);
                    } 
            }elseif($creditname == "SME"){
                $Credits = $Credits + $total;
                $sme = $sme + 1;
                // echo  $freelancer ;
                // echo $Credits ;
    
                $query = "UPDATE `client` SET `sme` =  $sme , `Credits` =  $Credits  WHERE email = '".mysqli_real_escape_string($conn, $email)."' ";
                if($result = mysqli_query($conn, $query))  
                    {  
                        $data['statuss'] = 'ok';
                        // $data['id'] = $id;
                        echo json_encode($data);
                    } 
            }
              
            }
        }
            
            
           
        
    }
}
  

?>
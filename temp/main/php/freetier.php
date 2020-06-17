<?php

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

    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $total = $_POST['total'];
    $Freetier = "Free Tier";
    $querysec = "SELECT * FROM `client` WHERE email = '".mysqli_real_escape_string($conn, $email)."'";
    if ($resultsec = mysqli_query($conn, $querysec)) {
      while( $rowsec = mysqli_fetch_array($resultsec)){

          if( $rowsec['freetier'] != 0 ){  
            $data['status'] = 201;
            // $data['id'] = $id;
            echo json_encode($data);


          }else{
              $credits = $rowsec['Credits'];
              $val = 1;
              $credits = $credits + $total;

            $query = "UPDATE `client` SET `freetier` =  $val , `Credits` =  $credits  WHERE email = '".mysqli_real_escape_string($conn, $email)."' ";
            if($result = mysqli_query($conn, $query))  
                {  
                    $data['status'] = 202;
                    // $data['error'] = $conn -> error;
                    echo json_encode($data);
                } 
          }
        }
    }

}


?>

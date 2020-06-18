
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
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $total = $_POST['total'];
    $money = $_POST['money'];
    $status = "Processing";
    $id = 0;

    $result = mysqli_query($conn, "SELECT max(id) FROM `credits`");

    while ($row = mysqli_fetch_array($result)) {
        $id = $row[0];  
    }
    $id = $id + 1;

    $query = "INSERT INTO `credits` (`id`, `name`, `phone`, `email`, `credit_name`,`date_now`, `from_ip`, `from_browser`, `status`) VALUES ('$id','$name', '$phone', '$email', '$creditname','$date_now','$from_ip', '$from_browser','$status')";

    if($result = mysqli_query($conn, $query))  
    {  
        $data['status'] = 201;
        $data['id'] = $id;
        $data['money'] = $money;
        $data['creditname'] = $creditname;
        $data['total'] = $total;

        echo json_encode($data);
    }  
    else  
    {  
        $data['status'] = 202;
        $data['error'] = $conn -> error;
        echo json_encode($data);
    } 

}

?>
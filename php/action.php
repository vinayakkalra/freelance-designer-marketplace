<?php

session_start();
// ini_set( "display_errors", 0); 
// require './php/config.php';
require 'config.php';
if(isset($_POST['cid'])){
    $cid =$_POST['cid'];
    $cname =$_POST['cname'];
    $cemail =$_POST['cemail'];
    $demail =$_POST['demail'];
    $dname =$_POST['dname'];
    $did =$_POST['did'];
    $dtablename =$_POST['dtablename'];
    $customertablename =$_POST['customertablename'];
    $querysec = "SELECT * FROM `$customertablename` WHERE email = '".mysqli_real_escape_string($conn, $cemail)."' AND orderid = '".mysqli_real_escape_string($conn, $cid)."'";
                        if ($resultsec = mysqli_query($conn, $querysec)) {
                          while( $rowsec = mysqli_fetch_array($resultsec)){

                              if( $rowsec['status'] != "Submitted"){  
                                $data['status'] = 201;
                                // $data['id'] = $id;
                                echo json_encode($data);


                              }else{
                                $status = "status";
                                $accepted = "Processing";
                                $designer_accept_email = "designer_accept_email";
                                $designer_accept_name = "designer_accept_name";
                                $designer_accept_id = "designer_accept_id";
                                $no_request_accepted = "no_request_accepted";
                                $query = "UPDATE `$customertablename` SET `$status` =  '".mysqli_real_escape_string($conn, $accepted)."' , `$designer_accept_email` = '".mysqli_real_escape_string($conn, $demail)."' , `$designer_accept_name` = '".mysqli_real_escape_string($conn, $dname)."' , `$designer_accept_id` = '".mysqli_real_escape_string($conn, $did)."'  WHERE orderid = '".mysqli_real_escape_string($conn, $cid)."'";
                                if(!$result = mysqli_query($conn, $query)){
                                  
                                }else{
                                  $querysec = "SELECT * FROM `$dtablename` WHERE email = '".mysqli_real_escape_string($conn, $demail)."' AND id = $did";
                                  if ($resultsec = mysqli_query($conn, $querysec)) {
                                    while( $rowsec = mysqli_fetch_array($resultsec)){
                                      $no_of_requests_accepted = $rowsec['no_request_accepted'];
                                      $no_of_requests_accepted = $no_of_requests_accepted + 1 ;
                                      $query = "UPDATE `$dtablename` SET `$no_request_accepted` =  $no_of_requests_accepted  WHERE id = $did";
                                      if($result = mysqli_query($conn, $query)){
                                        $data['status'] = 200;
                                        // $data['id'] = "good not at all first";
                                        echo json_encode($data);
                                       
                                      }
                                      else{
                                        $data['status'] = 202;
                                        // $data['id'] = "good not at all first";
                                        echo json_encode($data);
                                       }
                                    }
                                  }
                                 

                                }

                              }
                          }
                        }
    
}
?>


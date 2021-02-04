<?php
  $conn= new mysqli("localhost","content_engine","aTArVkjN6Fa5","content_engine");
  // $conn= new mysqli("localhost","root","","content_engine");
  if($conn->connect_error){
      die("connection Failed" .$conn->connect_error);
  }


?>
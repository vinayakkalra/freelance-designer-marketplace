<?php
  $conn= new mysqli("localhost","root","","content_engine");
  if($conn->connect_error){
      die("connection Failed" .$conn->connect_error);
  }


?>
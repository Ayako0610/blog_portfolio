<?php
  function conn(){
   $servername = "localhost";
   $username = "root";
   $password = "";
  $database = "blog2" ;
  
  $conn = new mysqli($servername,
  $username,$password,$database);

  if($conn->connect_error){
    die("conection faild:".$conn->connect_error);
  }
 return $conn;
 }
?>
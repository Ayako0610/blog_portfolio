<?php session_start(); ?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta >
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login.php</title>
</head>
<body>

  <div class="container-fluid">
    <div class="jumbotron bg-primary text-white"><i class="fas fa-user-check">LOG-IN</i></div>
  </div>

  <class="container-fluid style="margin-top:100px;">
    <h2 class="display-3 text-center mt-4">
           Login
      </h2>
    </div>

    <div class="container-fluid">
      <form action="" method ="post">
    
         <input type="text" class="form-control m-6"
          name="username" placeholder="USERNAME" required>

          <input type="password" class="form-control m-6" name="password"  placeholder="PASSWORD" required>
        
         <input type="submit" class="form-control text-center m-6 btn-md bg-success btn-success" name="login" value="Enter">
      </form>
      
      <button type="button "  class="form-control btn btn-light btn-md bg-white margin-left"> 
       <a href=""> Create an Account </a></button>  
      <hr>
      <button type="button " class="form-control btn btn-light btn-md bg-white m-1 margin-right"> Recover Account </button> 

    </div>
  </div>
  

  <script src="https://kit.fontawesome.com/1f22affdad.js" crossorigin="anonymous"></script>
</body>
</html>

<?php

function checkUserLogin(){
  require_once 'connection.php';
  $conn = conn();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $SQLUser = "SELECT * ,CONCAT(`first_name`,'',`last_name`)AS fullname FROM `accounts`
  INNER JOIN users ON accounts.account_id =users.account_id
   WHERE `username`='$username'";
  $resultSQL = $conn->query($SQLUser);
  $RowResult = $resultSQL->fetch_assoc();
  $NoofResult =$resultSQL->num_rows;

  if($NoofResult <1){
  echo "Cannot find username like this:", $username;
}else{
  if(password_verify($password,$RowResult['password'])){
    $_SESSION['user_id']=$RowResult['user_id'];
    $_SESSION['fullname']=$RowResult['fullname'];
    $_SESSION['username']=$RowResult['username'];
    
    header('location:dashbord.php');
  }else{
    echo "Your Password is  not correct";
    
  }
}

}
if(isset($_POST['login'])){
  checkUserLogin();
}
include 'footer.php';
?>
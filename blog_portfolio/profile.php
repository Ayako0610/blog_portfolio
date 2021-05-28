<?php
$user_id = $_GET['id'];
require_once 'connection.php';
$conn= conn();
$sql="SELECT *  FROM `users` INNER JOIN accounts ON users.account_id =accounts.account_id WHERE user_id =$user_id";
$sqlResult = $conn->query($sql);
$rows = $sqlResult->fetch_assoc();
$first_name = $rows['first_name'];
$last_name = $rows['last_name'];
$contactnum =$rows['contact_number'];
$address = $rows['address'];
$pass = $rows['password'];
$username =$rows['username'];
$account_id =$rows['account_id'];

?>
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
  <title>Document</title>
</head>
<body>
<?php include 'adminMenu.php';
?>
  <div class="container-fluid">
    <div class="jumbotron bg-primary text-white"><i class="fas fa-user-alt">Profile</i></div>
  </div>

  
  <div class="container mx-auto mt-5 my-5">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary btn-lg w-100" role="button" ><i
                    class="fas fa-plus-circle"></i> Change Password</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-success btn-lg w-100" role="button" ><i
                    class="fas fa-folder-plus"></i> Delate Account</a>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-8">
          <div class="container">
            <form action="" method="post">
                <input name="user_id" value="<?php echo $user_id?>" hidden>

                <input name="account_id" value="<?php echo $account_id?>" hidden>

                <div class="input-group">
                  <input type="firstname" class="form-control"
                  name="firstname" placeholder="First name" value="<?php echo $first_name ?>"required>
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-file-signature bg-light"></i></span>
                </div>
                </div>

                <input type="lastname" class="form-control m-1"
                name="lastname" placeholder="Last Name"
                value="<?php echo $last_name ?>" 
                required>
      
                <input type="number" class="form-control m-1" name="number"  placeholder="Contactnumber"
                value="<?php echo $contactnum ?>" required>
      
                <input type="address" class="form-control m-1" name="address"  placeholder="address" 
                value="<?php echo $address ?>"
                required>
      
                <input type="username"  class="form-control m-1"  name="username"  
                value="<?php echo $username ?>"
                placeholder="User Name" required>
      
                <div class="input-group">
                <input type="password" class="form-control m-1"
                name="password" placeholder="password" 
                value="<?php echo $pass ?>"required >
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-unlock-alt bg-light">
                    </i>
                  </span>
                </div>
                </div>
                <button type="submit " name="update" class="form-control btn btn-dark btn-md bg-primary m-1"> UPDATE </button>  
      
            </div>
          </div>
            </form>
            <div class="col-md-4">
              <div class="card " style="width: 18rem;">
                <div class="card-body bg-light container-fluid">
                  <p class="card-text text-white text-center">
                  <i class="fas fa-portrait text-dark"></i>
                  <button type="button " class="form-control btn btn-light btn-md bg-light m-1"> Choose File </button> 
                  </p>
                </div>
                </div>
                
            </div>
          </div>
        </div>
        
    </div>
  
  <script src="https://kit.fontawesome.com/1f22affdad.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
function update(){
  require_once 'connection.php';
  $conn = conn();
  $first_name =$_POST['firstname'];
  $last_name = $_POST['lastname'];
  $contactnum =$_POST['number'];
  $address = $_POST['address'];
  $username = $_POST['username'];
  $pass =$_POST['password'];
  $user_id = $_POST['user_id'];
  $account_id = $_POST['account_id'];
  $hashpassword = password_hash($pass,PASSWORD_DEFAULT);

  $updateU = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`contact_number`='$contactnum',`address`='$address' WHERE user_id= '$user_id'";
  $updateA ="UPDATE `accounts` SET `username`='$username',`password`='$hashpassword' WHERE account_id='$account_id'";

  if($conn->query($updateU) && $conn->query($updateA)){
    echo "UP DATE YOUR ACCOUNT";
  
  }else{
    echo" CANNOT UP DATE";
  
  }

}
if(isset($_POST['update'])){
  update();
}

include 'footer.php';
?>
<?php
session_start();
require_once 'connection.php';
$conn = conn();

$username = $_SESSION['username'];
$id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse"
  data-target="#navbar_nav">
</button>

<div class="collapse navbar-collapse" id="navbar_nav">
  <ul class="navbar-nav">
    <li class="navbar-item active">
      <a class="nav-link disabled" href="#">
        Blogen
      </a>
    </li>
    
    <li class="navbar-item active">
      <a class="nav-link " href="dashbord.php">
        Dashbord
      </a>
    </li>

    <li class="navbar-item active">
      <a class="nav-link " href="Users.php">
        Users
      </a>
    </li>

    <li class="navbar-item active">
      <a class="nav-link " href="post.php">
        Posts
      </a>
    </li>
      
    <li class="navbar-item active">
      <a class="nav-link " href="categorise.php">
        Categories
      </a>
    </li>

    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php?id=<?php echo $id ?>">
        WELCOME
        <?php echo $fullname; 
        ?>

          </a>
      </li>

        <li class="nav-item">
          
        <a href ="logout.php" class="text-white"><i class="mr-1 fas fa-user text-white mr-1"></i>Log Out</a>
           
          </a>
        </li>
      </ul>
</nav>
</div>
</body>
</html>

  
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta >
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   
  <title>Document</title>
</head>
<body>
<?php include 'adminMenu.php';
?>
<?php

?>
  <div class="container-fluid">
    <div class="jumbotron bg-primary text-white"><i class="fas fa-cog">Dashboard</i></div>
  </div>
  <div class="container mx-auto mt-5 my-5">
    <div class="row">
        <div class="col-md-4">
            <a href="AddPostByusers.php" class="btn btn-primary btn-lg w-100" role="button" ><i
                    class="fas fa-plus-circle"></i> Add Post</a>
        </div>
        <div class="col-md-4">
            <a href="categorise.php" class="btn btn-success btn-lg w-100" role="button" ><i
                    class="fas fa-folder-plus"></i> Add Category</a>
        </div>
        <div class="col-md-4">
            <a  href="register.php" class="btn btn-warning text-white btn-lg w-100" role="button" ><i
                    class="fas fa-user-plus"></i> Add User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
          <table class="table table-bordered table-dark">
            <Thead>
            <tr >
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date posted</th>
              <th>Details</th>
              </tr>
            </Thead>
      
            
    <?php
    require_once'connection.php';
    $conn = conn();
    $sql = "SELECT * FROM `posts` INNER JOIN categories ON posts.category_id =categories.category_id";
    $sqlResult = $conn->query($sql);
    if($sqlResult->num_rows >0){
      while($rows = $sqlResult->fetch_assoc()){
        echo "
            <tr>
            <td>".$rows['post_id']."</td>
            <td>".$rows['post_title']."</td>
            <td>".$rows['category_name']."</td>
            <td>".$rows['date_posted']."</td>
            <td><a href=''>Details</a></td>
            </tr>
             ";
      }
    }else{
      echo "NO RECORD FOUND";
    }

    ?>
      
            </tbody>
          </table>  
        </div>
        <div class="col-md-4">
            <div class="container bg-primary rounded text-center text-white p-3 mt-4">
                <h2>Posts</h2>
                <h3><i class="fas fa-pencil-alt"></i> 
                <?php require_once'connection.php';
                      $conn = conn();
                      $sql ="SELECT * FROM`posts`";

                      $sqlResult =$conn->query($sql);
                      echo "$sqlResult->num_rows";

                ?>
                </h3>
                <button class="btn btn-outline-light font-weight-bold text-uppercase "> 
                <a href="post.php"> view</a></button>
            </div>
            <div class="container bg-success rounded text-center text-white p-3 mt-4">
                <h3>Category</h3>
                <h2><i class="far fa-folder-open"></i> 
                <?php require_once'connection.php';
                      $conn = conn();
                      $sql ="SELECT * FROM`categories`";

                      $sqlResult =$conn->query($sql);
                      echo "$sqlResult->num_rows";

                ?>
                </h2>
                <button class="btn btn-outline-light font-weight-bold text-uppercase"> 
                <a href="categorise.php"> view</a></button>
            </div>
            <div class="container bg-warning rounded text-center text-white p-3 mt-4">
                <h3>Users</h3>
                <h2><i class="fas fa-users"></i>
                <?php require_once'connection.php';
                      $conn = conn();
                      $sql ="SELECT * FROM`users`";

                      $sqlResult =$conn->query($sql);
                      echo "$sqlResult->num_rows";

                ?>
                </h2>
                <button class="btn btn-outline-light font-weight-bold text-uppercase"> 
                <a href="Users.php"> view</a></button>
            </div>
        </div>
    </div>
  <script src="https://kit.fontawesome.com/1f22affdad.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
function dashbord(){
  require_once 'connection.php';
  $conn = conn();
  $username = $_POST['username'];
  $password=$_POST['password'];
  $first_name = $_POST['fname'];   
  $address = $_POST['address'];
  $hashpassword = password_hash    ($password,PASSWORD_DEFAULT);
  $last_name = $_POST['lname'];
}
  include 'footer.php';
?>
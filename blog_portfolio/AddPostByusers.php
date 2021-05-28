
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Activity4</title>
</head>
<body>
<?php include 'adminMenu.php';
?><?php
$username =$_SESSION['username'];
$account_id = $_SESSION['user_id'];

?>

  <div class="container-fluid "style="margin-top-:100px;">
    <h2 class="display-3 text-center mt-4">
      <i class="fas fa-edit"></i>
         Add Post
      </h2>
    </div>

    <div class="container">
      <form action="" method="post">
    
         <input type="text" class="form-control m-1"
          name="title" placeholder="title" required>

          <input type="date" class="form-control m-1" name="date"  placeholder="dd/mm/yyyy" required>

        
          <select class="form-control"  name="category">
          <?php
          require_once 'connection.php';
          $conn=conn();
          $sql="SELECT * FROM categories";
          $sqlResult = $conn->query($sql);
          if($sqlResult->num_rows > 0){
            
            while($rows=$sqlResult->fetch_assoc()){
              $cat_id = $rows['category_id'];
              $cat_name = $rows['category_name'];
              echo "<option value='$cat_id'>" .$cat_name. "</option> ";

            }
          }else{
            echo "<option selected disabled hidden>No Record</option>";
          }
          ?>
          </select>
  



          <input type="text border-bottom"  class="form-control m-1"  name="message"  placeholder="MESSAGE" required>

          <input name="account_id" type="number" value="<?php echo $account_id ?>" hidden>
          <input type="text" class="form-control m-1"
          name="auther" placeholder="Auther; username"  value="<?php echo $username ?>" required>

          <button type="submit" name="post" class="form-control btn btn-dark btn-md bg-dark m-1"> POST </button>  

        </div>
      </div>
    </div>
  </form>
  </div>
     
  </div>

  <script src="https://kit.fontawesome.com/1f22affdad.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
function AddPostByUsers(){
  require_once 'connection.php';
  $conn = conn();
  $title =$_POST['title'];
  $date =$_POST['date'];
  $category =$_POST['category'];
  $message =$_POST['message'];
  $auther =$_POST['auther'];
  $account_id = $_POST['account_id'];

  $insertAddPost ="INSERT INTO `posts`( `post_title`, `date_posted`, `category_id`, `post_message`, `account_id`) VALUES ('$title','$date','$category','$message','$account_id')";

  if($conn->query($insertAddPost)){
    echo "<div class='mt-3 alert-success text-center' role='alert'>
    <strong>ADDED NEW POST:</strong>".$title." 
    </div>";
  }else{
    echo "<div class='mt-3 alert-denger text-center' role='alert'>
    <strong>CANNOT ADD POST:</strong>".$title." 
    </div>", $conn->error;
  }

}
if(isset($_POST['post'])){
  AddPostByUsers();

}
include 'footer.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta >
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php include 'adminMenu.php';
?>
  <div class="container-fluid">
    <div class="jumbotron bg-primary text-white"><i class="fas fa-pencil-alt">Posts</i></div>
  </div>

  <div class="container-lg text-center">
    <p class="h2"><i class="fas fa-edit">Add Post</i></p>
    <table class="table table-bordered table-dark">
      <Thead>
      <tr >
        <th>Post ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Date posted</th>
        <th>tool</th>
        </tr>
      </Thead>

      
    <?php
    require_once'connection.php';
    $conn = conn();
    $sql = "SELECT * FROM `posts`";
    

    $sqlResult = $conn->query($sql);
    if($sqlResult->num_rows >0){
      while($rows = $sqlResult->fetch_assoc()){
        $post_id = $rows['post_id'];
        $post_title = $rows['post_title'];
        echo "
            <tr>
            <td>".$rows['post_id']."</td>
            <td>".$rows['post_title']."</td>
            <td>".$rows['category_id']."</td>
            <td>".$rows['date_posted']."</td>
            <td><a href='categorise.php'>VIEW</a></td>
            <td><a href='postUpdate.php? post_id=$post_id &post_title=$post_title' class='btn btn-primary btn-sm w-30' role='button' ><i
            class='fas fa-folder-plus'></i>Update</a>

            <a href='postDelet.php?post_id=$post_id &post_title=$post_title' class='btn btn-danger btn-sm w-30' role='button' ><i class='fas fa-trash-alt'></i> Delate </a>
            </td>
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

  
  <script src="https://kit.fontawesome.com/1f22affdad.js" crossorigin="anonymous"></script>
</body>
</html>
<?php include 'footer.php'; ?>
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
    <div class="jumbotron bg-danger text-white"><i class="fas fa-folder-open">Categories</i></div>
  </div>

<div class="container text-center mx-auto">
  <p> Add category</p>
 <form action="" method="post">
   <input type="text"  name="category" class="form-control mx-50 mx-auto" required>
   <button type="submit"  name="Add" class=" btn btn-success btn-md"> ADD
   </button>
 </form>
 

</div>
  <div class="container-lg text-center">
    <table class="table table-bordered table-dark">
      <Thead>
      <tr >
        <th>CATIGORY ID</th>
        <th>CATEGORY NAME</th>
        <th>Tools</th>
      </tr>
      </Thead>

      <tbody class="bg-white table-light text-dark"> 
      
  <?php
    require_once'connection.php';
    $conn = conn();
    $sql = "SELECT * FROM `categories`";
    $sqlResult = $conn->query($sql);
    if($sqlResult->num_rows >0){
      while($rows = $sqlResult->fetch_assoc()){
          $category_id = $rows['category_id'];
          $category_name = $rows ['category_name'];
        echo "
            <tr>
            <td>".$rows['category_id']."</td>
            <td>".$rows['category_name']."</td>
            <td><a href='updatecatgory.php?category_id=$category_id&category_name=$category_name 'class='btn btn-primary btn-sm w-30' role='button' ><i
            class='fas fa-folder-plus'></i>Update</a>

            <a href='delete.php?category_id=$category_id&category_name=$category_name' class='btn btn-danger btn-sm w-30' role='button' ><i class='fas fa-trash-alt'></i> Delate </a>
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

<?php
  function delete(){
   require_once'connection.php';
   $conn =conn();

  }

  function AddCategorise(){
    require_once 'connection.php';
    $conn = conn();
    $category =$_POST['category'];

    $insertCategory ="INSERT INTO `categories`( `category_name`) VALUES ('$category')";

    if($conn->query($insertCategory)){
       
      echo "<div class='mt-3 alert-success text-center' role='alert'>
      <strong>ADDED NEW CATEGORY:</strong>".$category." 
      </div>";
     
    }else{
      
      echo "<div class='mt-3 alert-danger text-center' role='alert'>
      <strong>CANNNOT ADD NEW CATEGORY:</strong>".$category.".$conn->error.
      </div>";
      
      
    }


  }
  if(isset($_POST['Add'])){
  AddCategorise();
  }

  include 'footer.php';
  ?>
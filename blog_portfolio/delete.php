<?php
 $catgory_id =$_GET['category_id'];
 $category_name = $_GET['category_name'];
 require_once 'connection.php';
 $conn =conn();



 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
 </head>
 <body>
   <?php include 'adminMenu.php'; ?>
 <div class='container mt-5 mx-auto'>
                        <form action='' method='post'>
                            <div class='form-row'>
                                <div class='form-group col-md-10 mx-auto'>
                                  <input type="text" name="category_id" value='<?php echo $catgory_id ?>'hidden>

                                    <input type='text' name='catgory_name' id='' class='form-control lighto custom-form rounded-0' require value='<?php echo $category_name ?>'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-10 mx-auto'>
                                <button type='submit' name='delete' class='btn btn-danger form-control mt-4'>DELETE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    ";

 </body>
 </html>

 <?php
   function DeletCat(){
     require_once 'connection.php';
     $conn = conn();
     $category_name = $_POST['catgory_name'];
     $catgory_id = $_POST['category_id'];

     $delete ="DELETE FROM `categories` WHERE `category_id`=$catgory_id";

     if( $conn->query($delete)){
       header ('location:categorise.php');
       echo "DELETE YOUR CATGORY";
    
     }else{
       echo"CANNOT UP DELETE".$conn->error;
     }

   }
   if(isset($_POST['delete'])){
    DeletCat();
   }
 ?>
 <?php 
  include 'footer.php'; ?>
<?php
 $post_id =$_GET['post_id'];
 $post_title = $_GET['post_title'];
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
                                  <input type="text" name="post_id" value='<?php echo $post_id ?>'hidden>

                                    <input type='text' name='post_title' id='' class='form-control lighto custom-form rounded-0' require value='<?php echo $post_title ?>'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-10 mx-auto'>
                                <button type='submit' name='update' class='btn btn-success form-control mt-4'>UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    

 </body>
 </html>

 <?php
   function UpdatePost(){
     require_once 'connection.php';
     $conn = conn();
     $post_id = $_POST['post_id'];
     $post_title = $_POST['post_title'];

     $updatePost ="UPDATE `posts` SET `post_title`='$post_title' WHERE post_id='$post_id'";

     if( $conn->query($updatePost)){
       header ('location:post.php');
       echo "UP DATE YOUR POST";
    
     }else{
       echo"CANNOT UP DATE".$conn->error;
     }

   }
   if(isset($_POST['update'])){
    UpdatePost();
   }
 ?>
 <?php 
  include 'footer.php'; ?>
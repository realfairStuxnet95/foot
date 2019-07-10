<?php 
require 'App/Views/Utils/auth.php';
require __DIR__.'/classes_loader.php';
$user_type=(int)$_SESSION['user_type'];
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Gasogi United Website Photos</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container">  
                <h3 align="center">Upload Images for Web Articles</h3><br />  
                <br />  
                <br />  
                <div align="center">  
                     <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Images</button>  
                </div>  
                <br /><br />  
                  <?php 
                  $photos=$article->getPhotos(10);
                  foreach ($photos as $key => $value) {
                    ?>
                    <div class="col-md-3" align="center">
                      <img src="upload/<?php echo $value['image_path']; ?>" style="width:200px;height: auto;margin:0px;">
                    </div>
                    <?php
                  }
                  ?>
                <br />  
                <br />  
           </div>  
           <br />  
      </body>  
 </html>  
 <div id="uploadModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Upload Multiple Files</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="upload_form">  
                          <label>Select Multiple Image</label>  
                          <input type="file" name="images[]" id="select_image" multiple />
                          <input style="margin:10px;" type="submit" class="btn btn-success btn-lg" name="upload" value="UPLOAD IMAGES"> 
                     </form>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#select_image').change(function(){3  
           //$('#upload_form').submit();  
      });  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           $.ajax({  
                url :"upload.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#select_image').val('');  
                     $('#uploadModal').modal('hide');  
                     if(data.match("200")){
                      location.reload();
                     }else{
                      alert("Something went wrong.Please check system Admin");
                     }
                }  
           })  
      });  
 });  
 </script> 
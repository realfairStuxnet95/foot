 <?php  
require 'App/Views/Utils/auth.php';
require __DIR__.'/classes_loader.php';
 $output = '';  
 if(is_array($_FILES))  
 {  
      foreach($_FILES['images']['name'] as $name => $value)  
      {  
           $file_name = explode(".", $_FILES['images']['name'][$name]);  
           $allowed_extension = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = rand() . '.'. $file_name[1];  
                $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                $targetPath = "../upload/".$new_name;  
                if(move_uploaded_file($sourcePath, $targetPath)){
                  $status=$article->save_article_photos($new_name);
                  if($status){
                    $output="200";
                  }else{
                    $output="403";
                  }
                }else{
                  $output="Something went wrong while uploading Image.";
                } 
           }  
      }  
      // $images = glob("upload/*.*");  
      // foreach($images as $image)  
      // {  
      //      $output .= '<div class="col-md-1" align="center" ><a href="'.$image.'" target="_blank"><img src="' . $image .'" width="100px" height="100px" style="margin-top:15px; padding:8px; border:1px solid #ccc;" /></a></div>';  
      // }  
      echo $output;  
      
 }  
 ?>
 <?php
 if($_FILES['poster']['name'] != '')  
 { 
 	  $tmp=explode(".", $_FILES['poster']['name']);
      $extension = end($tmp);  
      $allowed_type = array("jpg", "jpeg", "png", "gif","PNG");  
      if(in_array($extension, $allowed_type))  
      {
      	   //EXTRACT OTHER DATA FROM FORM
        require_once $_SERVER['DOCUMENT_ROOT'].'/access/classes_loader.php';
      	   $article_id=$function->sanitize($_POST['article_id']);
           $new_name = rand() . "." . $extension;  
           $path = $_SERVER['DOCUMENT_ROOT']."/access/assets/IMG/" . $new_name;
           if(move_uploaded_file($_FILES['poster']['tmp_name'], $path))  
           {  
            //save information into database.
            $status=$article->save_article_poster($article_id,$new_name);
            if($status){
              echo "200";
            }else{
              echo 'System Error Please Contact System Administrator.';
            }
           }else{
            echo "Error While Uploading Banner Please Contact System Administrator.";
           } 
      }  
      else  
      {  
        echo '<script>alert("Invalid File Formate")</script>';  
      }  
 }  
 else  
 {  
      echo '<script>alert("Please Select File")</script>';  
 }  
 ?>
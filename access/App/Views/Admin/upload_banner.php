 <?php
 if($_FILES['file']['name'] != '')  
 { 
 	  $tmp=explode(".", $_FILES['file']['name']);
      $extension = end($tmp);  
      $allowed_type = array("jpg", "jpeg", "png", "gif","PNG");  
      if(in_array($extension, $allowed_type))  
      {
      	   //EXTRACT OTHER DATA FROM FORM
        require_once $_SERVER['DOCUMENT_ROOT'].'/foot/access/classes_loader.php';
      	   $ads_id=$function->sanitize($_POST['ads_id']);
           $banner_id=(int)$function->sanitize($_POST['banner_id']);
           $new_name = rand() . "." . $extension;  
           $path = $_SERVER['DOCUMENT_ROOT']."/foot/access/assets/banners/" . $new_name;
           if(empty($banner_id)){
               if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
               {  
                //save information into database.
                $status=$banner->save_banner($ads_id,$new_name,$extension);
                if($status){
                  echo "200";
                }else{
                  echo 'System Error Please Contact System Administrator.';
                }
               }else{
                echo "Error While Uploading Banner Please Contact System Administrator.";
               } 
           }else{
            //check if banner is saved.
            $check_banner=$banner->check_banner_id($banner_id);
            if($check_banner){
               if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
               {  
                //save information into database.
                $status=$banner->update_banner($banner_id,$new_name);
                if($status){
                  echo "200";
                }else{
                  echo 'System Error Please Contact System Administrator.';
                }
               }else{
                echo "Error While Uploading Banner Please Contact System Administrator.";
               } 
            }else{
              echo "Nope you can't";
            }
           }
           die();
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
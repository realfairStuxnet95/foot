<?php
//upload.php
$response=true;
require_once $_SERVER['DOCUMENT_ROOT'].'/magazine_web/classes_loader.php';
$article_id=$function->sanitize($_POST['article']);
if(count($_FILES["file"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["file"]["name"]); $count++)
 {
  $file_name = $_FILES["file"]["name"][$count];
  $tmp_name = $_FILES["file"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  $location = 'files/' . $file_name;
  $new_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
  $path = $_SERVER['DOCUMENT_ROOT']."/magazine_web/assets/IMG/" . $new_name;
  if(move_uploaded_file($tmp_name, $path))
  {
    $status=$article->save_attachment($article_id,$new_name,$file_extension);
    if($status){
      $response=true;
    }else{
      $response=false;
    }
  }else{
    echo "Error While Uploading  Please Contact System Administrator.";
  }
 }
}else{
  echo "Please Select Files";
}
if($response){
  echo "200";
}else{
  echo "There was some Error in Uploading";
}
?>
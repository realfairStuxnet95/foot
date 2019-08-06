<?php
require $_SERVER['DOCUMENT_ROOT'].'/access/classes_loader.php';
$success="200";
$error="403";
if(isset($_POST['input'])){
	if(is_array($_POST['input'])){
		$input=$_POST['input'];
		//get action
		$action=$function->sanitize($input[0]);
		if($action=="save_user"){
			//grab inputs
			$names=$function->sanitize($input[1]);
			$email=$function->sanitize($input[2]);
			$phone=$function->sanitize($input[3]);
			$category=$function->sanitize($input[4]);
			$password=$function->sanitize($input[5]);
			if(strlen($names)>=5 && $function->isValidEmail($email)){
				if(strlen($phone)>=9){
					$status=$user->save_user($names,$email,$phone,$category,$password);
					if($status){
						echo "200";
					}else{
						echo "system Error Please contact system administrator.";
					}
				}else{
					echo "Phone number is not Correct";
				}
			}else{
				echo "Names must be atleast 5 Characters and check email.";
			}
		}elseif($action=="save_category"){
			//grab inputs
			$category=$function->sanitize($input[1]);
			$description=$function->sanitize($input[2]);
			$status=$article->save_article_category($category,$description);
			if($status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="save_article"){
			//grab inputs
			$title=$input[1];
			$description=$function->sanitize($input[2]);
			$category=$function->sanitize($input[3]);
			$body=htmlspecialchars($input[4]);
			$author_id=$function->sanitize($input[5]);
			//echo $body;
			//die();
			$save_status=$article->save_article($title,$description,$body,$category,$author_id);
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="update_article"){
			$title=$function->sanitize($input[1]);
			$description=$function->sanitize($input[2]);
			$category=$function->sanitize($input[3]);
			$body=htmlspecialchars($input[4]);
			$article_id=(int)$function->sanitize($input[6]);
			$status=$article->check_article_id($article_id);
			if($status){
				//update article now
				$update_status=$article->update_article($article_id,$title,$description,$body);
				// echo $update_status;
				// die();
				if($update_status){
					echo $success;
				}else{
					echo $error;
				}
			}else{
				echo $error;
			}
		}
		elseif($action=="publish_article"){
			//grab inputs
			$article_id=$function->sanitize($input[1]);
			$article_status='PUBLISHED';
			$status=$article->change_article_status($article_id,$article_status);
			if($status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="unpublish_article"){
			//grab inputs
			$article_id=$function->sanitize($input[1]);
			$article_status='SUBMITTED';
			$status=$article->change_article_status($article_id,$article_status);
			if($status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="trash_article"){
			//grab inputs
			$article_id=$function->sanitize($input[1]);
			$article_status='TRASHED';
			$status=$article->change_article_status($article_id,$article_status);
			if($status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="publish_comment"){
			$comment_id=$function->sanitize($input[1]);
			$save_status=$article->change_comment_status($comment_id,"ACTIVE");
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="unpublish_comment"){
			$comment_id=$function->sanitize($input[1]);
			$save_status=$article->change_comment_status($comment_id,"PENDING");
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="trash_comment"){
			$comment_id=$function->sanitize($input[1]);
			$save_status=$article->change_comment_status($comment_id,"TRASHED");
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="delete_banner"){
			$banner_id=$function->sanitize($input[1]);
			$save_status=$banner->change_banner_status($banner_id,"DELETED");
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}
		elseif($action=="change_article_status"){
			//grab inputs
			$article_id=$function->sanitize($input[1]);
			$article_status=$function->sanitize($input[2]);
			$status=$article->change_article_status($article_id,$article_status);
			if($status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="delete_document"){
			$document_id=$function->sanitize($input[1]);
			$remove_status=$article->remove_document($document_id);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="club_standing"){
			$club_id=$function->sanitize($input[1]);
			$points=$function->sanitize($input[2]);
			$update_status=$user->updateClubStandings($club_id,$points);
			if($update_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=="delete_match"){
			$match_id=$function->sanitize($input[1]);
			$delete_status=$user->deleteMatch($match_id);
			if($delete_status){
				echo $success;
			}else{
				echo $error;
			}
		}
		else{
			echo "Specify Action Please.";
		}
	}else{
		echo "500";
	}
}else{
	echo "500";
}
?>
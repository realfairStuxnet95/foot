<?php 

class Article extends Execute{
	public function get_articles_categories(){
		return $this->select_all_order_by(Tables::articles_categories(),"name",true);
	}
	public function save_article_category($name,$description){
		$array=array("name"=>$name,"description"=>$description,"status"=>'ACTIVE');
		return $this->multi_insert(Tables::articles_categories(),$array);
	}
	//function to save article
	public function save_article($title,$sub_title,$body,$category_id,$author_id){
		$today=date("Y-m-d");
		$array=array("category_id"=>$category_id,"sub_title"=>$sub_title,"title"=>$title,"text"=>$body,"status"=>'SUBMITTED','author_id'=>$author_id,"validate_date"=>$today);
		return $this->multi_insert(Tables::articles(),$array);
	}
	//function to update article
	public function update_article($article_id,$title,$sub_title,$body){
		$where=array("article_id"=>$article_id);
		$array=array("title"=>$title,"sub_title"=>$sub_title,"text"=>$body);
		return $this->query_update(Tables::articles(),$where,$array);
	}
	//get all articles
	public function get_recent_articles(){
		return $this->select_all_order_by(Tables::articles(),'article_id',false);
	}
	//check article id
	public function check_article_id($article_id){
		$credentials=array("article_id"=>$article_id);
		$number=$this->row_counter(Tables::articles(),$credentials);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	public function check_article_category($category_id){
		$credentials=array("category_id"=>$category_id);
		$number=$this->row_counter(Tables::articles_categories(),$credentials);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	//get article info
	public function get_article($article_id){
		$credentials=array("article_id"=>$article_id);
		return $this->select_multi_clause(Tables::articles(),$credentials);
	}
	//get article views
	public function get_article_views($article_id){
		$credentials=array("article_id"=>$article_id);
		$article_info=$this->select_multi_clause(Tables::articles(),$credentials);
		$views=0;
		foreach ($article_info as $key => $article) {
			$views=(int)$article['views'];
		}
		return $views;
	}

	public function update_article_views($article_id,$views){
		$where=array("article_id"=>$article_id);
		$array=array("views"=>$views);
		return $this->query_update(Tables::articles(),$where,$array);
	}
	//save article comment
	public function save_article_comment($article_id,$name,$email,$comment){
		$array=array("article_id"=>$article_id,"user_mail"=>$email,"user_names"=>$name,"comment"=>$comment,"status"=>"PENDING");
		return $this->multi_insert(Tables::comments(),$array);
	}
	//search article
	public function search_article($input){
		$query_search=array("title"=>$input,"sub_title"=>$input,"text"=>$input,"description"=>$input);
		$order_by="article_id";
		$status=false;
		return $this->search_all(Tables::articles(),$query_search,$order_by,$status);
	}
	public function get_articles_comments(){
		return $this->select_all_order_by(Tables::comments(),"comment_id",false);
	}
	public function change_comment_status($comment_id,$status){
		$where=array("comment_id"=>$comment_id);
		$array=array("status"=>$status);
		return $this->query_update(Tables::comments(),$where,$array);
	}
	//get article status
	public function get_article_status($article_id){
		$credentials=array("article_id"=>$article_id);
		$article_info=$this->select_multi_clause(Tables::articles(),$credentials);
		$article_status="";
		foreach ($article_info as $key => $value) {
			$article_status=$value['status'];
		}
		return $article_status;
	}
	//change article status
	public function change_article_status($article_id,$status){
		$where=array("article_id"=>$article_id);
		$array=array("status"=>$status);
		return $this->query_update(Tables::articles(),$where,$array);
	}
	//get category name from id
	public function get_articles_category_name($category_id){
		return $this->field_query(Tables::articles_categories(),"category_id",$category_id,"name");
	}

	//save article attachments
	public function save_attachment($article_id,$filename,$extension){
		$array=array("article_id"=>$article_id,"file_name"=>$filename,"extenstion"=>$extension,"file_type"=>$extension,"status"=>'PENDING');
		
		return $this->multi_insert(Tables::attachments(),$array);
	}
	//get article documents
	public function get_documents($article_id){
		$data=array("status"=>'DELETED');
		$credentials=array("article_id"=>$article_id);
		return $this->select_multi_not(Tables::attachments(),$credentials,$data);
	}
	//remove article document
	public function remove_document($attach_id){
		$data=array("status"=>'DELETED');
		$where=array("attach_id"=>$attach_id);
		return $this->query_update(Tables::attachments(),$where,$data);
	}
	public function not_test(){
		$data=array("status"=>'DELETED');
		$where=array("article_id"=>16);
		return $this->select_multi_not(Tables::attachments(),$where,$data);
	}
	//save new article poster
	public function save_article_poster($article_id,$filename){
		$data=array("status"=>'PENDING');
		$where=array("article_id"=>$article_id);
		$status=$this->query_update(Tables::articles_posters(),$where,$data);
		if($status){
			$array=array("article_id"=>$article_id,"filename"=>$filename,"status"=>'ACTIVE');
			return $this->multi_insert(Tables::articles_posters(),$array);
		}else{
			return false;
		}
	}
	//check if article has poster
	public function check_article_poster($article_id){
		$credentials=array("article_id"=>$article_id);
		$number=$this->row_counter(Tables::articles_posters(),$credentials);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	//get article poster
	public function get_article_poster($article_id){
		$credentials=array("article_id"=>$article_id,"status"=>'ACTIVE');
		return $this->select_multi_clause(Tables::articles_posters(),$credentials);
	}
	//get articles based on status
	public function get_articles_by_status($status){
		$credentials=array("status"=>$status);
		return $this->select_clause_order_by(Tables::articles(),$credentials,'article_id',false);
	}
	//get total articles in system
	public function get_articles_number(){
		return $this->table_rows(Tables::articles());
	}


	############################# PUBLIC WEBSITE SECTION ####################################
	public function get_featured_posts(){
		$credentials=array("status"=>Tables::publish_status());
		return $this->select_order_limit(Tables::articles(),$credentials,'article_id',6,false);
	}
	//get article author
	public function get_article_author($author_id){
		$credentials=array("user_id"=>$author_id,"status"=>'ACTIVE');
		$author=$this->select_multi_clause(Tables::users(),$credentials);
		$author_name="";
		foreach ($author as $key => $value) {
			$author_name=$value['names'];
		}
		return $author_name;
	}
	public function get_popula_post(){
		$credentials=array("status"=>Tables::publish_status());
		return $this->select_order_limit(Tables::articles(),$credentials,'article_id',2,false);
	}
	public function get_article_category($category_id){
		$credentials=array("category_id"=>$category_id,"status"=>'ACTIVE');
		$category=$this->select_multi_clause(Tables::articles_categories(),$credentials);
		$article_category="";
		foreach ($category as $key => $value) {
			$article_category=$value['name'];
		}
		return $article_category;
	}
	public function second_row(){
		$rows=$this->table_rows(Tables::articles());
		$diff=$rows-7;
		$credentials=array("article_id"=>$diff);
		$compare=array("status"=>Tables::publish_status());
		$less=array("article_id"=>$rows);
		return $this->select_greater_less_than(Tables::articles(),$credentials,$compare,$less);
	}
	public function single_row_content($category_id){
		$credentials=array("category_id"=>$category_id,"status"=>Tables::publish_status());
		return $this->select_clause_order_by(Tables::articles(),$credentials,'article_id',false);
	}

	public function get_article_comments($article_id){
		$credentials=array("article_id"=>$article_id,"status"=>'ACTIVE');
		return $this->select_clause_order_by(Tables::comments(),$credentials,'comment_id',false);
	}
	public function get_similar_articles($category_id,$current_article){
		$credentials=array("category_id"=>$category_id,"status"=>Tables::publish_status());
		$not=array("article_id"=>$current_article);
		
		return $this->select_all_not_order_by(Tables::articles(),$credentials,$not,"article_id",false);
	}
	//article listing +++++++++++++++
	//function to get top
	public function get_list_top_article($category_id){
		$credentials=array("category_id"=>$category_id);
		return $this->select_clause_order_by(Tables::articles(),$credentials,"article_id",false);
	}
	//+++++++++++++++++++++++++++++++++++++GET CATEGORIES++++++++++++++++++++++++++
	//get article comments counter
	public function get_article_comments_counter($article_id){
		$query="SELECT * FROM ".Tables::comments()." WHERE article_id=\"$article_id\" AND status='ACTIVE'";
		return $this->rows($query);
	}
	public function ubucukumbuzi($limit){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=40 OR category_id=39 OR category_id=38 OR category_id=37 OR category_id=36 ORDER BY article_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function architecture($limit){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=12 OR category_id=13 OR category_id=14 ORDER BY article_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function technology($limit){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=9 OR category_id=10 OR category_id=11 ORDER BY article_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function ibyegeranyo($limit,$status){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=15 OR category_id=16 OR category_id=17 OR category_id=34 or category_id=18 ORDER BY article_id DESC";
		if($status){
			$query.=" LIMIT ".$limit;
		}
		return $this->querying($query);
	}
	public function isoko($limit){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=28 OR category_id=29 OR category_id=30 OR category_id=31 OR category_id=41 AND status='PUBLISHED' ORDER BY article_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function ubugeni($limit,$status){
		$query="SELECT * FROM ".Tables::articles()." WHERE category_id=19 OR category_id=20 OR category_id=21 OR category_id=22 OR category_id=23 OR category_id=24 OR category_id=25 OR category_id=26 or category_id=27 AND status='PUBLISHED' ORDER BY article_id DESC";
		if($status){
			$query.=" LIMIT ".$limit;
		}
		return $this->querying($query);
	}
	public function popular_articles($limit,$status){
		$query="SELECT * FROM ".Tables::articles()." ORDER BY views DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function getAuthors($limit,$status){
		$query="SELECT * FROM ".Tables::users()." WHERE user_type=2 ORDER BY user_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	public function getAuthorArticles($author_id,$limit){
		$query="SELECT * FROM ".Tables::articles()." WHERE author_id=\"$author_id\" ORDER BY article_id DESC LIMIT ".$limit;
		return $this->querying($query);
	}
	############################ END OF PUBLIC WEBSITE SECTION ##############################
}
$article=new Article();
?>
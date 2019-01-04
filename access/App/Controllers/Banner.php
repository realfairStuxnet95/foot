<?php 

class Banner extends Execute{

	//get ads categories
	public function get_ads_categories(){
		return $this->select_all_order_by(Tables::advert_categories(),"name",true);
	}
	//get ads name from id
	public function get_ads_name($advert_id){
		return $this->field_query(Tables::advert_categories(),"advert_id",$advert_id,"name");
	}
	//get ads banners
	public function get_ads_banners($advert_id){
		$credentials=array("advert_id"=>$advert_id,"status"=>"ACTIVE");
		return $this->select_clause_order_by(Tables::banners(),$credentials,"banner_id",false);
	}
	public function save_banner($advert_id,$filename,$extension){
		$array=array("advert_id"=>$advert_id,"filename"=>$filename,"extension"=>$extension,"status"=>'ACTIVE');
		return $this->multi_insert(Tables::banners(),$array);
	}
	public function update_banner($banner_id,$filename){
		$where=array("banner_id"=>$banner_id);
		$array=array("filename"=>$filename);
		return $this->query_update(Tables::banners(),$where,$array);
	}
	public function change_banner_status($banner_id,$status){
		$where=array("banner_id"=>$banner_id);
		$array=array("status"=>$status);
		return $this->query_update(Tables::banners(),$where,$array);
	}
	public function check_banner_id($banner_id){
		$credentials=array("banner_id"=>$banner_id);
		$number=$this->row_counter(Tables::banners(),$credentials);
		$status=false;
		if($number>0){
			$status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	####################### PUBLIC SECTION ########################################
	public function get_public_banners($advert_id){
		$credentials=array("advert_id"=>$advert_id,"status"=>"ACTIVE");
		return $this->select_clause_order_by(Tables::banners(),$credentials,"banner_id",false);
	}
}
$banner=new Banner();
?>
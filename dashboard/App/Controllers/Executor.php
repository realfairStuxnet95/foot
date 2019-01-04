<?php 

class Execute extends Query{

	public function select_multi_clause($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function querying($query){
		return $this->select($query);
	}
	public function multi_select($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT ";
			$i=0;
			foreach ($credentials as $key => $value) {
				$query.=$key;
				if($i<(count($credentials)-1)){
					$query.=",";
				}
				$i++;
			}
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
}
?>
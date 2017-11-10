<?php 
class sourceDao extends Dao{
	public $table_name = 'third_source';
	private $fields = "name,sourceKey";
	public $table_third_source_url = 'third_source_url';
	private $fields_third_source_url = "sourceKey,book_id,chapter,start_time";

	public function insert($data) {
		$data = $this->init_db()->build_key($data, $this->fields);
		return $this->init_db()->insert($data, $this->table_name);
	}
	public function insertUrl($data) {
		$data = $this->init_db()->build_key($data, $this->fields_third_source_url);
		return $this->init_db()->insert($data, $this->table_third_source_url);
	}
	public function upSource($id,$data) {
		if($id<=0 || empty($data)){
			return false;
		}
		return $this->init_db()->update_by_field($data,array("id"=>$id),$this->table_name);
	}
	public function upSourceUrl($id,$data) {
		if($id<=0 || empty($data)){
			return false;
		}
		return $this->init_db()->update_by_field($data,array("id"=>$id),$this->table_third_source_url);
	}
	/**
	 * 通过ID获取一条数据
	 * @param unknown_type $id
	 */
	public function getSource($id){
		if(empty($id)){
			return array();
		}
		$Info=$this->init_db()->get_one($id, $this->table_name);
		return $Info;
	}
	public function getSourceUrl($id){
		if(empty($id)){
			return array();
		}
		$Info=$this->init_db()->get_one($id, $this->table_third_source_url);
		return $Info;
	}
	public function getAllSource(){
		$sql="select * from ".$this->table_name." order by id";
		return $this->init_db()->get_all_sql($sql);
	}
	public function getAllSourceUrl($sourceKey){
		$sql="select * from ".$this->table_third_source_url." where sourceKey='".$sourceKey."' order by id";
		return $this->init_db()->get_all_sql($sql);
	}
}
<?php
class CategoryModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_CATEGORY);
	}
	public function listItems($params) {
		$totalItemsPerPage = $params['pagination']['totalItemsPerPage'];
		$currentPage 			 = $params['pagination']['currentPage'];
	
		$this->pageLimit   = $totalItemsPerPage;
		if(!empty($params['filter_search'])) {
			$search = $params['filter_search'];
			$this->where ("name", "%$search%", 'like');
		}
		
		if(!empty($params['filter_status'])) {
			$filter = $params['filter_status'];
			$this->where ('status',$filter);
		} 
		if(!empty($params['filter_column']) && !empty($params['filter_column_dir'])){
			$column		= $params['filter_column'];
			$columnDir	= $params['filter_column_dir'];
			$this->orderBy($column,$columnDir);
		}else{
			$this->orderBy("id","desc");
		}  
		$result = $this->arraybuilder()->paginate("`$this->table`", $currentPage);

		return $result;
	}

	public function changeStatus($params){
			$arr = array($params['status'], $params['id']);
			$this->rawQuery("UPDATE `$this->table` SET status = ? WHERE id = ?", $arr);
	}

	public function saveItem($params) {
		require_once LIBRARY_EXT_PATH . 'Upload.php';
		require_once LIBRARY_EXT_PATH . 'XML.php';
		$uploadObj	= new Upload();
		$params['form']['picture']	= $uploadObj->uploadFile($params['form']['picture'], 'category');
		$data = Array ( "name" 		 => $params['form']['name'],
										"created"	 => date_create('now')->format('Y-m-d'),
										"status" 	 => $params['form']['status'],
										"picture"  =>$params['form']['picture'],
										"ordering" => (int)($params['form']['ordering'])										
									);
			if(isset($params['id'])) {
				if(empty($params['form']['picture'])){
					unset($data['picture']);
				}else{
					$uploadObj->removeFile('category', $params['form']['picture_hidden']);
					$uploadObj->removeFile('category', '60x90-' .  $params['form']['picture_hidden']);
				}
				$this->where ('id', $params['id']);
				$this->update ("`$this->table`", $data);		
			}else {
				$this->insert ("`$this->table`", $data);
			}
	}
	public function deleteItem($id){
		$query		= "SELECT `id`, `picture` AS `name` FROM `$this->table` WHERE `id` IN ($id)";
		$arrImage	= $this->rawQueryOne($query);
		require_once LIBRARY_EXT_PATH . 'Upload.php';
		$uploadObj	= new Upload();
		foreach ($arrImage as $value){
			$uploadObj->removeFile('category', $value);
			$uploadObj->removeFile('category', '60x90-' . $value);
		}
		$this->where('id', $id);
		$this->delete("`$this->table`");
	}
	public function multiDeleteUser($arrayID){
		$this->where('id', $arrayID, 'IN');
		$this->delete("`$this->table`");
	}
	public function infoItem($params) {
		$id = $params['id'];
		$sql = "SELECT name,ordering,status,picture FROM `$this->table`";
		$sql .= "WHERE id=$id";
		$result = $this->rawQueryOne($sql);
		return $result;
	}
	public function countItem($params) {
		$sql = "SELECT count(id) as `count` FROM `$this->table` WHERE id > 0";
		if(!empty($params['filter_status'])) {
			$filter = $params["filter_status"];
			$sql .= " AND status = '$filter'";
		}
		if(!empty($params['filter_search'])) {
			$search = $params["filter_search"];
			$sql .= " AND name LIKE '%$search%'";
		}
	
		$count = $this->rawQueryOne ($sql);
		return $count['count'];
	}

	public function countStatus($params) {
		$sql = "SELECT count(id) as `count`,status FROM `$this->table` WHERE id > 0";
		$sql .= " GROUP BY status";
		$result = $this->rawQuery ($sql);
		return $result;
	}
}
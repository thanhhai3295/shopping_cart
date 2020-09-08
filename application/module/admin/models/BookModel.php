<?php
class BookModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_BOOK);
	}
	public function listItems($params) {
		$query	= "SELECT `b`.`id`, `b`.`special`, `b`.`name`, `b`.`picture`, `b`.`price`, `b`.`sale_off`, `b`.`status`, `b`.`ordering`, `b`.`created`, `b`.`created_by`, `b`.`modified`, `b`.`modified_by`, `c`.`name` AS `category_name`";
		$query .= "FROM `$this->table` AS `b` LEFT JOIN `". TBL_CATEGORY . "` AS `c` ON `b`.`category_id` = `c`.`id`";
		$query .= "WHERE `b`.`id` > 0";

		$category = $params['form']['category'] ?? '';
		if($category != 'default' && $category != null) {
			$query .= " AND `c`.`id` = ".$category;
		}
		if(!empty($params['filter_search'])) {
			$search = $params['filter_search'];
			$query.= " AND `b`.`name` LIKE '%$search%'";
		}
		
		if(!empty($params['filter_status'])) {
			$filter = $params['filter_status'];
			$query.= " AND `b`.`status` = '" . $filter . "'";
		} 
		if(!empty($params['filter_column']) && !empty($params['filter_column_dir'])){
			$column		= $params['filter_column'];
			$columnDir	= $params['filter_column_dir'];
			$query.= " ORDER BY `b`.`$column` $columnDir";
		}else{
			$query.= " ORDER BY `b`.`id` DESC";
		}  
		
		$pagination					= $params['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if($totalItemsPerPage > 0){
			$position	= ($pagination['currentPage']-1)*$totalItemsPerPage;
			$query.= " LIMIT $position, $totalItemsPerPage";
		}
		$result = $this->rawQuery($query);
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
		$params['form']['picture']	= $uploadObj->uploadFile($params['form']['picture'], 'book',98, 150);
		$data = Array ( "name" 		 => $params['form']['name'],
										"picture"  => $params['form']['picture'],
										"price" 		 => (int)$params['form']['price'],
										"sale_off" 		 => (int)$params['form']['sale_off'],
										"ordering" => (int)($params['form']['ordering']),
										"category_id" => 	$params['form']['category_id'],
										"status" 	 => $params['form']['status'],
										"description" 	 => $params['form']['description'],
										"created"	 => date_create('now')->format('Y-m-d'),					
									);
			if(isset($params['id'])) {
				if(empty($params['form']['picture'])){
					unset($data['picture']);
				}else{
					$uploadObj->removeFile('book', $params['form']['picture_hidden']);
					$uploadObj->removeFile('book', '98x150-' .  $params['form']['picture_hidden']);
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
			$uploadObj->removeFile('book', $value);
			$uploadObj->removeFile('book', '98x150-' . $value);
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
		$sql = "SELECT * FROM `$this->table`";
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
	public function itemInSelectbox($params) {
		$query 	= "SELECT `id`, `name` FROM `" . TBL_CATEGORY . "`";
		$result = $this->rawQuery($query);
		
		$arr['default'] = "- Select Category -";
		foreach ($result as $key => $value) {
			$arr[$value['id']] = $value['name'];
		}
		return $arr;
	}
}
<?php
class UserModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_USER);
	}
	public function listItems($params) {
		$query	= "SELECT `u`.`id`, `u`.`username`, `u`.`email`, `u`.`fullname`, `u`.`created`, `u`.`ordering`, `u`.`status`";
		$query .= "FROM `$this->table` AS `u`";
		$group = $params['form']['group'] ?? '';
		if($group != 'default' && $group != null) {
			$query .= "INNER JOIN `".TBL_GROUP."` as `g`";
			$query .= "ON `u`.`group_id` = `g`.`id`";
			$query .= "WHERE `g`.`id` = ".$group;
		} else {
			$query .= "WHERE `u`.`id` > 0";
		}
		
		
		if(!empty($params['filter_search'])) {
			$search = $params['filter_search'];
			$query.= " AND `u`.`username` LIKE '%$search%'";
		}
		
		if(!empty($params['filter_status'])) {
			$filter = $params['filter_status'];
			$query.= " AND `u`.`status` = '" . $filter . "'";
		} 
		if(!empty($params['filter_column']) && !empty($params['filter_column_dir'])){
			$column		= $params['filter_column'];
			$columnDir	= $params['filter_column_dir'];
			$query.= " ORDER BY `u`.`$column` $columnDir";
		}else{
			$query.= " ORDER BY `u`.`id` DESC";
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
		$data = Array ( "username" 		 => $params['form']['username'],
										"email" 		 => $params['form']['email'],
										"fullname" 		 => $params['form']['fullname'],
										"password" 		 => $params['form']['password'],
										"group_id" 		 => $params['form']['group_id'],
										"status" 	 => $params['form']['status'],
										"ordering" => (int)($params['form']['ordering']),	
										"created"	 => date_create('now')->format('Y-m-d')
									);

			if(isset($params['id'])) {
				$this->where ('id', $params['id']);
				$this->update ("`$this->table`", $data);		
			}else {
				$this->insert ("`$this->table`", $data);
			}
	}
	public function deleteItem($id){
		$this->where('id', $id);
		$this->delete("`$this->table`");
	}
	public function multiDeleteUser($arrayID){
		$this->where('id', $arrayID, 'IN');
		$this->delete("`$this->table`");
	}
	public function infoItem($params) {
		$id = $params['id'];
		$this->where('id',$id);
		$result = $this->get($this->table);
		return $result[0];
	}
	public function countItem($params) {
		$sql = "SELECT count(id) as `count` FROM `$this->table` WHERE id > 0";
		if(!empty($params['filter_status'])) {
			$filter = $params["filter_status"];
			$sql .= " AND status = '$filter'";
		}
		if(!empty($params['filter_search'])) {
			$search = $params["filter_search"];
			$sql .= " AND username LIKE '%$search%'";
		}
	
		$count = $this->rawQueryOne ($sql);
		return $count['count'];
	}

	public function countStatus($params) {
		$sql = "SELECT count(id) as `count`,status FROM `$this->table` WHERE id > 0";
		if(!empty($params['filter_search'])) {
			$search = $params["filter_search"];
			$sql .= " AND username LIKE '%$search%'";
		}
		$sql .= " GROUP BY status";
		$result = $this->rawQuery ($sql);
		return $result;
	}
	public function itemInSelectbox() {
		$query 	= "SELECT `id`, `name` FROM `" . TBL_GROUP . "`";
		$result = $this->rawQuery($query);
		
		$arr['default'] = "- Select Group -";
		foreach ($result as $key => $value) {
			$arr[$value['id']] = $value['name'];
		}
		return $arr;
	}
}
<?php
class IndexModel extends Model{

	public function infoItem($arrParam){

		$username	= $arrParam['form']['username'];
		$password	= md5($arrParam['form']['password']);
		$query = "SELECT `u`.`id`, `u`.`fullname`, `u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`, `g`.`privilege_id`";
		$query .= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
		$query .= "WHERE `username` = '$username' AND `password` = '$password'";
		$result = $this->rawQueryOne($query);
		return $result;
		
	}

	public function countItem(){
		$arrTable = [TBL_GROUP,TBL_USER,TBL_CATEGORY,TBL_BOOK];
		$result = [];
		foreach ($arrTable as $key => $value) {
			$query = "SELECT count(id) as `count` FROM `$value`";
			$tmp = $this->rawQueryOne($query);
			$result[$value] = $tmp['count'];
		}
		return $result;
	}

	public function getGroup($params) {
		$search = $params['search'];
		$query = "SELECT `id` ,`name` ";
		$query .= "FROM `".TBL_GROUP."` ";
		$query .= "WHERE `name` LIKE '%$search%'";
		return $this->rawQuery($query);
	}
}
<?php
class IndexModel extends Model{
	public function __construct(){
		parent::__construct();
	
	}
	public function listItems($params, $options) {
		$query	= "SELECT `b`.`id`, `b`.`name`,`b`.`price`, `b`.`picture`, `b`.`description`, `b`.`category_id`, `c`.`name` AS `category_name` ";
		$query	.= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` ";
		if($options['task'] == 'feature-book') {
			$query	.= "WHERE `b`.`status`  = 'active' AND `b`.`special` = 1 AND `c`.`id` = `b`.`category_id` ";
			$query	.= "ORDER BY `b`.`ordering` ASC ";
			$query	.= "LIMIT 0, 2";
		}

		if($options['task'] == 'new-book') {
			$query	.= "WHERE `b`.`status`  = 'active' AND `c`.`id` = `b`.`category_id` ";
			$query	.= "ORDER BY `id` DESC ";
			$query	.= "LIMIT 0, 3";
		}
		$result = $this->rawQuery($query);
		return $result;
	}

	public function infoItem($arrParam){
		$username	= $arrParam['form']['username'];
		$password	= md5($arrParam['form']['password']);
		$query = "SELECT `u`.`id`, `u`.`fullname`, `u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`, `g`.`privilege_id`";
		$query .= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
		$query .= "WHERE `username` = '$username' AND `password` = '$password'";
		$result = $this->rawQueryOne($query);
		return $result;
	}
}
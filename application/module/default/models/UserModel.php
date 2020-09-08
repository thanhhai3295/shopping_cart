<?php
class UserModel extends Model{
	
	private $_columns = array(
								'id', 
								'username', 
								'email', 
								'fullname', 
								'password',
								'created', 
								'created_by', 
								'modified', 
								'modified_by', 
								'register_date',
								'register_ip',
								'status', 
								'ordering', 
								'group_id'
							);
	public $_userInfo;
	
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_USER);
		Session::init();
		$userObj 			= Session::get('user');
		$this->_userInfo 	= $userObj['info'];
	}
	
	public function listItem($arrParam, $option = null){
		if($option['task'] == 'books-in-cart'){
			$cart	= Session::get('cart');
			$result	= array();
			if(!empty($cart)){
				$ids	= "(";
				foreach($cart as $key => $value) $ids .= "'$key', ";
				$ids	.= " '0')" ;
				$query	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `c`.`name` AS `category_name`";
				$query .= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c`";
				$query .= "WHERE `b`.`status`  = 'active' AND  `c`.`id` = `b`.`category_id` AND `b`.`id` IN $ids";
        $query .= "ORDER BY `b`.`ordering` ASC";
				$result		= $this->rawQuery($query);

				foreach($result as $key => $value){
					$result[$key]['quantity']	= $cart[$value['id']]['quantity'];
					$result[$key]['totalprice']	= $cart[$value['id']]['price'];
					$result[$key]['price']		= $result[$key]['totalprice'] / $result[$key]['quantity'];
				}
			}

			return $result;
		}
		
		if($option['task'] == 'history-cart'){
			$username	= $this->_userInfo['username'];	
			$query	= "SELECT `id`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`";
			$query	.= "FROM `".TBL_CART."`";
			$query	.= "WHERE `username` = '$username'";	
			$query	.= "ORDER BY `date` ASC";
			$result		= $this->rawQuery($query);		
			return $result;
		}

		if($option['task'] == 'get-image'){
			$query = "SELECT picture FROM ".TBL_BOOK." WHERE id=".$arrParam['bookID'];
			$result		= $this->rawQueryOne($query);
			return $result['picture'];
		}

		if($option['task'] == 'get-name'){
			$query = "SELECT name FROM ".TBL_BOOK." WHERE id=".$arrParam['bookID'];
			$result		= $this->rawQueryOne($query);
			return $result['name'];
		}
	}

	public function saveItem($arrParam, $option = null){
	
		if($option['task'] == 'submit-cart'){
			$id			= $this->randomString(7);
			$username	= $this->_userInfo['username'];
		
			$books		= json_encode($arrParam['form']['bookid']);
			$prices		= json_encode($arrParam['form']['price']);
			$quantities	= json_encode($arrParam['form']['quantity']);
			$names		= json_encode($arrParam['form']['name'],JSON_UNESCAPED_UNICODE);
			$pictures	= json_encode($arrParam['form']['picture']);
			$date		= date('Y-m-d H:i:s', time());
			
			$query	= "INSERT INTO `".TBL_CART."`(`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES ('$id', '$username', '$books', '$prices', '$quantities', '$names', '$pictures', '0', '$date')";

			$this->rawQuery($query);
			Session::delete('cart');
		}
	
	}
	
	private function randomString($length = 5){
		$arrCharacter = array_merge(range('a','z'), range(0,9), range('A','Z'));
		$arrCharacter = implode($arrCharacter, '');
		$arrCharacter = str_shuffle($arrCharacter);
		$result		= substr($arrCharacter, 0, $length);
		return $result;
	}

	public function deleteHistory($params){
		$cartID = $params['cart_id'];
		$bookID = $params['book_id'];
		$query = "SELECT books FROM ".TBL_CART." WHERE id='".$cartID."'";
		$result = $this->rawQueryOne($query);
		$count = count(json_decode($result['books']));
		if($count > 1) {
			$arrBookID = json_decode($result['books']);
			$arrBookID = json_encode(array_values(array_diff($arrBookID,[$bookID])));
			
			$query = "UPDATE `".TBL_CART."` SET `books`='$arrBookID' WHERE id='$cartID'";
			$this->rawQuery($query);
		} else {
			$this->rawQuery("DELETE FROM `".TBL_CART."` WHERE `id`='$cartID'");
		}
	}
}
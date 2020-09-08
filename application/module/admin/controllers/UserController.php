<?php
class UserController extends AdminController{
	 
	public function listAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / LIST';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam);
		$this->_view->countStatus = $this->_model->countStatus($this->_arrParam);
		$this->_view->arrGroup 		= $this->_model->itemInSelectbox();
		$this->_view->render($this->nameController.'/list');
	}
	    
	public function formAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / ADD';
		if(isset($this->_arrParam['id']) && !isset($this->_arrParam['form']['token'])){
			$this->_view->_title	 		= strtoupper($this->nameController).' / EDIT';
			$this->_arrParam['form']	= $this->_model->infoItem($this->_arrParam);
			if(empty($this->_arrParam['form'])) $this->redirectList();	
			
		} 
		if(isset($this->_arrParam['form']['token'])) {
			$query['username']	= "SELECT `id` FROM `".TBL_USER."` WHERE `username` = '".$item['username']."'";
			$query['email']			= "SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$item['email']."'";
			if(isset($this->_arrParam['id'])){
				$query['username'] 	.= " AND `id` <> '".$this->_arrParam['id']."'";
				$query['email'] 		.= " AND `id` <> '".$this->_arrParam['id']."'";
			}
			$validate = new UserValidate($this->_arrParam['form'],$query,$this->_model);
			$this->_arrParam['form'] = $validate->getResult();
			if($validate->isValid() == false){
				
				$this->_view->errors = $validate->getError();
			} else {
				
				$this->_model->saveItem($this->_arrParam);		
				Session::set('success',isset($this->_arrParam['id']) ? 'Edit '.ucfirst($this->nameController).' Success!' : 'Add '.ucfirst($this->nameController).' Success!');
				$this->redirectList();		
			}
		}
		$this->_view->arrParam = $this->_arrParam['form']??'';
		$this->_view->render($this->nameController.'/form');
	}
}
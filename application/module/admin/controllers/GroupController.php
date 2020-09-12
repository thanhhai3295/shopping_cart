<?php
class GroupController extends AdminController{
	
	public function listAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / LIST';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam);
		$this->_view->countStatus = $this->_model->countStatus($this->_arrParam);
		$this->_view->render($this->nameController.'/list');
	}
	public function formAction(){
	// 	$this->_view->_title	 = strtoupper($this->nameController).' / ADD';
	// 	if(isset($this->_arrParam['id']) && !isset($this->_arrParam['form']['token'])){
	// 		$this->_view->_title	 		= strtoupper($this->nameController).' / EDIT';
	// 		$this->_arrParam['form']	= $this->_model->infoItem($this->_arrParam);
	// 		if(empty($this->_arrParam['form'])) $this->redirectList();	
	// 	}
	// 	if(isset($this->_arrParam['form']['token'])) {

	// 		$validate = new GroupValidate($this->_arrParam['form']);
	// 		$this->_arrParam['form'] = $validate->getResult();
	// 		if($validate->isValid() == false){
	// 			$this->_view->errors = $validate->getError();
	// 		} else {
				
	// 			$this->_model->saveItem($this->_arrParam);		
	// 			Session::set('success',isset($this->_arrParam['id']) ? 'Edit '.ucfirst($this->nameController).' Success!' : 'Add '.ucfirst($this->nameController).' Success!');
	// 			$this->redirectList();		
	// 		}
	// 	}
	// 	$this->_view->arrParam = $this->_arrParam['form']??'';
	// 	$this->_view->render($this->nameController.'/form');
	// }
		
		$form = (json_decode($this->_arrParam['form'], true));
		$validate = new GroupValidate($form);
		if($validate->isValid() == false){
			echo str_replace("\\","",json_encode( $validate->getError(), JSON_UNESCAPED_UNICODE ));
		} else {
			$this->_model->saveItem($form);	
			echo true;
		}
	}
} 
<?php
class CategoryController extends DefaultController{
	public function listAction(){
		$this->_view->_title	 = 'Danh Mục Thể Loại';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 8, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam,null);
		$this->_view->render($this->nameController.'/list');
	}
} 
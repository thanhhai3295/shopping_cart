<?php
class BookController extends DefaultController{
	public function listAction(){
		$this->_view->_titleContent	 = 'Danh Mục Sách';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam,null);
		$this->_view->categoryName 	= $this->_model->infoItem($this->_arrParam,['task' => 'category-name']);
		$this->_view->_title = $this->_view->categoryName['name'];
		$this->_view->render($this->nameController.'/list');
	}
	public function detailAction(){
		$this->_view->bookInfo 		= $this->_model->infoItem($this->_arrParam,['task' => 'detail-book']);
		$this->_view->_title	 			 = $this->_view->bookInfo['name'];
		$this->_view->_titleContent	 = 'Chi Tiết Sách';
		$this->_view->bookRelate	= $this->_model->getItemRelate($this->_arrParam);
		$this->_view->render($this->nameController.'/detail');
	}
	public function searchAction(){
		$this->_view->items	 = $this->_model->listItems($this->_arrParam,['task' => 'search-book']);
		$this->_view->_title = 'Có '.count($this->_view->items).' Sản Phẩm';
		$this->_view->render($this->nameController.'/search');
	}
} 
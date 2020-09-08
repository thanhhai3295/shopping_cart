<?php
class ErrorController extends Controller{

	public function indexAction(){
		$this->_view->data	= '<h3>This is an error!</h3>';
		$this->_view->render('error/index');
	}
	public function noticeAction(){
		$this->_view->render('error/index',false);
	}
}
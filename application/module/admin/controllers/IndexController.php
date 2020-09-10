<?php
class IndexController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		session::init();
	}
	public function loginAction(){
		$this->_templateObj->setFolderTemplate('admin/login/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$userInfo	= Session::get('user');
		if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
			URL::redirect('admin', 'index', 'dashboard');
		}
		$this->_view->_title 		= 'Login';
		if(isset($this->_arrParam['form']['token'] )){

			$validate	= new Validate($this->_arrParam['form']);
			$username	= $this->_arrParam['form']['username'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$validate->addRule('username', 'existRecord', array('database' => $this->_model, 'query' => $query));
			$validate->run();
			
			if($validate->isValid()==true){
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= array(
										'login'		=> true,
										'info'		=> $infoUser,
										'time'		=> time(),
										'group_acp'	=> $infoUser['group_acp']
									);
				Session::set('user', $arraySession);
				URL::redirect('admin', 'index', 'dashboard');
			}else{
				$this->_view->errors	= $validate->getError();
			}
		}
		$this->_view->arrParam['form'] = $this->_arrParam['form']??'';
		$this->_view->render('index/login');
	}
	
	public function dashboardAction(){
		$this->_templateObj->setFolderTemplate('admin/multicart/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		//$this->_view->countGroup = $this->_model->countItem();
		$this->_view->_title 	 	= 'Dashboard';
		$this->_view->arrParams = $this->_arrParam;
		$this->_view->render('index/dashboard');
	}
	
	public function logoutAction(){
		Session::delete('user');
		URL::redirect('admin', 'index', 'login');
	}
	public function searchAction() {
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->_title 		= 'Search';
		$this->_view->group = $this->_model->getGroup($this->_arrParam);
		$this->_view->render('index/search');
	}
}
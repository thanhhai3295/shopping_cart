<?php
class IndexController extends DefaultController{

	public function IndexAction(){
		$this->_view->_title	 = 'Trang Chủ';
		$this->_view->featureBook = $this->_model->listItems($this->_arrParam,['task' => 'feature-book']);
		$this->_view->newBook = $this->_model->listItems($this->_arrParam,['task' => 'new-book']);
		$this->_view->render($this->nameController.'/index');
	}

	public function loginAction(){
		$userInfo	= Session::get('user');
		if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
			URL::redirect('default', 'user', 'index',null,'my-account.html');
		}
		$this->_view->_title 		= 'Login';
		if(isset($this->_arrParam['form']['token'])){
			$username		= $this->_arrParam['form']['username'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$validate	= new IndexValidate($this->_arrParam['form'],$query,$this->_model);
			if($validate->isValid()==true){
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= array(
						'login'		=> true,
						'info'		=> $infoUser,
						'time'		=> time(),
						'group_acp'	=> $infoUser['group_acp']
				);
				Session::set('user', $arraySession);
				Session::set('success',SUCCESS_LOGIN);
				$this->redirectCurrentURL();
			}else{
				$this->_view->errors	= $validate->getError();
			}
		}
	
		$this->_view->render('index/login');
	}

	public function logoutAction(){
		Session::delete('user');
		Session::delete('cart');
		$this->redirectCurrentURL();
	}

} 
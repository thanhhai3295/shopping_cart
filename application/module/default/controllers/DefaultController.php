<?php 
  class DefaultController extends Controller {
    public function __construct($arrParams){
      parent::__construct($arrParams);
      $this->_templateObj->setFolderTemplate('default/main/');
      $this->_templateObj->setFileTemplate('index.php');
      $this->_templateObj->setFileConfig('template.ini');
      $this->_templateObj->load();
      $this->nameController = $this->_arrParam['controller'];
      Session::init();
    }
    public function redirect404(){
      header('location: 404.html');
    }
  }
?>
<?php 
  class AdminController extends Controller {
    public function __construct($arrParams){
      parent::__construct($arrParams);
      $this->_templateObj->setFolderTemplate('admin/multicart/');
      $this->_templateObj->setFileTemplate('index.php');
      $this->_templateObj->setFileConfig('template.ini');
      $this->_templateObj->load();
      $this->nameController = $this->_arrParam['controller'];
      Session::init();
      if(!empty($arrParams['filter_status'])) {
        Session::set('success','Filter By '.ucfirst($this->_arrParam['filter_status']));
      }
      if(!empty($arrParams['filter_search'])) {
        Session::set('success','search: '.$this->_arrParam['filter_search']);
      }
    }
    public function statusAction(){
      $params['id'] = $this->_arrParam['id'];
      $params['status'] = ($this->_arrParam['st'] == 'active') ? 'inactive' : 'active';
      $this->_model->changeStatus($params);
      // Session::set('success','Change Status Success!');
      // $this->redirect('admin',$this->nameController,'list');
      echo true;
    }
  
    public function deleteAction() {
      $id = $this->_arrParam['id'];
      $this->_model->deleteItem($id);
      Session::set('success','Delete Item Success!');
      $this->redirect('admin',$this->nameController,'list');
    }
    public function multiDeleteAction(){
      if(isset($this->_arrParam['multiDelete'])) {
        $arrID = $this->_arrParam['multiDelete'];
        $this->_model->multiDeleteUser($arrID);
        Session::set('success','Delete '.count($arrID).' Item Success!');
        $this->redirect('admin',$this->nameController,'list');
      } else {
        Session::set('error','Failed To Delete Item');
        $this->redirect('admin',$this->nameController,'list');
      }
    }
    public function redirectList(){
      $this->redirect('admin',$this->nameController,'list');	
    }
  }
?>
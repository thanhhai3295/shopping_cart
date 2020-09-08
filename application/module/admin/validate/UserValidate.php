<?php 
  class UserValidate extends Validate {
    public $query;
    public $model;
    public function __construct($source,$query,$model) {
      parent::__construct($source);
      $this->query = $query;
      $this->model = $model;
      $this->formValidate();
      $this->run();
    } 
    public function formValidate() {
    $this->addRule('username', 'string-notExistRecord', array('database' => $this->model, 'query' => $this->query['username'], 'min' => 3, 'max' => 25))
          ->addRule('email', 'email-notExistRecord', array('database' => $this->model, 'query' => $this->query['email'], 'min' => 3, 'max' => 25))
          ->addRule('fullname', 'string', array('min' => 3, 'max' => 100))
          ->addRule('password', 'string', array('min' => 3, 'max' => 100))
          ->addRule('group_id', 'status', array('deny' => array('default')))
          ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
          ->addRule('status', 'status', array('deny' => array('default')));
    }
  } 
?>
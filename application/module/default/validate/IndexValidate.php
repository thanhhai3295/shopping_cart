<?php 
  class IndexValidate extends Validate {
    public $query;
    public $model;
    public function __construct($source,$query,$model) {
      parent::__construct($source);
      $this->query = $query;
      $this->model = $model;
      $this->validate();
      $this->run();
    } 
    public function validate() {
			$this->addRule('username', 'existRecord', array('database' => $this->model, 'query' => $this->query));
			$this->run();
    }
  } 
?>
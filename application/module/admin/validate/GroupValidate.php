<?php 
  class GroupValidate extends Validate {
    public function __construct($source) {
      parent::__construct($source);
      $this->formValidate();
      $this->run();
    }
    public function formValidate() {
    $this->addRule('name', 'string', array('min' => 3, 'max' => 255))
					->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
      		->addRule('status', 'status', array('deny' => array('default')));
    }
  }
?>
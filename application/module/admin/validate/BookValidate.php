<?php 
  class BookValidate extends Validate {
    public function __construct($source) {
      parent::__construct($source);
      $this->formValidate();
      $this->run();
    }
    public function formValidate() {
    $this->addRule('name', 'string', array('min' => 3, 'max' => 255))
					->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
          ->addRule('status', 'status', array('deny' => array('default')))
          ->addRule('picture', 'file', array('min' => 100, 'max' => 1000000, 'extension' => array('jpg', 'png')), false)
          ->addRule('category_id', 'status', array('deny' => array('default')))
          ->addRule('price', 'int', array('min' => 1000, 'max' => '1000000'))
          ->addRule('sale_off', 'int', array('min' => 0, 'max' => '100'));;
    }
  }
?>
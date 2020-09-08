<?php
	
	require_once 'define.php';
	require_once 'define-empty.php';
	require_once 'define-value.php';
	require_once 'define-notify.php';
	function __autoload($clasName){
		require_once LIBRARY_PATH . "{$clasName}.php";
	}
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();
<?php
require_once 'core/init.php';
require_once 'includes/header.php';	
	if(isset($_GET['t'])){
		$action = addslashes(trim(htmlentities($_GET['t'])));
		$action = ($action == '') ? "home" : $action;
	}else{
		$action = "home";
	}
	$link = 'templates/'.$action.'.php';
	if(!empty($action) && file_exists($link)){
		require_once $link;
	}

require_once 'includes/footer.php';
?>
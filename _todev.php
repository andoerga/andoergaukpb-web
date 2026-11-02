<?php
session_start();
var_dump($_SESSION);
if(isset($_SESSION['testing'])){
	if($_SESSION['testing']){
		$_SESSION['testing'] = false;
	}else{
		$_SESSION['testing'] = true;
	}
}else{
	$_SESSION['testing'] = true;
}
echo $_SESSION['testing'] ? 'Development Mode Is Enable' : 'Development Mode Is Disable';
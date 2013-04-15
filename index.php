<?php
$root=$_SERVER['SCRIPT_NAME']."/..";
include('includes/function.php');

if(!isset($_GET['page'])){
	redirect_to($root.'/home');
}
else{
	$TITLE=$_GET['page'];
	include('includes/header.php');	
	include("pages/{$_GET['page']}.php");
	include('includes/footer.php');	
}	
?>
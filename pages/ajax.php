<?php
	include($root.'/includes/db.attributes.php');
	if(!isset($_POST['sqltransaction']))
		die('Error: Invalid access');		
	if($_POST['sqltransaction']=='insert')
	{
		if(!isset($_POST['form']))
			die('Error: Invalid access');
		else
		{
		//	include('../includes/function.php');
			$query='INSERT INTO `'.$_POST['form'].'`';
			$query.=' VALUES(\''.$_POST[$attributes[$_POST['form'][0]]].'\'';
			for ($i=1;$i<count($fields[$_POST['form']]);$i++)
			{
				$query.=',\''.$_POST[$attributes[$_POST['form'][$i]]].'\'';
			}
			$query.=');';
			mysql_query($query);
		}
	}
	else if($_POST['sqltransaction']=='update')
	{
		if(!isset($_POST['table']) or !isset($_POST['field']) or !isset($_POST['value']))
			die('Error: Invalid Access');	
		$table=$_POST['table'];
		$field=$_POST['field'];
		$val=$_POST['value'];
		$query='UPDATE `'.$table.'` SET `'.$field.'`=\''.$val.'\'';
		mysql_query($query);
	}
	else if($_POST['sqltransaction']=='updateAll')
	{
		if(!isset($_POST['table']))
			die('Error: Invalid Access');	
		$query='UPDATE `'.$table.'` SET `';
		$query.=$attributes[$table][0].'`=\''.$_POST[$attributes[$table][0]].'\'';		
		for ($k=1;$k<count($attributes[$table]);$k++)
			$query.=',`'.$attributes[$table][$k].'`=\''.$_POST[$k].'\'';
		$query.=';';
		mysql_query($query);
	}

	else if($_POST['sqltransaction']=='query')
	{
		if(!isset($_POST['table']))
			die('Error: Invalid Access');
		$table=$_POST['table'];
		if(isset($_POST['field']) and !isset($_POST['value'])
			die('Error:Invalid Access');
		else if(isset($_POST['field']) and isset($_POST['value']))
		{
			$table=$_POST['table'];
			$field=$_POST['field'];
			$val=$_POST['value'];
			$query='SELECT * FROM `'.$table.'` WHERE `'.$field.'`=\''.$val.'\';';
		}
		else
			$query='SELECT * FROM `'.$table.'`;';		
		$result=mysql_query($query);
		echo json_encode($result);
	}
?>

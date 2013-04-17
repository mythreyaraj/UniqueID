<?php
	if(!isset($_POST['sqltransaction']))
		die('Error: Invalid access');		
	openconnection();
	if($_POST['sqltransaction']=='insert')
	{
		if(!isset($_POST['form']))
			die('Error: Invalid access');
		else
		{
		//	include('../includes/function.php');
			$query='SHOW TABLES;';
			$result=mysql_query($query);
			while($i=mysql_fetch_array($result))
			{
				$query='DESCRIBE '.$i['Tables_in_UniqueID'].';';
				$counter=0;
				$result1=mysql_query($query);
				$j=mysql_fetch_array($result1);
				$attributes[$i['Tables_in_UniqueID']][]=$j['Field'];
				$counter++;
				while($j=mysql_fetch_array($result1))
				{
					array_push($attributes[$i['Tables_in_UniqueID']],$j['Field']);
					echo count($attributes[$i['Tables_in_UniqueID']]);
				}

			}
			$_POST['form']='airline_info';
			$query='INSERT INTO `'.$_POST['form'].'`';
			$query.=' VALUES(`'.$_POST[$attributes[$_POST['form'][0]]].'`';
			for ($i=1;$i<count($fields[$_POST['form']]);$i++)
			{
				$query.=',`'.$_POST[$attributes[$_POST['form'][$i]]].'`';
			}
			$query.=');';
			mysql_query($query);
			echo $query;
		}
	}
	else if($_POST['sqltransaction']=='update')
	{
		$table=$_POST['table'];
		$field=$_POST['field'];
		$val=$_POST['value'];
		$query='UPDATE `'.$table.'` SET `'.$field.'`=`'.$val.'`';
		mysql_query($query);
	}
?>

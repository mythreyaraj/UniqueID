<?php
include($root.'/includes/function.php');
openconnection();
$query='SHOW TABLES;';
$result=mysql_query($query);
while($i=mysql_fetch_array($result))
{
	$query='DESCRIBE '.$i['Tables_in_UniqueID'].';';
	$counter=0;
	$result1=mysql_query($query);
	$j=mysql_fetch_array($result1);
	$attributes[$i['Tables_in_UniqueID']][]=$j['Field'];
	while($j=mysql_fetch_array($result1))
	{
		array_push($attributes[$i['Tables_in_UniqueID']],$j['Field']);
		echo count($attributes[$i['Tables_in_UniqueID']]);
	}
}
?>

<?php
	if($_POST['table']=='railway-info')
	{
		$query="INSERT INTO railway_info VALUES('{$_SESSION['UID']}','{$_POST['FROM']}','{$_POST['TO']}','{$_POST['DATE']}','{$_POST['ADULT_TICKETS']}','{$_POST['CHILDREN_TICKETS']},'{$_POST['PNR']}');";
		mysql_query($query);
	}
	else if($_POST['table']=='medical-info')
	{
		$query="INSERT INTO medical_info VALUES('{$_SESSION['UID']}','{$_POST['INSURANCE_NUMBER']}','{$_POST['DESCRIPTION']}');";
		mysql_query($query);
	}
	else if($_POST['table']=='passport-info')
	{
		$query="UPDATE passport_info SET `PASSPORT_NUMBER`='{$_POST['PASSPORT_NUMBER']}' WHERE `UID`='{$_SESSION['UID']}';";
		mysql_query($query);
	}
?>

<?php
	if(isset($_SESSION['user'])){
		if(isset($_POST['basicupdate'])){
			$con=openconnection()
			$sql="UPDATE `basic-info` SET `FIRST_NAME`={$_POST['FIRST_NAME']}, `MIDDLE_NAME`={$_POST['MIDDLE_NAME']}, `LAST_NAME`={$_POST['LAST_NAME']} , `DOB`={$_POST['DOB']} , `SEX`={$_POST['SEX']} , `MARTIAL_STATUS`={$_POST['MARTIAL_STATUS']} , `ADDRESS_1`={$_POST['ADDRESS_1']}, `ADDRESS_2`={$_POST['ADDRESS_2']}, `ADDRESS_3`={$_POST['ADDRESS_3']} , `EMAIL`={$_POST['EMAIL']} , `PHOTOGRAPH`={$_POST['PHOTOGRAPH']} , `ACCOUNT_BALANCE`={$_POST['ACCOUNT_BALANCE']}, `PHONE_NUMBER`={$_POST['PHONE_NUMBER']} WHERE `UID`={$_SESSION['UID']}";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}
		}
		if(isset($_POST['bookairline'])){
			$con=openconnection();
			$sql="INSERT INTO `airline_info` ( `UID` ,`FROM` ,`TO` ,`DATE` ,`NUMBER_OF_PASSENGERS` ,`TICKET_NUMBER`)VALUES ({$_SESSION['UID']},'{$_POST['FROM']}',{$_POST['TO']},{$_POST['DATE']},{$_POST['NUMBER_OF_PASSENGERS']},{$_POST['TICKET_NUMBER']});";
			if(mysql_query($sql,$con)){
				maketransaction();
			}
			else{

			}
		}
		if(isset($_POST['addbank'])){
			$con=openconnection();
			$sql="INSERT INTO `bank_info` (`UID` ,`BANK` ,`ACCOUNT_NUMBER` ,`BALANCE`) VALUES ('{$_SESSION
				['UID']}',  '{$_POST['BANK']}',  '{$_POST['ACCOUNT_NUMBER']}',  '{$_POST['BALANCE']}')";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}	
		}
		if(isset($_POST['birthinfo'])){
			$con=openconnection();
			$sql="UPDATE `birth_info` SET `DATE`={$_POST['DATE']}, `HOSPITAL`={$_POST['HOSPITAL']} , `FATHER_UID`={$_POST['FATHER_UID']}, `MOTHER_UID`={$_POST['MOTHER_UID']} WHERE `UID`={$_POST['UID']}";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}
		}
		if(isset($_POST['addcrime'])){
			$con=openconnection();
			$sql="INSERT INTO `criminal_info` (`UID` ,`FIR_NUMBER` ,`DATE` ,`DESCRIPTION`) VALUES ({$_SESSION['UID']},  '{$_POST['FIR_NUMBER']}'  '{$_POST['DATE']}',  '{$_POST['DESCRIPTION']}');";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}
		}
		if(isset($_POST['addeducation'])){
			$con=openconnection();
			$sql="INSERT INTO `education_info` (`UID` ,`QUALIFICATION` ,`INSTITUTION` ,`PERCENTAGE` ,`PASSING_DATE`)VALUES ({$_SESSION['UID']},  '{$_POST['QUALIFICATION']}',  '{$_POST['INSTITUTION']}',  '{$_POST['PERCENTAGE']}',  '{$_POST['PASSING_DATE']}');";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}
		}
		if(isset($_POST['updateelectricity'])){
			$con=openconnection();
			$sql="UPDATE `electricity_info` SET `OUTSTANDING_AMOUNT`={$_POST['OUTSTANDING_AMOUNT']} WHERE `UID`={$_POST['UID']}";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}	
		}
		if(isset($_POST['updatephone'])){
			$con=openconnection();
			$sql="UPDATE `phone_info` SET `OUTSTANDING_AMOUNT`={$_POST['OUTSTANDING_AMOUNT']} WHERE `UID`={$_POST['UID']}";
			if(mysql_query($sql,$con)){
				
			}
			else{

			}	
		}
		
	}

?>
	
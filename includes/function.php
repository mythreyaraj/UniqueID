<?php 
	include("db.cred.php");


	function verifylogin($username,$password){
			$username=mysql_real_escape_string($username);
			$password=mysql_real_escape_string($password);
			$password=md5($password);
			$con=openconnection();
			$sql="SELECT * FROM `authentication` WHERE `USERNAME`='{$username}' AND `PASSWORD`='{$password}'";
			$result=mysql_query($sql,$con);
			if(mysql_num_rows($result)==1){
				session_start();
				$sql="SELECT `UID` FROM `authentication` WHERE `USERNAME`='{$username}'";
				if($result=mysql_query($sql,$con)){
					$row=mysql_fetch_array($result);
					$id=$row['UID'];
					$_SESSION['UID']=$id;
					$_SESSION['user']=$username;
				}
				global $root;
				redirect_to($root."/home");
			}
			else{
			    echo '
    			    <div class="alert">
    		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
    			    <strong>Warning!    </strong>Incorrect Password or Username
    	   			</div>';
       
  
				
			}
	}

	function addnewuser($username,$password,$rpassword){
		$username=mysql_real_escape_string($username);
		$password=mysql_real_escape_string($password);
		$rpassword=mysql_real_escape_string($rpassword);
		if($password==$rpassword){
			$password=md5($password);
			$con=openconnection();
			$sql="INSERT INTO  `authentication` (`USERNAME` ,`PASSWORD`) VALUES ('{$username}',  '{$password}');";	
			$result=mysql_query($sql,$con);
			if($result){
					initialization($username);
					global $root;
					redirect_to($root."/register/success");
			}
			else{
					echo mysql_error();
				    echo '
	    			    <div class="alert">
	    		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	    			    <strong>Warning!    </strong>Password Dont Match or Username already in use
	    	   			</div>';
	       	}
	    }  
	    else{

				    echo '
	    			    <div class="alert">
	    		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	    			    <strong>Warning!    </strong>Passwords Don\'t Match or Username already in use
	    	   			</div>';
	       	
	    } 	
	}

	function initialization($username){
		$con=openconnection();
		$sql="SELECT `UID` FROM `authentication` WHERE `USERNAME`='{$username}'";
		if($result=mysql_query($sql,$con)){
			$row=mysql_fetch_array($result);
			$id=$row['UID'];
			$_SESSION['UID']=$id;
			$_SESSION['user']=$username;
		}
		$query="INSERT INTO `basic_info` values('{$_SESSION['UID']}','fname','mname','lname','1234-5-6','male','single','a1','a2','a3','random@rand.com','qwer',123,123)";
		mysql_query($query);
		$query="INSERT INTO `birth_info` values('{$_SESSION['UID']}','1234-5-6','male',-1,-1)";
		mysql_query($query);
		$query="INSERT INTO `electricity_info` values('{$_SESSION['UID']}',0)";
		mysql_query($query);		
		$query="INSERT INTO `passport_info` values('{$_SESSION['UID']}',-1)";
		mysql_query($query);				
		$query="INSERT INTO `phone_info` values('{$_SESSION['UID']}',0)";
		mysql_query($query);						
	}
	function is_loggedin(){
		if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
			return true;
		}
		return false;
	}
	function logout(){
		session_start();
		session_unset();
		session_destroy();
		global $root;
		redirect_to($root);
	}

	function redirect_to($url){
		header("Location: {$url}");
	}


	function openconnection(){
		global $dbhost,$dbuser,$dbpassword,$dbdatabase;	
		$con=mysql_connect($dbhost,$dbuser,$dbpassword);
		mysql_select_db($dbdatabase);
		return $con;
	}
	function closeconnection(){
		mysql_close();		
	}	
	function electricity_payment($uid,$account_number,$amount)
	{
		openconnection();
		$query="SELECT `BALANCE` from `bank_info` WHERE `ACCOUNT_NUMBER`={$account_number}";
		$result=mysql_query($query);
		$amt=$result['BALANCE'];
		if($amt>=$amount)
		{
			$query="UPDATE `electricity_info` SET `OUTSTANDING AMOUNT`='0' WHERE `UID`='{$_SESSION['UID']}' ";
			$result=mysql_query($query);
			$a=$amt-$amount;
			$query="UPDATE `bank_info` SET `BALANCE`={$a} WHERE `ACCOUNT_NUMBER`='{$account_number}'";
			$result=mysql_query($query);			
			$query="INSERT INTO `bank_description` VALUES('{$account_number}','electricity','{$amount}','{$_SESSION['UID']} paid {$amount} through {$account_number}'";
			$result=mysql_query($query);						
		}
	}
	function phone_payment($uid,$account_number,$amount)
	{
		openconnection();
		$query="SELECT `BALANCE` from `bank_info` WHERE `ACCOUNT_NUMBER`={$account_number}";
		$result=mysql_query($query);
		$amt=$result['BALANCE'];
		if($amt>=$amount)
		{
			$query="UPDATE `phone_info` SET `OUTSTANDING AMOUNT`='0' WHERE `UID`='{$_SESSION['UID']}'";
			$result=mysql_query($query);
			$a=$amt-$amount;
			$query="UPDATE `bank_info` SET `BALANCE`={$a} WHERE `ACCOUNT_NUMBER`='{$account_number}'";
			$result=mysql_query($query);			
			$query="INSERT INTO `bank_description` VALUES('{$account_number}','phone','{$amount}','{$_SESSION['UID']} paid {$amount} through {$account_number}'";
			$result=mysql_query($query);						
		}
	}
	function admin_search($name)
	{
		openconnection();	
		$query="SELECT * FROM `basic_info` WHERE `FIRST_NAME` LIKE('%{$name}%') OR `MIDDLE_NAME` LIKE('%{$name}%') OR `LAST_NAME` LIKE('%{$name}%');";
		echo json_encode(mysql_query($query));
	}
			
?>

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
				$_SESSION['user']=$username;
				global $root;
				redirect_to($root."/home/background");
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
		$sql="SELECT `UID` FROM `authentication` WHERE `USERNAME`={$username}";
		if($result=mysql_query($sql,$con)){
			$row=mysql_fetch_array($result);
			$id=$row['UID'];
		}
			
	}

	function is_loggedin(){
		if(isset($_SESSION['user'])){
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
?>

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
				redirect_to($root);
			}
			else{
			    echo '
    			    <div class="alert">
    		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
    			    <strong>Warning!    </strong>Incorrect Password or Username
    	   			</div>';
       
  
				
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
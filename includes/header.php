<?php 
  session_start();
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE><?php echo $TITLE; ?></TITLE>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
	</HEAD>
<BODY>
<style type='text/css'>
    body {
      background-color: #eee;
    }
    #content {
      background-color: #FFF;
      border-radius: 5px;
    }
    #content .main {
      padding: 20px;
    }
    #content .sidebar {
      padding: 10px;
    }
    #content p {
      line-height: 30px;
    }
</style>
<div class='container'>
    <h3>DBMS  <small><?php echo strtoupper($TITLE); ?></small></h3>
    <div class='navbar navbar-inverse'>
      <div class='navbar-inner nav-collapse' style="height: auto;">
        <ul class="nav">
          <li class='<?php if($TITLE=='home'){echo "active";} ?>'><a href="<?php echo $root."/home"?>">Home</a></li>
        <?php if(!is_loggedin()){ ?>  
          <li class='<?php if($TITLE=='login'){echo "active";} ?>'><a href="<?php echo $root."/login"?>">login</a></li>
          <li class='<?php if($TITLE=='register'){echo "active";} ?>'><a href="<?php echo $root."/register"?>">register</a></li>
        <?php }
          else{
        ?>   
          <li class='<?php if($TITLE=='logout'){echo "active";} ?>'><a href="<?php echo $root."/logout"?>">logout</a></li>
        <?php } ?>  
        </ul>
      </div>
    </div>
 
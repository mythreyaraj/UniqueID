 <?php 
 		  if(!isset($_SESSION['user'])){
 		  	redirect_to($root);
 		  }
          if(isset($_GET['subpage']) && $_GET['subpage']=='success')
          {
          	
            	echo '
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Hurray!    </strong>Success
                    </div>';
		        
          } 
             else  if(isset($_GET['subpage']) && $_GET['subpage']=='failed')
          	{
          	
            	echo '
                    <div class="alert alert-fail">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Notice!    </strong>Failed
                    </div>';
		        
          }   
?>
<div id='content' class='row-fluid'>

  <div class='span3 sidebar'>
    
	<ul class="nav nav-list">
		<li class="nav-header">Navigation</li>
		<li><a href="<?php echo $root; ?>">Home</a></li>	
		<li ><a href="<?php echo $root."/profile"; ?>" >Profile</a></li>
		<li><a href="<?php echo $root."/bank"; ?>" >Bank Details</a></li>
		<li><a href="<?php echo $root."/birth"; ?>" >Birth Details</a></li>
		<li><a href="<?php echo $root."/criminal"; ?>" >Criminal Details</a></li>
		<li><a href="<?php echo $root."/education"; ?>" >Education Details</a></li>
		<li><a href="<?php echo $root."/medical"; ?>" >Medical Details</a></li>
		<li><a href="<?php echo $root."/passport"; ?>" >Passport Details</a></li>
		<li><a href="<?php echo $root."/tickets"; ?>" >Book Tickets</a></li>
		<li class="active"><a href="<?php echo $root."/bills"; ?>" >Pay Bills</a></li>
	</ul>
  </div>	
  <div class='span8 main'>
    <h3>Bill Payment</h3>
    	<?php 
    		openconnection();
    		$sql="SELECT * FROM `phone_info` WHERE `UID`={$_SESSION['UID']}";
    		$result=mysql_query($sql);
    		$row=mysql_fetch_array($result);
    		$sql="SELECT * FROM `bank_info` WHERE `UID`={$_SESSION['UID']}";
    		$result=mysql_query($sql);
    		
    	?>
  </div>
</div>
<style type="text/css">
	.sidebar{
		background: #F5F5F5;
		margin: 10px;
	}
</style>

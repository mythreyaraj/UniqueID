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
    <div class="row-fluid">
    <h3>Bill Payment</h3>
    <form class="form-basic-info" method="post" action="<?php echo $root."/ajax"; ?>">
      <h4>Phone Bill Payment</h4>
      <label for="anumber">Choose Account Number:</label>
    	<?php 
    		openconnection();
    		$sql="SELECT * FROM `phone_info` WHERE `UID`={$_SESSION['UID']}";
    		$result=mysql_query($sql);
    		$row1=mysql_fetch_array($result);
    		$sql="SELECT * FROM `bank_info` WHERE `UID`={$_SESSION['UID']}";
    		$result=mysql_query($sql);
    		while($row=mysql_fetch_array($result)){
         echo "<label class=\"radio inline\" for=\"anumber\">";
         echo  "<input type=\"radio\" name=\"anumber\" value='{$row['ACCOUNT_NUMBER']}' checked/>
            Account Number:{$row['ACCOUNT_NUMBER']} Balance:{$row['BALANCE']}
            </label><br/>";
        } 
        echo "<input type='hidden' value='{$row1['OUTSTANDING_AMOUNT']}' name='amount'/>";
        echo "<p>Outstanding Balance:{$row1['OUTSTANDING_AMOUNT']}</p>";
    	?>
       <button class="btn btn-medium btn-primary" type="submit" name="payphone">Pay</button>
    </form>
  </div>
  <div class="row-fluid">
   <form class="form-basic-info" method="post" action="<?php echo $root."/ajax"; ?>">
      <h4>Electricity Bill Payment</h4>
      <label for="anumber">Choose Account Number:</label>
      <?php 
        openconnection();
        $sql="SELECT * FROM `electricity_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($sql);
        $row1=mysql_fetch_array($result);
        $sql="SELECT * FROM `bank_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($sql);
        while($row=mysql_fetch_array($result)){
         echo "<label class=\"radio inline\" for=\"anumber\">";
         echo  "<input type=\"radio\" name=\"anumber\" value='{$row['ACCOUNT_NUMBER']}' checked/>
            Account Number:{$row['ACCOUNT_NUMBER']} Balance:{$row['BALANCE']}
            </label><br/>";
        } 
        echo "<input type='hidden' value='{$row1['OUTSTANDING_AMOUNT']}' name='amount'/>";
        echo "<p>Outstanding Balance:{$row1['OUTSTANDING_AMOUNT']}</p>";
      ?>
       <button class="btn btn-medium btn-primary" type="submit" name="payelectricity">Pay</button>
    </form>
  </div>
  </div>
</div>
<style type="text/css">
	.sidebar{
		background: #F5F5F5;
		margin: 10px;
	}
   .form-basic-info {
        padding: 19px 29px 29px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-basic-info .form-basic-info-heading,
      .form-basic-info input[type="text"],
      .form-basic-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 10px;
        
      }
      video{
        width: 300px;
        height: 300px;
        border: 1px solid #ccc;
      }
      #canvas{
        width: 300px;
        height: 300px;
        border: 1px  solid #ccc;
      }
</style>

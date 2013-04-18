<?php 
  if(!isset($_SESSION['user'])){
    redirect_to($root);
  }
?>
<style type="text/css">
	 .form-bank-info {
        max-width: 300px;
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
      .form-bank-info .form-bank-info-heading,
      .form-bank-info input[type="text"],
      .form-bank-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-bank-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <table class="table table-striped table-bordered table-condensed"><thead><tr>
    <td>Bank Name</td><td>Account Number</td><td>Balance</td>
    </thead></tr><tbody>
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `bank_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        while($row=mysql_fetch_array($result)){
          echo "<tr><td>{$row['BANK']}</td><td>{$row['ACCOUNT_NUMBER']}</td><td>{$row['BALANCE']}</tr>";
        }
      }
    ?>
  </tbody></table>

		<label for="BANK">Bank Name:</label><input type="text" class="input-block-level" name="BANK"/>
    <label for="ACCOUNT_NUMBER">Account Number:</label><input type="text" class="input-block-level" name="ACCOUNT_NUMBER"/>
		<label for="BALANCE">Balance:</label><input type="number" class="input-block-level" name="BALANCE"/>
    <button class="btn btn-medium btn-primary" type="submit" name="addbank">ADD ACCOUNT</button>
</form>
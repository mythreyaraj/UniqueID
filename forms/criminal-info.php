<?php 
  if(!isset($_SESSION['user'])){
    redirect_to($root);
  }
?>
<style type="text/css">
	 .form-criminal-info {
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
      .form-criminal-info .form-criminal-info-heading,
      .form-criminal-info input[type="text"],
      .form-criminal-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-criminal-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `criminal_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        while($row=mysql_fetch_array($result)){
          echo "<p>{$row['FIR_NUMBER']}-{$row['DATE']}-{$row['DESCRIPTION']}</p>";
        }
      }
    ?>
    <label for="FIR_NUMBER">Fir number:</label><input type="text" class="input-block-level" name="FIR_NUMBER"/>
		<label for="DATE">Date:</label><input type="date" class="input-block-level" name="DATE" max="2013-04-16"/>
    <label for="DESCRIPTION">Description:</label><input type="text" class="input-block-level" name="DESCRIPTION"/>
    <button class="btn btn-medium btn-primary" type="submit" name="addcrime">ADD</button>
</form>
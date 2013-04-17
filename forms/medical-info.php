<style type="text/css">
	 .form-medical-info {
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
      .form-medical-info .form-medical-info-heading,
      .form-medical-info input[type="text"],
      .form-medical-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-medical-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `medical_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        while($row=mysql_fetch_array($result)){
          echo "<p>{$row['INSURANCE_NUMBER']}-{$row['DESCRIPTION']}</p>";
        }
      }
    ?>
    <label for="INSURANCE_NUMBER">Insurance number:</label><input type="text" class="input-block-level" name="INSURANCE_NUMBER"/>
    <label for="DESCRIPTION">Description:</label><input type="text" class="input-block-level" name="DESCRIPTION"/>
    <input type="hidden" name="sqltransaction" value="insert"/>
    <input type="hidden" name="table" value="medical-info"/>
    <button class="btn btn-medium btn-primary" type="submit">ADD</button>
</form>
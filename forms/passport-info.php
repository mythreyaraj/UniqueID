<style type="text/css">
	 .form-passport-info {
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
      .form-passport-info .form-passport-info-heading,
      .form-passport-info input[type="text"],
      .form-passport-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-passport-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `passport_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        $row=mysql_fetch_array($result);
      }
    ?>
    <label for="PASSPORT_NUMBER">Passport number:</label><input type="text" class="input-block-level" name="PASSPORT_NUMBER" value="<?php echo $row['PASSPORT_NUMBER']; ?>"/>
    <input type="hidden" name="sqltransaction" value="insert"/>
    <input type="hidden" name="table" value="passport-info"/>
    <button class="btn btn-medium btn-primary" type="submit">UPDATE</button>
</form>
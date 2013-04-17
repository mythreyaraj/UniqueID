<style type="text/css">
	 .form-birth-info {
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
      .form-birth-info .form-birth-info-heading,
      .form-birth-info input[type="text"],
      .form-birth-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-birth-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `birth_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        $row=mysql_fetch_array($result);
      }
    ?>
		<label for="DATE">Date:</label><input type="date" class="input-block-level" name="DATE" max="2013-04-16" value="<?php echo $row['DATE']; ?>"/>
    <label for="HOSPITAL">Hospital:</label><input type="text" class="input-block-level" name="HOSPITAL" value="<?php echo $row['HOSPITAL']; ?>"/>
		<label for="FATHER_UID">Father ID:</label><input type="number" class="input-block-level" name="FATHER_UID" value="<?php echo $row['FATHER_UID']; ?>" />
    <label for="MOTHER_UID">Mother ID:</label><input type="number" class="input-block-level" name="MOTHER_UID" value="<?php echo $row['MOTHER_UID']; ?>" />
    <input type="hidden" name="sqltransaction" value="update"/>
    <input type="hidden" name="table" value="birth-info"/>
    <button class="btn btn-medium btn-primary" type="submit">UPDATE</button>
</form>
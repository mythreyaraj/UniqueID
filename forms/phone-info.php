<?php 
  if(!isset($_SESSION['admin'])){
    redirect_to($root);
  }
?>
<style type="text/css">
	 .form-phone-info {
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
      .form-phone-info .form-phone-info-heading,
      .form-phone-info input[type="text"],
      .form-phone-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-phone-info" method="post" action="<?php echo $root."/ajax"; ?>">
<h4 class="form-phone-heading">Phone details</h4>
    <label for="UID">UID:</label><input type="text" class="input-block-level" name="UID" value="<?php echo $_GET['subpage']; ?>" disabled/>  
    <label for="OUTSTANDING_AMOUNT">OUTSTANDING AMOUNT:</label><input type="text" class="input-block-level" name="OUTSTANDING_AMOUNT"/>
    <button class="btn btn-medium btn-primary" type="submit" name="updatephone">UPDATE</button>
</form>

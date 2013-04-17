<style type="text/css">
	 .form-electricity-info {
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
      .form-electricity-info .form-electricity-info-heading,
      .form-electricity-info input[type="text"],
      .form-electricity-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-electricity-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <label for="UID">UID:</label><input type="text" class="input-block-level" name="UID"/>  
    <label for="OUTSTANDING_AMOUNT">OUTSTANDING AMOUNT:</label><input type="text" class="input-block-level" name="OUTSTANDING_AMOUNT"/>
    <input type="hidden" name="sqltransaction" value="update"/>
    <input type="hidden" name="table" value="electricity-info"/>
    <button class="btn btn-medium btn-primary" type="submit">UPDATE</button>
</form>
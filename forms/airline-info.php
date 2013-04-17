<?php 
  if(!isset($_SESSION['user'])){
    redirect_to($root);
  }
?>
<style type="text/css">
	 .form-airline-info {
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
      .form-airline-info .form-airline-info-heading,
      .form-airline-info input[type="text"],
      .form-airline-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-airline-info" method="post" action="<?php echo $root."/ajax"; ?>">
		<label for="FROM">From:</label><select name="FROM" class="input-block-level">
			<option value="1">1</option>
			<option value="1">2</option>
			<option value="1">3</option>
			<option value="1">4</option>
			<option value="1">5</option>
		</select>
		<label for="TO">To:</label><select name="TO" class="input-block-level">
			<option value="1">1</option>
			<option value="1">2</option>
			<option value="1">3</option>
			<option value="1">4</option>
			<option value="1">5</option>
		</select>
		<label for="DATE">Date:</label><input type="date" class="input-block-level" name="DATE" min="2013-04-16"/>
		<label for="NUMBER_OF_PASSENGERS">Number of Passengers:</label><input type="number" class="input-block-level" name="NUMBER_OF_PASSENGERS"/>
		<input type="hidden" class="input-block-level" name="TICKET_NUMBER" value="<?php echo md5(time()."this is a salted hash:)") ?>"/>
    <p>COST:=number_of_passengers x 1000 INR</p>
    <button class="btn btn-medium btn-primary" type="submit" name="bookairlines">BOOK TICKET</button>
</form>
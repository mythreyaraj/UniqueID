<style type="text/css">
	 .form-railway-info {
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
      .form-railway-info .form-railway-info-heading,
      .form-railway-info input[type="text"],
      .form-railway-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-railway-info" method="post" action="<?php echo $root."/ajax"; ?>">
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
		<label for="ADULT_TICKETS">Number of Passengers:</label><input type="number" class="input-block-level" name="ADULT_TICKETS"/>
    <label for="CHILDREN_TICKETS">Number of Passengers:</label><input type="number" class="input-block-level" name="CHILDREN_TICKETS"/>
		<input type="hidden" class="input-block-level" name="PNR" value="<?php echo md5(time()."this is a salted hash:)") ?>"/>
    <input type="hidden" name="sqltransaction" value="insert"/>
    <input type="hidden" name="table" value="railway-info"/>
    <p>COST:=adult_tickets x 1000 + children_tickets x 500 INR</p>
    <button class="btn btn-medium btn-primary" type="submit" name="bookrailticket">BOOK TICKET</button>
</form>

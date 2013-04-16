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
<form class="form-airline-info" method="post" action="">
		<label for="from">From:</label><select name="from" class="input-block-level">
			<option value="1">1</option>
			<option value="1">2</option>
			<option value="1">3</option>
			<option value="1">4</option>
			<option value="1">5</option>
		</select>
		<label for="to">To:</label><select name="to" class="input-block-level">
			<option value="1">1</option>
			<option value="1">2</option>
			<option value="1">3</option>
			<option value="1">4</option>
			<option value="1">5</option>
		</select>
		<label for="date">Date:</label><input type="date" class="input-block-level" name="date" min="2013-04-16"/>
		<label for="nop">Number of Passengers:</label><input type="number" class="input-block-level" name="nop"/>
		<!--<label for="tnumber">Ticket Number:</label><input type="text" class="input-block-level" name="tnumber"/>-->
    <button class="btn btn-medium btn-primary" type="submit">update</button>
</form>
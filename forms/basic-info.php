<?php 
    if(isset($_SESSION['user'])){
        openconnection();
        $id=$_SESSION['UID'];
        $query="SELECT * FROM `basic_info` WHERE `UID`={$id}";
        $result=mysql_query($query);
        $row=mysql_fetch_array($result);
    }
    else{
        redirect_to($root);
    }    
?>
<style type="text/css">
	 .form-basic-info {
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
      .form-basic-info .form-basic-info-heading,
      .form-basic-info input[type="text"],
      .form-basic-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 10px;
        
      }
      video{
        width: 300px;
        height: 300px;
        border: 1px solid #ccc;
      }
      #canvas{
        width: 300px;
        height: 300px;
        border: 1px  solid #ccc;
      }
</style>
<form class="form-basic-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <div class="row">
        <div class="span6">
            <label for="FIRST_NAME">First Name:</label><input type="text" value="<?php echo $row['FIRST_NAME']; ?>" class="input-block-level" name="FIRST_NAME"/>
            <label for="MIDDLE_NAME">Middle Name:</label><input type="text" value="<?php echo $row['MIDDLE_NAME']; ?>" class="input-block-level" name="MIDDLE_NAME"/>
            <label for="LAST_NAME">Last Name:</label><input type="text" value="<?php echo $row['LAST_NAME']; ?>" class="input-block-level" name="LAST_NAME"/>
            <label for="DOB">Date of Birth:</label><input type="date" value="<?php echo $row['DOB']; ?>" class="input-block-level" name="DOB" max="2013-04-16"/>
            <label for="SEX">SEX:</label>
            <label class="radio inline" for="SEX">
            <input type="radio" name="SEX" value="male" <?php if($row['SEX']=='male'){ echo "checked";} ?> />
            M
            </label>
            <label class="radio inline" for="SEX">
            <input type="radio" name="SEX" value="female" <?php if($row['SEX']=='female'){ echo "checked";} ?> />
            F
            </label>
            <br/><br/>
            <label for="MARITAL_STATUS">MARITAL Status:</label><select name="MARITAL_STATUS" class="input-block-level">
            	<option value="married" <?php if($row['MARITAL_STATUS']=='married'){ echo "selected";} ?> >Married</option>
            	<option value="divorced" <?php if($row['MARITAL_STATUS']=='divorced'){ echo "selected";} ?> >Divorced</option>
            	<option value="single" <?php if($row['MARITAL_STATUS']=='single'){ echo "selected";} ?> >Single</option>
            	<option value="engaged" <?php if($row['MARITAL_STATUS']=='engaged'){ echo "selected";} ?> >Engaged</option>
            </select>
        </div>
        <div class="span5">
        	<label for="ADDRESS_1">Address Line 1:</label><input type="text" value="<?php echo $row['ADDRESS_1']; ?>" class="input-block-level" name="ADDRESS_1"/>
            <label for="ADDRESS_2">Address Line 2:</label><input type="text" value="<?php echo $row['ADDRESS_2']; ?>" class="input-block-level" name="ADDRESS_2"/>
            <label for="ADDRESS_3">Address Line 3:</label><input type="text" value="<?php echo $row['ADDRESS_3']; ?>" class="input-block-level" name="ADDRESS_3"/>
            <label for="EMAIL">Email:</label><input type="text" value="<?php echo $row['EMAIL']; ?>" class="input-block-level" name="EMAIL"/>
            <label for="PHONE_NUMBER">Phone:</label><input type="text" value="<?php echo $row['PHONE_NUMBER']; ?>" class="input-block-level" name="PHONE_NUMBER"/>
            <br/><br/><br/>
            <input type="hidden" name="PHOTOGRAPH" value="" id="photo"/>
        </div>    
    </div>
    <div class="row">
        <div class="span12">
           <div class="row"> 
            <div class="span4">
                <video autoplay></video>

            </div>
            <div class="span4">
                <canvas id='canvas' width="300" height="300"></canvas>
                <button class="btn btn-medium" id="capture">capture</button>
            </div>
            <div class="span4">
                <img  width="300" height="300" src="<?php echo $row['PHOTOGRAPH']; ?>"/>
            </div>
           </div> 
        </div>    
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="span12">
            <button class="btn btn-medium btn-primary" type="submit" name="basicupdate">update</button>
        </div> 
    </div>
</form>
<script type="text/javascript">
    var options = {
        video:true   
    };
    if(navigator.webkitGetUserMedia!=null) {
        navigator.webkitGetUserMedia(options,
            function(stream) {
                var video = document.querySelector('video');
                video.src = window.webkitURL.
                createObjectURL(stream);
            },function(e) {
                console.log(e);
                console.log("There was a problem with webkitGetUserMedia");
        });
        document.getElementById('capture').onclick =function(e) {
            e.preventDefault();
            var video = document.querySelector('video');
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');
            ctx.drawImage(video,0,30,300,240);
            var img = canvas.toDataURL("image/jpeg");
            document.getElementById('photo').value=img;
        }
    }

</script>

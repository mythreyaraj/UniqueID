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
<form class="form-basic-info" method="post" action="">
    <div class="row">
        <div class="span6">
            <label for="fname">First Name:</label><input type="text" class="input-block-level" name="fname"/>
            <label for="mname">Middle Name:</label><input type="text" class="input-block-level" name="mname"/>
            <label for="lname">Last Name:</label><input type="text" class="input-block-level" name="lname"/>
            <label for="dob">Date of Birth:</label><input type="date" class="input-block-level" name="dob" max="2013-04-16"/>
            <label for="sex">Sex:</label>
            <label class="radio inline" for="sex">
            <input type="radio" name="sex" value="male"/>
            M
            </label>
            <label class="radio inline" for="sex">
            <input type="radio" name="sex" value="female"/>
            F
            </label>
            <br/><br/>
            <label for="mstatus">Martial Status:</label><select name="mstatus" class="input-block-level">
            	<option value="married">Married</option>
            	<option value="divorced">Divorced</option>
            	<option value="single">Single</option>
            	<option value="engaged">Engaged</option>
            </select>
        </div>
        <div class="span5">
        	<label for="address1">Address Line 1:</label><input type="text" class="input-block-level" name="address1"/>
            <label for="address2">Address Line 2:</label><input type="text" class="input-block-level" name="address2"/>
            <label for="address3">Address Line 3:</label><input type="text" class="input-block-level" name="address3"/>
            <label for="email">Email:</label><input type="text" class="input-block-level" name="email"/>
            <label for="balance">Account Balance:</label><input type="text" class="input-block-level" name="balance"/>
            <br/><br/><br/>
            <input type="hidden" name="photo" value="" id="photo"/>
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
           </div> 
        </div>    
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="span12">
            <button class="btn btn-medium btn-primary" type="submit">update</button>
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
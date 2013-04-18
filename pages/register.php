<?php 
  if(is_loggedin()){
    redirect_to($root);
  }
  if(isset($_POST['register'])){
    addnewuser($_POST['username'],$_POST['password'],$_POST['rpassword']);
  }
          if(isset($_GET['subpage']) && $_GET['subpage']=='success'){
            echo '
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Hurray!    </strong>Registered Successfully
                    </div>';
          }          
?>
<style type="text/css">
	 .form-register {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-register .form-register-heading,
      .form-register input[type="text"],
      .form-register input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-register" method="post">
        <h4 class="form-register-heading">Registration</h4>
        <input type="text" class="input-block-level" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" name="password" placeholder="Password" required>
        <input type="password" class="input-block-level" name="rpassword" placeholder="Reenter-Password" required>
        <button class="btn btn-medium btn-primary" type="submit" name="register">Register</button>
</form>

<?php 
  if(!isset($_SESSION['user'])){
    redirect_to($root);
  }
?>
<style type="text/css">
	 .form-education-info {
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
      .form-education-info .form-education-info-heading,
      .form-education-info input[type="text"],
      .form-education-info input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
<form class="form-education-info" method="post" action="<?php echo $root."/ajax"; ?>">
    <?php 
      if(isset($_SESSION['UID'])){
        $con=openconnection();
        $query="SELECT * FROM `education_info` WHERE `UID`={$_SESSION['UID']}";
        $result=mysql_query($query,$con);
        while($row=mysql_fetch_array($result)){
          echo "<p>{$row['INSTITUTION']}-{$row['PASSING_DATE']}-{$row['QUALIFICATION']}-{$row['PERCENTAGE']}</p>";
        }
      }
    ?>
    <label for="QUALIFICATION">Qualification:</label><input type="text" class="input-block-level" name="QUALIFICATION"/>
    <label for="INSTITUTION">Institution:</label><input type="text" class="input-block-level" name="INSTITUTION"/>
		<label for="PASSING_DATE">Date:</label><input type="date" class="input-block-level" name="PASSING_DATE" max="2013-04-16"/>
    <label for="PERCENTAGE">PERCENTAGE:</label><input type="number" class="input-block-level" name="PERCENTAGE" max=100 />
    <button class="btn btn-medium btn-primary" type="submit" name="addeducation">ADD</button>
</form>

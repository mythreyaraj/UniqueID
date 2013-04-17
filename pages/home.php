 <?php 
          if(isset($_GET['subpage']) && $_GET['subpage']=='success')
          {
          	
            	echo '
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Hurray!    </strong>Success
                    </div>';
		        
          }    
?>
<div id='content' class='row'>
<?php if(isset($_SESSION['admin'])){ ?>
<div class='span12 main'>
<?php 	
	if(isset($_GET['subpage']) && is_numeric($_GET['subpage'])){
		$con=openconnection();
		$sql="SHOW TABLES";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
			$sql="SELECT * FROM {$row[0]} WHERE `UID`={$_GET['subpage']}";
			$r1=mysql_query("DESCRIBE {$row[0]}");
			echo "<table border='1'><tr>";
			while($rw=mysql_fetch_array($r1)){
				echo "<td>{$rw['Field']}</td>";				
			}
				echo "</tr>";
			$r=mysql_query($sql);
			
			while($rw=mysql_fetch_array($r)){
				echo "<tr>";
				for($i=0;$i<count($rw)/2;$i++){
					if(!strncmp($rw[$i], 'data:image/jpeg;base64', strlen('data:image/jpeg;base64'))){
						echo "<td><img src='{$rw[$i]}' height='20' width='20' /></td>";					
					}
					else
						echo "<td>{$rw[$i]}</td>";
				}
				echo "</tr>";
			}
			echo "</table><br/>";
			
		}
		echo "<div class='row'><div class='span6'>";
		include("forms/electricity-info.php");
		echo "</div><div class='span6'>";
		include("forms/phone-info.php");
		echo "</div>";
	}
	else{
		
	}
?>
</div>
<?php }
	else{
 ?>

  <div class='span9 main'>
    <h2>Main Content Section</h2>
  </div>
  <div class='span3 sidebar'>
    <h2>Sidebar</h2>
    <ul class="nav nav-tabs nav-stacked">
      <li><a href='#'>Another Link 1</a></li>
      <li><a href='#'>Another Link 2</a></li>
      <li><a href='#'>Another Link 3</a></li>
    </ul>
  </div>
<?php } ?>  
</div>

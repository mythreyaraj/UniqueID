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
<div id='content' class='row-fluid'>
<?php if(isset($_SESSION['admin'])){ 
	?>
<div class='span12 main'>
<div class='row-fluid'>
	<div class='span12'>
<?php 	
	if(isset($_GET['subpage']) && is_numeric($_GET['subpage'])){
		$con=openconnection();
		$sql="SHOW TABLES";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result)){
			$sql="SELECT * FROM {$row[0]} WHERE `UID`={$_GET['subpage']}";
			$r1=mysql_query("DESCRIBE {$row[0]}");
			echo "<h4>{$row[0]}</h4>";
			echo "<table class='table table-striped table-bordered table-condensed'><thead><tr>";
			while($rw=mysql_fetch_array($r1)){
				if($rw['Field']!='ADDRESS_1' && $rw['Field']!='ADDRESS_2' && $rw['Field']!='ADDRESS_3')
					echo "<td>{$rw['Field']}</td>";		
				else
					if($rw['Field']=='ADDRESS_3'){
						echo "<td>ADDRESS</td>";
					}			
			}
				echo "</tr></thead><tbody>";
			$r=mysql_query($sql);
		if($r){	
			while($rw=mysql_fetch_array($r)){
				echo "<tr>";
				for($i=0;$i<count($rw)/2;$i++){
					if(!strncmp($rw[$i], 'data:image/jpeg;base64', strlen('data:image/jpeg;base64'))){
						echo "<td><img src='{$rw[$i]}' height='20' width='20' /></td>";					
					}
					else
					if($row[0]!='basic_info')
						echo "<td>{$rw[$i]}</td>";
					else{
						if($i>=7 && $i<=9){
							if($i==7){
								echo "<td>{$rw[$i]}<br/>";
							}
							if($i==8){
								echo "{$rw[$i]}<br/>";
							}
							if($i==9){
								echo "{$rw[$i]}</td>";
							}
						}
						else{	
							echo "<td>{$rw[$i]}</td>";
						}	
					}	
				}
				echo "</tr>";
			}
			echo "</tbody></table><br/>";
		}	
		}
		echo '</div></div>';
		echo "<div class='row-fluid'><div class='span6'>";
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

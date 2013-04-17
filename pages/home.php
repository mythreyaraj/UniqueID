 <?php 
          if(isset($_GET['subpage']))
          {
          	if($_GET['subpage']=='background'){
            	echo '
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Hurray!    </strong>Logged in Successfully
                    </div>';
		echo 'Registeration form here';
          }    
?>
<div id='content' class='row-fluid'>
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
</div>

<?php 
foreach (glob("forms/*.php") as $filename)
{
    include $filename;
}
?>

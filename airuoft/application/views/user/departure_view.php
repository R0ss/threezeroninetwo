<?php
echo anchor('user','Back') . "<br />";

//And if the $site variable is not empty we echo it's content 
//by using the generate method of the table class / library
if(!empty($departures)) echo $this->table->generate($departures); 

?>
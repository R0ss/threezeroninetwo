<?php
echo anchor('admin','Back') . "<br />";

// Generate table of flights
if(!empty($flights)) echo $this->table->generate($flights); 
?>
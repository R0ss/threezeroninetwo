<?php
echo anchor('admin','Back') . "<br />";

// Generate table of tickets sold.
if(!empty($tickets)) echo $this->table->generate($tickets);
?>

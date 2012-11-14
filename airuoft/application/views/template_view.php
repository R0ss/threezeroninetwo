<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title><?php echo $title; ?></title>
		<link href="<?php echo base_url();?>css/default.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>css/airuoft.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		
		<noscript>
		Javascript is not enabled! Please turn on Javascript to use this site.
		</noscript>
		
		<script type="text/javascript" src="<?php echo base_url();?>js/prototype.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/scriptaculous.js" ></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/customtools.js" ></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/index_view.js" ></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<?php $this->load->view('header_view');?>
			</div>
			
			<div id="main">
				<?php $this->load->view($main);?> 
			</div>
			  	  
			<div id="footer"> 
				<?php $this->load->view('footer_view');?>
			</div>
		</div>
	</body>
</html>
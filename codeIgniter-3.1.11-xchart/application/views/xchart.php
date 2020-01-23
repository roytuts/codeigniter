<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XChart Example in Codeigniter </title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/charts/chart.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/charts/xcharts.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/charts/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/charts/d3.v2.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/charts/sugar.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/charts/xcharts.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/charts/script.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/daterangepicker.js'></script>
</head>
<body>
	<div style="margin: 10px 0 0 10px;">
		<h3>Codeigniter XChart Example</h3>
		
		<form class="form-horizontal">
			<fieldset>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-calendar"></i></span>
				<input type="text" name="range" id="range" />
			</div>
			</fieldset>
		</form>
		
		<div id="msg"></div>
		
		<div id="placeholder">
			<figure id="chart"></figure>
		</div>
	</div>
</body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Custom Validator Example</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	
	#body {
		margin: 0 15px 0 15px;
	}


	#container {
		margin: 10px;
		width: 600px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>CodeIgniter Custom Validator Example</h1>

	<div id="body">
		<p>
			<?php
				echo form_open($this->uri->uri_string());
				
				if (validation_errors()) {
					echo '<div style="color:red">';
					echo validation_errors();
					echo '</div>';
				}
				
				if (isset($msg)) {
					echo '<div style="color:green">';
					echo $msg;
					echo '</div>';
				}
			?>
			<div>
				<label for="exp_start_date">Start Date <span style="color:red">(required)</span></label>
				<input id="start_date" name="start_date" class="text" value="<?php echo set_value('start_date'); ?>" type="text" />
			</div>
			<div>
				<input name="verify" id="verify" class="button verify" value="Verify" type="submit" />
			</div>
			<?php
				echo form_close();
			?>
		</p>
	</div>
</div>

</body>
</html>

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter Multilingual Site</title>

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

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>
<body>

<div id="container">
	<h1><?php echo $this->lang->line('msg'); ?></h1>

	<div id="body">
		<fieldset>
			<legend>
				<?php echo $this->lang->line('msg'); ?>
			</legend>
			<p>
				<?php
					echo form_open($this->uri->uri_string());
				?>
				<label><?php echo $this->lang->line('chooseLang'); ?></label>
				<select	id="locale" name="locale" onchange = "javascript:this.form.submit();">
					<option value="bn" <?php if($language == 'bn'){ echo 'selected';}?>>বাংলা</option>
					<option value="hi" <?php if($language == 'hi'){ echo 'selected';}?>>हिंदी</option>
					<option value="en" <?php if($language == 'en' || $language == ''){ echo 'selected';}?>>English</option>
					<option value="fr" <?php if($language == 'fr'){ echo 'selected';}?>>Français</option>
					<option value="nl" <?php if($language == 'nl'){ echo 'selected';}?>>Nederlands</option>
				</select>
				<?php
					echo form_close();
				?>
			</p>
		</fieldset>
		<div style="clear: both"></div>
		<div>
			<?php echo $this->lang->line('copyright'); ?> © <?php echo $this->lang->line('year'); ?>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
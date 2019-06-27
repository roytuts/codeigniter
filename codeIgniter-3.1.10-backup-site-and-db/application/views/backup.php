<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.h_title{
			background: url(assets/images/bg_box_head.jpg) repeat-x;
			color: #bebebe;
			cursor: pointer;
			font-size: 14px;
			font-weight: normal;
			height: 22px;
			padding: 7px 0 0 15px;
			text-shadow: #0E0E0E 0px 1px 1px;
		}

		.message_box {
			margin-top: 10px;
		}

		.error, .success {
			/*padding: 20px 20px 20px 40px;*/
			max-width: 525px;
			margin: auto;
			padding: 10px 10px 10px 45px;
			margin-bottom: 5px;
			border-style: solid;
			border-width: 1px;
			background-position: 10px 10px;
			background-repeat: no-repeat;
		}

		.error {
			background-color: #f5dfdf;
			background-image: url(assets/images/error.png);
			border-color: #ce9e9e;
		}

		.success {
			background-color: #e8f5df;
			background-image: url(assets/images/success.png);
			border-color: #9ece9e;
		}
	</style>
</head>
<body>
	<div class="h_title">
		Codeigniter Site and Database Backup
	</div>
	<div class="message_box">
	<?php
		if (isset($success) && strlen($success)) {
			echo '<div class="success">';
			echo '<p>' . $success . '</p>';
			echo '</div>';
		}

		if (isset($errors) && strlen($errors)) {
			echo '<div class="error">';
			echo '<p>' . $errors . '</p>';
			echo '</div>';
		}

		if (validation_errors()) {
			echo validation_errors('<div class="error">', '</div>');
		}
	?>
	</div>
	<?php
		$back_url = $this->uri->uri_string();
		$key = 'referrer_url_key';
		$this->session->set_flashdata($key, $back_url);
	?>
	<div class="body body-s">
	<?php
		echo form_open($this->uri->uri_string());
	?>
	<fieldset>
		<section>
			<label>Backup Type</label>
			<label>
				<select name="backup_type">
				<option value="" selected disabled>Backup Type</option>
				<option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '1' ? 'selected' : '')) ?>>DB Backup</option>
				<option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '2' ? 'selected' : '')) ?>>Site Backup</option>
				</select>
			</label>
		</section>

		<section>
			<label>File Type</label>
			<label>
			<select name="file_type">
				<option value="" selected disabled>File Type</option>
				<option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 1 ? 'selected' : '')) ?>>ZIP</option>
				<option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 2 ? 'selected' : '')) ?>>GZIP</option>
			</select>
			</label>
		</section>
	</fieldset>

	<footer>
		<button type="submit" name="backup" value="backup" class="button">Get Backup</button>
	</footer>
	<?php
		echo form_close();
	?>
	</div>
</body>
</html>
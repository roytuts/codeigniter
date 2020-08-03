<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Multiple Thumbnails Creation</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
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

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
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
		margin: 10px auto;
		padding: 10px;
		width:500px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>CodeIgniter Multiple Thumbnails Creation</h1>

	<p>Select an image to create multiple thumbnails</p>
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
	<div>
	<?php
		$attributes = array('name' => 'file_upload_form', 'id' => 'file_upload_form');
		echo form_open_multipart($this->uri->uri_string(), $attributes);
	?>
		<p><input name="file_name" id="file_name" readonly="readonly" type="file" /></p>
		<p><input name="file_upload" value="Create Thumbnails" type="submit" /></p>
	<?php
        echo form_close();
    ?>
	</div>
</div>

</body>
</html>
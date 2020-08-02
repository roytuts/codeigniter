<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter Photo Gallery</title>
	
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/simplelightbox.min.css">

	<!-- JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/simple-lightbox.min.js"></script>
</head>
<body>

	<div class='container'>
		<h1> Welcome to CodeIgniter Photo Gallery </h1>
		<div class="gallery">
			<?php
			$dir_thumbs = './assets/images/thumbs/';
			$dir_images = './assets/images/';
			$images = directory_map($dir_thumbs);
			
			$i = 1;
			foreach ($images as $key => $image) {
			?>
				<a href="<?php echo base_url($dir_images) . $image;?>">
					<img src="<?php echo base_url($dir_thumbs) . $image;?>" alt="<?php echo $image;?>">
				</a>
			<?php
				if($i++%4 == 0) {
					?>
					<div class="clear"></div>
					<?php
				}
			}
			?>
		</div>
	</div>

	<script type='text/javascript'>
		$(document).ready(function() {
			$('.gallery a').simpleLightbox();
		});
	</script>

</body>
</html>
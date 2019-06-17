<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bookmark a page using CodeIgniter</title>

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
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.bookmark").click(function(e) {
				e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
				// var bookmarkUrl = this.href;
				// var bookmarkTitle = this.title;
				var bookmarkUrl = window.location.href;
				var bookmarkTitle = document.title;
				//alert(bookmarkUrl+', '+bookmarkTitle);
				var cct = $("input[name=csrf_token_name]").val();
				var token = $('#bookmark_form').serialize();
				var url = "http://localhost/codeIgniter-3.1.10-bookmark-page/index.php/bookmark/bookmark";
				var data = token + "&title=" + bookmarkTitle + "&url=" + bookmarkUrl;

				if (window.sidebar && window.sidebar.addPanel) {
					// Mozilla Firefox Bookmark, Firefox version < 23
					window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,'');
					$.ajax({
						type: "POST",
						//async: false,
						url: url,
						data: data,
						dataType: "html",
						cache: false,
						csrf_token_name: cct,
						success: function(resp) {
							alert(resp);
						}
					});
				} else if(window.opera && window.print){
					// Firefox version >= 23
					$("a.bookmark").attr("href", bookmarkUrl);
					$("a.bookmark").attr("title", bookmarkTitle);
					$("a.bookmark").attr("rel", "sidebar");
					$.ajax({
						type: "POST",
						//async: false,
						url: url,
						data: data,
						dataType: "html",
						cache: false,
						csrf_token_name: cct,
						success: function(resp) {
							alert(resp);
						}
					});
					return true;		
				} else if ((window.external && ('AddFavorite' in window.external))) { // For IE Favorite
					window.external.AddFavorite(bookmarkUrl, bookmarkTitle);
					$.ajax({
						type: "POST",
						//async: false,
						url: url,
						data: data,
						dataType: "html",
						cache: false,
						csrf_token_name: cct,
						success: function(resp) {
							alert(resp);
						}
					});
				} else { // for other browsers which does not support
					alert('Your browser does not support this bookmark action');
					if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1){ //chrome
						alert("In order to bookmark press " + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + "+D.")
					}
					if ((window.sidebar && ! (window.sidebar instanceof Node)/*/Firefox/i.test(navigator.userAgent)*/)){ //Firefox
						alert("In order to bookmark press " + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + "+D.")
					}
					return false;
				}
			});
		});
	</script>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<form id="bookmark_form" name="bookmark_form" action="#" method="post">
			<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
			<a class="bookmark" style="color: #0077b3;" href="#">Add to Favourite or Bookmark this page</a>
		</form>
		
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/bookmark.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Bookmark.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
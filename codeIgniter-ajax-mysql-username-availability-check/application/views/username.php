<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Check username availability using CodeIgniter, jQuery, AJAX</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-3.1.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
	<div style="margin: 10px 0 0 10px;width: 600px">
		<h3>Codeigniter username availability check</h3>
		<form id="signupform" style="padding: 10px;">
			<fieldset>
				<legend>Check username</legend>
				<div>
					<label>Username</label><br/>
					<input type="text" name="username" id="username"/>
					<div id="msg"></div>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>

<!-- below jquery things triggered on on input event and checks the username availability in the database -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#username").on("input", function(e) {
			$('#msg').hide();
			if ($('#username').val() == null || $('#username').val() == "") {
				$('#msg').show();
				$("#msg").html("Username is required field.").css("color", "red");
			} else {
				$.ajax({
					type: "POST",
					url: "http://localhost/codeIgniter-ajax-mysql-username-availability-check/index.php/usernamecheck/get_username_availability",
					data: $('#signupform').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
		});
	});
</script>

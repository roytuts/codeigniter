<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Server Sent Events (SSE) using CodeIgniter</title>

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
</head>
<body>

<div id="container">
	<h1>Welcome to Server Sent Events (SSE) using CodeIgniter</h1>

	<div id="body">
		<button id="close">Close the connection</button>
		<button id="open">Refresh the connection</button>
		<ul>
		</ul>
		
		<script>
			var closeButton = document.getElementById('close');
			var openButton = document.getElementById('open');
			
			var evtSource = new EventSource('index.php/welcome/event_data');

			var eventList = document.querySelector('ul');

			evtSource.onopen = function() {
				openButton.disabled = true;
				closeButton.disabled = false;
				console.log("Connection to server opened.");
			};

			evtSource.onmessage = function(e) {
			var newElement = document.createElement("li");

			newElement.textContent = "message: " + e.data;
				eventList.appendChild(newElement);
			};

			evtSource.onerror = function() {
				console.log("EventSource failed.");
			};

			closeButton.onclick = function() {
				evtSource.close();
				openButton.disabled = false;
				closeButton.disabled = true;
				console.log('Connection closed');				
			};
			
			openButton.onclick = function() {
				location.reload();
				openButton.disabled = true;
			};

			evtSource.addEventListener("ping", function(e) {
				var newElement = document.createElement("li");
				var obj = JSON.parse(e.data);
				newElement.innerHTML = "ping at " + obj.time;
				eventList.appendChild(newElement);
			}, false);
		</script>
	</div>
</div>

</body>
</html>
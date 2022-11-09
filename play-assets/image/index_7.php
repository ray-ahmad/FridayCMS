<?php
	$server_protocol = isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.1";
	header("{$server_protocol} " . 403, TRUE, 403);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>403 Forbidden</title>
	</head>
	<body>
		<h1>Forbidden</h1>
		<p>You don't have permission to access this directory on this server.</p>
		<hr>
	</body>
</html>

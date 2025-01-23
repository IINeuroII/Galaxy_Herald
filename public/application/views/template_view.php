<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ГАЛАКТИЧЕСКИЙ ВЕСТНИК</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
		<?php
			echo '<link rel="stylesheet" type="text/css" href="/css/style.css?ver='.filemtime('css/style.css').'" />';
		?>
	</head>
	<body>
		<header class = "indent">
			<img src = "images/logo.png" style = "height: 100%"/>
			<p> Галактический <br/> вестник </p>
		</header>
		<?php include 'application/views/'.$content_view; ?>
		<footer class = "indent">
			<hr />
			© 2023 - 2412 «Галактический вестник»
		</footer>
	</body>
</html>

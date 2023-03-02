<?php

	// Aquí se desarrolla la lógica para subir los artículos del RSS en la base de datos.
	if (empty($_POST['feedurl'])) {
		die;
	}
	$urls = $_POST['feedurl'];
	require_once("../controllers/rss_storage.php");
	$urls = preg_replace('/\s/', PHP_EOL, $urls);
	$urls = explode(PHP_EOL, $urls);

	if (!isset($_COOKIE['urls'])) {
		require_once('cookies.php');
	}

	foreach ($urls as $url) {
		rss_storage(trim($url));
	}
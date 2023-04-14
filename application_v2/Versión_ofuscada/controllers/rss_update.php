<?php
	if (!isset($_COOKIE['urls'])) {
		die;
	}
	$urls = $_COOKIE['urls']; // Se guardan las url de la cookie.

	require_once("rss_delete.php"); // Se elimina la base de datos.
	require_once("rss_storage.php");

	$urls = str_replace('|', PHP_EOL, $urls);
	$urls = explode(PHP_EOL, $urls);
	require_once("cookies.php"); // Se genera de nuevo la cookie.

	foreach ($urls as $url) {
		rss_storage(trim($url));
	}

	require_once("rss_reader.php");

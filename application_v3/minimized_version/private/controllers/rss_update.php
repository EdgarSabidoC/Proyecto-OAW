<?php
	if (!isset($_COOKIE['urls'])) {
		die;
	}
	$urls = $_COOKIE['urls']; // Se guardan las url de la cookie.

	include_once("../../private/controllers/rss_delete.php"); // Se elimina la base de datos.
	include_once("../../private/controllers/rss_storage.php");

	$urls = str_replace('|', PHP_EOL, $urls);
	$urls = explode(PHP_EOL, $urls);
	include_once("../../private/controllers/cookies.php"); // Se genera de nuevo la cookie.

	foreach ($urls as $url) {
		rss_storage(trim($url));
	}
	include_once("../../private/controllers/rss_reader.php");
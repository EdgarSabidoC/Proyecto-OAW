<?php

	// Aquí se desarrolla la lógica para guardar los artículos del RSS en la base de datos.
	if ($_POST['feedurl'] !== '') {
		$urls = $_POST['feedurl'];
	} else {
        die;
    }

    require_once("../controllers/rss_storage.php");
    $urls = preg_replace('/\s/', PHP_EOL, $urls);
    $urls = explode(PHP_EOL, $urls);
    foreach ($urls as $url){
        rss_storage(trim($url));
    }
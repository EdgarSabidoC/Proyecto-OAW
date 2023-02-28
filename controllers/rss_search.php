<?php
    // Aquí se desarrolla la lógica para guardar los artículos del RSS en la base de datos.
    if ($_POST['searchtext'] !== '') {
        $text = $_POST['searchtext'];
    } else {
        die;
    }
	// Se obtienen los datos del modelo:
	require_once("../models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items($text);
	unset($feed);

	if (!$items) {
		echo "<h1>No tenemos noticias que mostrarte</h1>";
		echo "<h3>Parece ser que no hemos conseguido encontrar lo que querias.</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../views/rss_reader.php');
	}

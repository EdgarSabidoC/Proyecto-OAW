<?php
	// Aquí se desarrolla la lógica para buscar los artículos del RSS en la base de datos.
	if (empty($_GET['searchtext'])) {
		die;
	}
	$text = $_GET['searchtext'];

	// Se obtienen los datos del modelo:
	include_once("../../private/models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items($text);

	if (!$items) {
		echo "<h1>No tenemos noticias que mostrar</h1>";
		echo "<h3>Parece ser que no hemos conseguido encontrar lo que querias.</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		include_once('../../private/views/rss_reader.php');
	}

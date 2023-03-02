<?php
	// Aquí se desarrolla la lógica para buscar los artículos del RSS en la base de datos.
	if (empty($_POST['searchtext'])) {
		die;
	}
	$text = $_POST['searchtext'];

	// Se obtienen los datos del modelo:
	require_once("../models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items($text);

	if (!$items) {
		echo "<h1>No tenemos noticias que mostrar</h1>";
		echo "<h3>Parece ser que no hemos conseguido encontrar lo que querias.</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../views/rss_reader.php');
	}

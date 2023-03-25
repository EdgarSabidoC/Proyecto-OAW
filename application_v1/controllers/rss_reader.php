<?php
	// Se obtienen los datos del modelo:
	require_once("../models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->get_items();
	unset($feed);

	if (!$items) {
		echo "<h1>No hay noticias que mostrar</h1>";
		echo "<h3>¡Intenta añadir nuevos Feeds de tus sitios favoritos!</h3>";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../views/rss_reader.php');
	}

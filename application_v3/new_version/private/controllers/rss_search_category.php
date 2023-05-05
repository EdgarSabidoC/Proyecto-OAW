<?php
	if ($_GET['category'] !== '') {
	// Se obtiene el parámetro de la categoría:
	$parameter = $_GET['category'];
} else {
	die;
}

	// Se obtienen los datos del modelo:
	include_once("../../private/models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->search_items_by_category($parameter);
	unset($feed);

	if ($items) {
		// Si no hay un error se llama a la vista:
		include_once('../../private/views/rss_reader.php');
	}

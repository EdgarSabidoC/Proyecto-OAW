<?php
	// Se obtienen los datos del modelo:
	include_once("../../private/models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->get_items();
	unset($feed);

	if ($items) {
		// Si no hay un error se llama a la vista:
		include_once('../../private/views/rss_reader.php');
	}

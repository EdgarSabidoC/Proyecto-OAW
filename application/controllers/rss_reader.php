<?php
	// Se obtienen los datos del modelo:
	require_once("../models/rssReader_model.php");
	$feed = new rssReaderModel();
	$items = $feed->get_items();

	if (!$items) {
		echo "ERROR! ";
		die;
	} else {
		// Si no hay un error se llama a la vista:
		require_once('../views/rss_reader.php');
	}

<?php
// Se obtienen los datos del modelo:
require_once("../models/rssReader_model.php");
$feed = new rssReaderModel();
$items = $feed->getCategories();
unset($feed);

if (!$items) {
	echo "<h6>Sin categorias...</h6>";
	die;
} else {
	// Si no hay un error se llama a la vista:
	require_once('../views/rss_categories_reader.php');
}
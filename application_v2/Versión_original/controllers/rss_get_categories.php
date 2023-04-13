<?php
// Se obtienen los datos del modelo:
require_once("../models/rssReader_model.php");
$feed = new rssReaderModel();
$items = $feed->get_categories();
unset($feed);

if (!$items) {
	echo "<h6>Sin categorias...</h6>";
	die;
} else {
	$arrayCategories = array();
	foreach ($items as $item) {
		if ($item["categories"]) {
			array_push($arrayCategories, ucwords($item["categories"]));
		}
	}
	$arrayCategories = array_unique($arrayCategories);
	sort($arrayCategories);
	// Si no hay un error se llama a la vista:
	require_once('../views/rss_categories_reader.php');
}

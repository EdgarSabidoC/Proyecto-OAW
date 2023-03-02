<?php
// Aquí se desarrolla la lógica para guardar los artículos del RSS en la base de datos.
if ($_GET['searchBox'] !== '' && $_GET['formSelect'] !== '') {
	$text = $_GET['searchBox'];
	$selectOption = $_GET['formSelect'];
} else {
	die;
}

//se valida que tipo de opccion selecciono el usuario
if ($selectOption == 1) {
	$selectOption = "ORDER BY date DESC";
} else if ($selectOption == 2) {
	$selectOption = "ORDER BY title ASC";
} else if ($selectOption == 3) {
	$selectOption = "ORDER BY description ASC";
} else if ($selectOption == 4) {
	$selectOption = "ORDER BY date ASC";
}
// Se obtienen los datos del modelo:
require_once("../models/rssReader_model.php");
$feed = new rssReaderModel();
$items = $feed->getCategories($text, $selectOption);
unset($feed);

if (!$items) {
	echo "<h4>Aun no hay resultados...</h3>";
	die;
} else {
	// Si no hay un error se llama a la vista:
	require_once('../views/rss_categories_reader.php');
}
<?php

	// Aquí se desarrolla la lógica para guardar los artículos del RSS en la base de datos.
	if ($_POST['feedurl'] !== '') {
		$url = $_POST['feedurl'];
	}

	// Instancia del modelo para almacenar los datos:
	require_once("../models/rssReader_model.php");
	$rssModel = new rssReaderModel();

	// Instanciación del feed:
	require_once('../libraries/Third_party/SimplePie.compiled.php');
	$feed = new SimplePie();
	$feed->set_feed_url($url);

	// Caché:
	$feed->enable_cache(true);
	$feed->set_cache_location('../cache');
	$feed->set_cache_duration(1000);

	// Inicialización del feed:
	$feed->init();
	$feed->handle_content_type();

	if ($feed->error()) {
		echo "<script>console.log('{$feed->error()}')</script>";
		die;
	}

	// Aquí se debe de guardar en la base de datos.
	foreach ($feed->get_items() as $item) {
		$title = $item->get_title();
		$date = $item->get_date('Y-m-d H:i:s');
		$description = $item->get_description();
		$permalink = $item->get_permalink();
		$categories = '';

		foreach ($item->get_categories() as $category) {
			$categories .= $category->get_label() . '|';
		}

		$rssModel->set_item($title, $date, $description, $permalink, $categories);
	}

	unset($rssModel);
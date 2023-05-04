<?php
	function clean_string(string &$str) {
		$str = preg_replace('/[^[:alnum:]]/u', ' ', $str);
		// remove_stopwords($str);
		return $str;
	}

	function rss_storage($url) {
		// Instancia del modelo para almacenar los datos:
		include_once("../models/rssReader_model.php");
		$rssModel = new rssReaderModel();

		// Instanciación del feed:
		include_once('../libraries/third-party/simplepie-1.8.0/SimplePie.compiled.php');
		$feed = new SimplePie();
		$feed->set_feed_url($url);

		// Se habilita la caché:
		$feed->enable_cache(true);
		$feed->set_cache_location('../cache');
		$feed->set_cache_duration(1000);

		// Inicialización del feed:
		$feed->init();
		$feed->handle_content_type();

		if ($feed->error()) {
			echo "<script>console.log('" . $feed->error() . "')</script>";
			die;
		}

		// Aquí se debe de guardar en la base de datos.
		foreach ($feed->get_items() as $item) {
			if ($item->get_title() && $item->get_date('Y-m-d H:i:s') && $item->get_description() && $item->get_permalink()) {
				$title = $item->get_title();
				$date = $item->get_date('Y-m-d H:i:s');
				$description = $item->get_description();
				$permalink = $item->get_permalink();
				$categories = '';

				if ($item->get_categories()) {
					$categories = $item->get_categories();
					$categories = $categories[0]->get_label();
				}

				if ($item->get_enclosure()->get_link()) {
					include_once('../utils/convertToWebp.php'); // Se añade la función de conversión de imágenes.
					$source = $item->get_enclosure()->get_link();
					$image = convertToWebp($source, crc32($title), 80, 700, 350);
				} else {
					$image = './assets/Img/dummy_700x350.webp';
					// $query = str_replace(' ', '+', trim(clean_string($title)));
					// $search = file_get_contents('https://www.googleapis.com/customsearch/v1?cx=6309d895094ec42e8&q='
					// .$query.'&searchType=image&key=');
					// $decodedJson = json_decode($search, true);
					// 	if ($decodedJson) {
					// 		$image = $decodedJson['items'][0]['link'];
					// 	} else {
					// 		$image = './assets/Img/dummy_700x350.webp';
					// 	}
				}
				$rssModel->set_item($title, $date, $description, $permalink, $categories, $image);
			}

		}
	}
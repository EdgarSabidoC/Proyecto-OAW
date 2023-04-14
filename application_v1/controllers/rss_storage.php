<?php
	function clean_string(string &$str) {
		$str = preg_replace('/[^[:alnum:]]/u', ' ', $str);
		// remove_stopwords($str);
		return $str;
	}

	function rss_storage($url) {
		// Instancia del modelo para almacenar los datos:
		require_once("../models/rssReader_model.php");
		$rssModel = new rssReaderModel();

		// Instanciación del feed:
		require_once('../libraries/third-party/simplepie-1.8.0/autoloader.php');
		$feed = new SimplePie();
		$feed->set_feed_url($url);

		// Se deshabilita la caché:
		$feed->enable_cache(false);

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
					$image = $item->get_enclosure()->get_link();
				} else {
					$image = 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg';
					// $query = str_replace(' ', '+', trim(clean_string($title)));
					// $search = file_get_contents('https://www.googleapis.com/customsearch/v1?cx=6309d895094ec42e8&q='
					// .$query.'&searchType=image&key=');
					// $decodedJson = json_decode($search, true);
					// 	if ($decodedJson) {
					// 		$image = $decodedJson['items'][0]['link'];
					// 	} else {
					// 		$image = 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg';
					// 	}
				}
				$rssModel->set_item($title, $date, $description, $permalink, $categories, $image);
			}

		}
	}

<?php
		include_once("../models/rssReader_model.php");
		$rssModel = new rssReaderModel();

		// Se eliminan las noticias de la BD:
		$rssModel->delete_items();

		// Se elimina la cookie:
		if (isset($_COOKIE['urls'])) {
			setcookie('urls', '', time() - 3600, '/');
		}

		// Se eliminan las imágenes del caché:
		include_once("../utils/deleteImages.php");
		deleteImages('../assets/cacheImage/feedsImages', 'webp');
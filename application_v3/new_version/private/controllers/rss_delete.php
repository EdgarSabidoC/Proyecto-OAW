<?php
		include_once("../../private/models/rssReader_model.php");
		$rssModel = new rssReaderModel();

		// Se eliminan las noticias de la BD:
		$rssModel->delete_items();

		// Se elimina la cookie:
		if (isset($_COOKIE['urls'])) {
			setcookie('urls', '', time() - 3600, '/');
		}

		// Se eliminan las imágenes del caché:
		include_once('../../private/utils/deleteImages.php');
		deleteImages('../../public/cache/feedsImages', 'webp');
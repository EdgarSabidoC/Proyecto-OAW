<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$src = $_GET['src'] ?? '';
	} else {
		$src = $_POST['src'] ?? '';
	}
	switch ($src) {
		case 'categories':
			include_once('../../private/controllers/rss_get_categories.php');
			break;
		case 'reader':
			include_once('../../private/controllers/rss_reader.php');
			break;
		case 'update':
			include_once('../../private/controllers/rss_update.php');
			break;
		case 'delete':
			include_once('../../private/controllers/rss_delete.php');
			break;
		case 'save':
			include_once('../../private/controllers/rss_upload.php');
			break;
	}
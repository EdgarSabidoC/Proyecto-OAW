<?php
		require_once("../models/rssReader_model.php");
		$rssModel = new rssReaderModel();
		$rssModel->delete_items();

		if (isset($_COOKIE['urls'])) {
			setcookie('urls', '', time() - 3600);
		}
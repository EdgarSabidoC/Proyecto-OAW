<?php

	// Aquí se desarrolla la lógica para guardar los artículos del RSS en la base de datos.
	if ($_POST['feedurl'] !== '') {
		$urls = $_POST['feedurl'];
	} else {
        die;
    }

    require_once("../models/rssReader_model.php");
    $rssModel = new rssReaderModel();
    $rssModel->delete_items();
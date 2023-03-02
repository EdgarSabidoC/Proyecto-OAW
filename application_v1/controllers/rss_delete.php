<?php
    require_once("../models/rssReader_model.php");
    $rssModel = new rssReaderModel();
    $rssModel->delete_items();
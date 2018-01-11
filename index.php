<?php
require_once 'common.php';
$homeHandler = new \GameCatalog\Http\HomeHttpHandler($template, $dataBinder);
$homeHandler->index();
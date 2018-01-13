<?php
require_once "common.php";
$gameRepo = new \GameCatalog\Repository\GamesRepository($db, $dataBinder);
$gameService = new \GameCatalog\Service\GameService($gameRepo);
$gameHandler = new \GameCatalog\Http\GameHttpHandler($template, $dataBinder, $gameService);

$gameHandler->all();
<?php
require_once 'common.php';
$gameRepository = new \GameCatalog\Repository\GamesRepository($db, $dataBinder);
$gameService = new \GameCatalog\Service\GameService($gameRepository);
$gameHandler = new \GameCatalog\Http\GameHttpHandler($template, $dataBinder, $gameService);
$gameHandler->delete($gameService, $_GET);
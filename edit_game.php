<?php
require_once 'common.php';
$gameRepository = new \GameCatalog\Repository\GamesRepository($db, $dataBinder);
$gameService = new \GameCatalog\Service\GameService($gameRepository);
$controllerService = new \GameCatalog\Service\ControllersService(new \GameCatalog\Repository\ControllersRepository($db));
$userService = new \GameCatalog\Service\UserService(new \GameCatalog\Repository\UserRepository($db));
$gameHandler = new \GameCatalog\Http\GameHttpHandler($template, $dataBinder, $gameService);
$gameHandler->edit($gameService, $controllerService, $userService, $_POST, $_GET);

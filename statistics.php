<?php
require_once "common.php";
$controllerRepo = new \GameCatalog\Repository\ControllersRepository($db, $dataBinder);
$controllersService = new \GameCatalog\Service\ControllersService($controllerRepo);
$controllersHandler = new \GameCatalog\Http\ControllersHttpHandler($template, $dataBinder, $controllersService);

$controllersHandler->report();
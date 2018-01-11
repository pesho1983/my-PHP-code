<?php
require_once 'common.php';
$userService = new \GameCatalog\Service\UserService(new \GameCatalog\Repository\UserRepository($db));
$userHandler = new \GameCatalog\Http\UserHttpHandler($userService, $template, $dataBinder);
$userHandler->login($_POST);
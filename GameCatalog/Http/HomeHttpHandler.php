<?php

namespace GameCatalog\Http;


use GameCatalog\Service\GameServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            $this->render("home/index");
        } else {
            $this->redirect("games.php");
        }
    }

}
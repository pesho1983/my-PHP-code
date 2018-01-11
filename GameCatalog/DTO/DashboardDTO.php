<?php

namespace GameCatalog\DTO;

use GameCatalog\DTO\GameDTO;

class DashboardDTO
{
    /**
     * @var \Generator|GameDTO[]
     */
    private $games;

    /**
     * @return GameDTO[]|\Generator
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param GameDTO[]|\Generator $games
     */
    public function setGames($games)
    {
        $this->games = $games;
    }

}
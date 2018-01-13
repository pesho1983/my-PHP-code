<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/13/2018
 * Time: 3:13 PM
 */

namespace GameCatalog\DTO;


class StatisticDTO
{
    private $controllers;
    private $games;
    private $playtime;

    /**
     * @return mixed
     */
    public function getControllers()
    {
        return $this->controllers;
    }

    /**
     * @return mixed
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @return mixed
     */
    public function getPlaytime()
    {
        return $this->playtime;
    }
}
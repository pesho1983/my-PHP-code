<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/9/2018
 * Time: 7:59 PM
 */

namespace GameCatalog\DTO;


class GameErrorDTO
{
    private $id;
    private $title;
    private $publisher;
    private $releaseDate;
    /**
     * @var ControllersDTO
     */
    private $controller;

    private $lastPlayed;
    private $playTime;
    /**
     * @var UserDTO
     */
    private $user;

}
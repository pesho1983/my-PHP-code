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
    private $title;
    private $publisher;
    private $release_date;
    /**
     * @var ControllersDTO
     */
    private $controller;

    private $last_played;
    private $playTime;
    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @param mixed $release_date
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /**
     * @return ControllersDTO
     */
    public function getController(): ControllersDTO
    {
        return $this->controller;
    }

    /**
     * @param ControllersDTO $controller
     */
    public function setController(ControllersDTO $controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getLastPlayed()
    {
        return $this->last_played;
    }

    /**
     * @param mixed $last_played
     */
    public function setLastPlayed($last_played)
    {
        $this->last_played = $last_played;
    }

    /**
     * @return mixed
     */
    public function getPlayTime()
    {
        return $this->playTime;
    }

    /**
     * @param mixed $playTime
     */
    public function setPlayTime($playTime)
    {
        $this->playTime = $playTime;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user)
    {
        $this->user = $user;
    }


}
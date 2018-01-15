<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:01 PM
 */

namespace GameCatalog\DTO;


class GameDTO
{
    const FIELDS_MAX_LENGTH = 255;
    const TITLE_MIN_LENGTH = 1;

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

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
        DTOValidator::validate(
            self::TITLE_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $title,
            "Title must be between " . self::TITLE_MIN_LENGTH . " and " . self::FIELDS_MAX_LENGTH . " characters long!"
        );
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
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
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
        return $this->lastPlayed;
    }

    /**
     * @param mixed $lastPlayed
     */
    public function setLastPlayed($lastPlayed)
    {
        $this->lastPlayed = $lastPlayed;
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
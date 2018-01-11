<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/9/2018
 * Time: 3:58 PM
 */

namespace GameCatalog\DTO;


class RegisterUserDTO
{
    private $username;

    private $password;

    private $display_name;

    private $born_on;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @param mixed $display_name
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;
    }

    /**
     * @return mixed
     */
    public function getBornOn()
    {
        return $this->born_on;
    }

    /**
     * @param mixed $born_on
     */
    public function setBornOn($born_on)
    {
        $this->born_on = $born_on;
    }

}
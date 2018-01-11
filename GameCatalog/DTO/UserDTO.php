<?php

namespace GameCatalog\DTO;


class UserDTO
{
    const FIELDS_MAX_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 4;
    const PASSWORD_MIN_LENGTH = 6;
    const DISPLAY_NAME_MIN_LENGTH = 5;

    private $id;

    private $username;

    private $password;

    private $displayName;

    private $bornOn;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @throws \Exception
     */
    public function setUsername($username)
    {
        DTOValidator::validate(
            self::USERNAME_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $username,
            "Username must be between " . self::USERNAME_MIN_LENGTH . " and " . self::FIELDS_MAX_LENGTH . " characters!"
        );
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @throws \Exception
     */
    public function setPassword($password)
    {
        DTOValidator::validate(
            self::PASSWORD_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $password,
            "Password must be between " . self::PASSWORD_MIN_LENGTH . " and " . self::FIELDS_MAX_LENGTH . " characters!"
        );
        $this->password = $password;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }


    public function setDisplayName($displayName)
    {
        DTOValidator::validate(
            self::DISPLAY_NAME_MIN_LENGTH,
            self::FIELDS_MAX_LENGTH,
            $displayName,
            "Display name must be between " . self::DISPLAY_NAME_MIN_LENGTH . " and " . self::FIELDS_MAX_LENGTH . " characters!"
        );

        $this->displayName = $displayName;
    }


    public function getBornOn()
    {
        return $this->bornOn;
    }

    public function setBornOn($bornOn)
    {
        $this->bornOn = $bornOn;
    }
}
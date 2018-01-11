<?php

namespace GameCatalog\DTO;


class DTOValidator
{
    public static function validate($min, $max, $value, $errorMessage)
    {
        if (mb_strlen($value) < $min
            || mb_strlen($value) > $max) {
            throw new \Exception($errorMessage);
        }
    }
}
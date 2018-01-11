<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:10 PM
 */

namespace GameCatalog\Repository;


use GameCatalog\DTO\ControllersDTO;

interface ControllersRepositoryInterface
{
    public function findAll(): \Generator;

    public function findOne(int $id): ControllersDTO;

    public function report(): \Generator;
}
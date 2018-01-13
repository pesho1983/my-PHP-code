<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:25 PM
 */

namespace GameCatalog\Service;


use GameCatalog\DTO\ControllersDTO;
use GameCatalog\DTO\StatisticDTO;

interface ControllersServiceInterface
{
    /**
     * @return \Generator|ControllersDTO[]
     */
    public function getAll(): \Generator;

    public function view(int $id): ControllersDTO;

    public function report(): \Generator;
}
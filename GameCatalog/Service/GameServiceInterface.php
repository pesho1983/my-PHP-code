<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:25 PM
 */

namespace GameCatalog\Service;


use GameCatalog\DTO\DashboardDTO;
use GameCatalog\DTO\GameDTO;

interface GameServiceInterface
{
    public function add(GameDTO $game): bool;

    public function edit(GameDTO $game, int $id): bool;

    public function remove(int $id): bool;

    public function view(int $id): GameDTO;

    //public function getDashboard(): DashboardDTO;

    public function getAll(): \Generator;
}
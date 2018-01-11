<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 11:59 AM
 */

namespace GameCatalog\Repository;


use GameCatalog\DTO\GameDTO;

interface GamesRepositoryInterface
{
    public function findAll(): \Generator;

    public function findOne(int $id): GameDTO;

    public function insert(GameDTO $game): bool;

    public function update(GameDTO $game, int $id): bool;

    public function delete(int $id): bool;
}
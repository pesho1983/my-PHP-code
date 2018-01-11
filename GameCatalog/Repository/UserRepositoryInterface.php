<?php

namespace GameCatalog\Repository;



use GameCatalog\DTO\UserDTO;

interface UserRepositoryInterface
{
    public function findOne(int $id): UserDTO;

    public function findOneByUsername(string $username): ?UserDTO;

    public function insert(UserDTO $user): bool;
}
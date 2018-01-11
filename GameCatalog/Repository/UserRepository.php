<?php

namespace GameCatalog\Repository;


use Database\DatabaseInterface;
use GameCatalog\DTO\UserDTO;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function findOneByUsername(string $username): ?UserDTO
    {
        $query = "
            SELECT 
                id, 
                username, 
                password, 
                display_name AS displayName, 
                born_on AS bornOn
            FROM
                users
            WHERE
                username = ?
             ";

        return $this->db->query($query)
            ->execute($username)
            ->fetch(UserDTO::class)
            ->current();
    }

    public function insert(UserDTO $user): bool
    {
        $query = "
            INSERT INTO
              users
            (
              username,
              password,
              display_name,
              born_on
            )
              VALUES
            (
              ?,
              ?,
              ?,
              ?
            );
        ";

        $this->db->query($query)
            ->execute(
                $user->getUsername(),
                $user->getPassword(),
                $user->getDisplayName(),
                $user->getBornOn()
            );

        return true;
    }

    public function findOne(int $id): UserDTO
    {
        $query = "
            SELECT 
                id, 
                username, 
                password, 
                display_name AS displayName, 
                born_on AS bornOn
            FROM
                users
            WHERE
                id = ?
             ";

        return $this->db->query($query)
            ->execute($id)
            ->fetch(UserDTO::class)
            ->current();
    }
}
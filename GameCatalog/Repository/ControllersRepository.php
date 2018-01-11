<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:11 PM
 */

namespace GameCatalog\Repository;


use Database\DatabaseInterface;
use GameCatalog\DTO\ControllersDTO;

class ControllersRepository implements ControllersRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findAll(): \Generator
    {
        $query = "SELECT * FROM controllers ORDER BY name ASC";

        return $this->db->query($query)
            ->execute()
            ->fetch(ControllersDTO::class);
    }

    public function findOne(int $id): ControllersDTO
    {
        $query = "SELECT * FROM controllers WHERE id = ?";

        return $this->db->query($query)
            ->execute($id)
            ->fetch(ControllersDTO::class)
            ->current();
    }

    public function report(): \Generator
    {
        $query = "
           SELECT
                conntrollers.id,
                name,
                COUNT(games.id) AS taskCount
            FROM
                controllers
            INNER JOIN
                games
            ON
                games.controller_id = controllers.id
            GROUP BY
                cotrollers.id
            ORDER BY
                COUNT(tasks.id) DESC,
                categories.name ASC
        ";

        return $this->db->query($query)
            ->execute()
            ->fetch(CategoryDTO::class);
    }
}
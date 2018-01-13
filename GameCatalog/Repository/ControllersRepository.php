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
use GameCatalog\DTO\StatisticDTO;

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
        $query = "SELECT
                controllers.name as controllers,
                COUNT(games.id) AS games,
                TIME_FORMAT(sum(games.playtime), \"%i:%s\") as playtime
            FROM
                controllers
            LEFT JOIN
                games
            ON
               controllers.id = games.controller_id  
            GROUP BY
                controllers.id
                Order by controllers.name              
           
        ";

        return $this->db->query($query)
            ->execute()
            ->fetch(StatisticDTO::class);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 11:59 AM
 */

namespace GameCatalog\Repository;


use Core\DataBinderInterface;
use Database\DatabaseInterface;
use GameCatalog\DTO\ControllersDTO;
use GameCatalog\DTO\GameDTO;
use GameCatalog\DTO\UserDTO;

class GamesRepository implements GamesRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db,
                                DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }


    public function findAll(): \Generator
    {
        $query = "SELECT games.id as games_id, 
                        title, 
                        publisher, 
                        release_date,
                        controllers.name as 'controller_name', 
                        games.last_played, 
                        games.playtime                        
                    FROM games
                    INNER JOIN controllers ON games.controller_id = controllers.id";

        $lazyTasksResult = $this->db->query($query)->execute()->fetch();

        foreach ($lazyTasksResult as $row) {
            /**
             * @var GameDTO $game
             * @var ControllersDTO $controller
             */
            $game = $this->dataBinder->bind($row, GameDTO::class);
            $game->setId($row['games_id']);
            $controller = new ControllersDTO();
            $controller->setName($row['controller_name']);

            $game->setController($controller);

            yield $game;
        }
    }

    public function findOne(int $id): GameDTO
    {
        /**
         * * @var UserDTO $user
         * @var GameDTO $game
         * @var ControllersDTO $controller
         */
        $query = "
           SELECT
                games.id AS games_id,
                title,
                publisher,
                release_date,
                users.id AS user_id,
                users.username AS username,
                users.password AS password,
                users.display_name AS displayName,
                users.born_on AS bornOn,
                controllers.id as controller_id,
                controllers.name as cname,
                last_played,
                playtime
            FROM
                games
            INNER JOIN
                controllers 
            ON games.controller_id = controllers.id
            INNER JOIN
              users
            ON games.user_id = users.id
            WHERE
                games.id = ?
            ";


        $result = $this->db->query($query)->execute($id)->fetch()->current();
        $game = $this->dataBinder->bind($result, GameDTO::class);
        $game->setId($result['games_id']);

        $user = $this->dataBinder->bind($result, UserDTO::class);
        $user->setId($result['user_id']);

        $controller = new ControllersDTO();
        $controller->setId($result['controller_id']);

        $game->setController($controller);
        return $game;
    }

    public function insert(GameDTO $game): bool
    {
        $query = "INSERT INTO games
                  (title, publisher, release_date, controller_id, user_id) 
                  VALUES (?, ?, ?, ?, ?)";

        $this->db->query($query)->execute(
            $game->getTitle(),
            $game->getPublisher(),
            $game->getReleaseDate(),
            $game->getController()->getId(),
            $game->getUser()->getId()
        );

        return true;
    }

    public function update(GameDTO $game, int $id): bool
    {
        $query = "
            UPDATE
              games
            SET
              title = ?,
              publisher = ?,
              release_date = ?,
              controller_id = ?,
              last_played = ?,
              playtime = ?              
            WHERE
              id = ?
        ";

        $this->db->query($query)
            ->execute(
                $game->getTitle(),
                $game->getPublisher(),
                $game->getReleaseDate(),
                $game->getController()->getId(),
                $game->getLastPlayed(),
                $game->getPlayTime(),
                $id
            );

        return true;

    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM games WHERE games.id = ?";
        $this->db->query($query)->execute($id);

        return true;
    }


}


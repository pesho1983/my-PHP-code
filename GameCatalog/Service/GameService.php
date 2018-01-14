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
use GameCatalog\Repository\GamesRepositoryInterface;

class GameService implements GameServiceInterface
{
    /**
     * @var GamesRepositoryInterface
     */
    private $gameRepository;

    /**
     * GameService constructor.
     * @param GamesRepositoryInterface $gameRepository
     */
    public function __construct(GamesRepositoryInterface $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function add(GameDTO $game): bool
    {
        $this->gameRepository->insert($game);
        return true;
    }

    public function edit(GameDTO $game, int $id): bool
    {
        $gameFromDb = $this->gameRepository->findOne($id);

        if (null === $gameFromDb) {
            throw new \Exception("Game does not exist");
        }
        return $this->gameRepository->update($game, $id);
    }

    public function remove(int $id): bool
    {
        $gameFromDb = $this->gameRepository->findOne($id);

        if (null === $gameFromDb) {
            throw new \Exception("Game does not exist");
        }

        return $this->gameRepository->delete($id);
    }

    public function view(int $id): GameDTO
    {
        return $this->gameRepository->findOne($id);
    }

    public function getAll(): \Generator
    {
        return $this->gameRepository->findAll();
    }
}
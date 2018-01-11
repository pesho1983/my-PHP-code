<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/3/2018
 * Time: 12:26 PM
 */

namespace GameCatalog\Service;


use GameCatalog\DTO\ControllersDTO;
use GameCatalog\Repository\ControllersRepositoryInterface;

class ControllersService implements ControllersServiceInterface
{
    /**
     * @var ControllersRepositoryInterface
     */
    private $controllersRepository;

    /**
     * ControllersService constructor.
     * @param ControllersRepositoryInterface $controllersRepository
     */
    public function __construct(ControllersRepositoryInterface $controllersRepository)
    {
        $this->controllersRepository = $controllersRepository;
    }

    /**
     * @return \Generator|ControllersDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->controllersRepository->findAll();
    }

    public function view(int $id): ControllersDTO
    {
        return $this->controllersRepository->findOne($id);
    }

}
<?php

namespace GameCatalog\Http;

use GameCatalog\DTO\EditGameDTO;
use GameCatalog\DTO\EditTaskDTO;
use GameCatalog\DTO\GameDTO;
use GameCatalog\DTO\GameErrorDTO;
use GameCatalog\Service\ControllersServiceInterface;
use GameCatalog\Service\GameServiceInterface;
use GameCatalog\Service\UserServiceInterface;

class GameHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var \GameCatalog\Service\GameServiceInterface
     */
    private $gameService;

    public function __construct(
        \Core\TemplateInterface $template,
        \Core\DataBinderInterface $dataBinder,
        \GameCatalog\Service\GameServiceInterface $gameService
    )
    {
        parent::__construct($template, $dataBinder);
        $this->gameService = $gameService;
    }

    public function all()
    {
        $games = $this->gameService->getAll();
        $this->render('games/all', $games);
    }


    public function add(GameServiceInterface $gameService,
                        ControllersServiceInterface $controllerService,
                        UserServiceInterface $userService,
                        array $formData = [])
    {
        if (!isset($formData['save'])) {
            $categories = $controllerService->getAll();
            $this->render("games/add", $categories);
        } else {

            $this->handleInsertProcess($gameService, $controllerService, $userService, $formData);
        }
    }

    public function edit(GameServiceInterface $gameService,
                         ControllersServiceInterface $controllersService,
                         UserServiceInterface $userService,
                         array $formData = [], array $getData = [])
    {
        if (!isset($formData['save'])) {
            $game = $gameService->view($getData['id']);

            $editDto = new EditGameDTO();
            $editDto->setGame($game);

            $editDto->setControllers($controllersService->getAll());
            $this->render("games/edit", $editDto);
        } else {
            $this->handleEditProcess($gameService, $controllersService, $userService, $formData, $getData);
        }
    }

    public function delete(GameServiceInterface $gameService, array $getData)
    {
        $gameService->remove($getData['id']);
        $this->redirect("games.php");
    }

    public function handleEditProcess(GameServiceInterface $gameService,
                                      ControllersServiceInterface $controllersService,
                                      UserServiceInterface $userService,
                                      array $formData = [], array $getData = [])
    {
        try {
            /** @var GameDTO $game */
            $game = $this->binder->bind($formData, GameDTO::class);

            $controller = $controllersService->view($formData['controller_id']);
            $game->setController($controller);
            $this->gameService->edit($game, $getData['id']);
            $this->redirect('games.php');
        } catch (\Exception $e) {
            $dto = $this->binder($formData, GameDTO::class);
            $this->render("games/edit", $dto, [$e->getMessage()]);
        }
    }

    public function handleInsertProcess(GameServiceInterface $gameService,
                                        ControllersServiceInterface $controllersService,
                                        UserServiceInterface $userService,
                                        array $formData = [])
    {

        try {
            /** @var GameDTO $game */
            $game = $this->binder->bind($formData, GameDTO::class);
            $controller = $controllersService->view($formData['controller_id']);
            $user = $userService->getCurrentUser();
            $game->setUser($user);
            $game->setController($controller);
            $this->gameService->add($game);
            $this->redirect('games.php');
        } catch (\Exception $e) {
            $dto = $this->binder($formData, GameDTO::class);
            $this->render("games/add", $dto, [$e->getMessage()]);
        }
    }

}
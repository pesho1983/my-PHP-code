<?php

namespace GameCatalog\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;
use GameCatalog\DTO\RegisterUserDTO;
use GameCatalog\DTO\UserDTO;
use GameCatalog\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;


    public function __construct(UserServiceInterface $userService,
                                TemplateInterface $template,
                                DataBinderInterface $binder)
    {
        parent::__construct($template, $binder);
        $this->userService = $userService;
    }


    public function login(array $formData = [])
    {
        if (!isset($formData['login'])) {
            $this->render("users/login");
        } else {
            $this->handleLoginProcess($formData);
        }
    }

    public function register(array $formData = [])
    {
        if (!isset($formData['register'])) {
            $this->render("users/register");
        } else {
            $this->handleRegisterProcess($formData);
        }
    }


    public function handleLoginProcess(array $formData = [])
    {
        try {
            $this->userService->login($formData['username'], $formData['password']);
            $this->redirect("games.php");
        } catch (\Exception $e) {
            $user = $this->binder->bind($formData, UserDTO::class);
            $this->render("users/login", $user, [$e->getMessage()]);
        }
    }

    public function handleRegisterProcess(array $formData = [])
    {
        try {
            $user = $this->binder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['username'] = $formData['username'];
            $this->redirect("login.php");
        } catch (\Exception $e) {
            $user = $this->binder->bind($formData, RegisterUserDTO::class);
            $this->render("users/register", $user, [$e->getMessage()]);
        }
    }
}
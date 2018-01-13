<?php
/**
 * Created by PhpStorm.
 * User: Petar Aleksandrov
 * Date: 1/13/2018
 * Time: 5:01 PM
 */

namespace GameCatalog\Http;


class ControllersHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var \GameCatalog\Service\ControllersServiceInterface
     */
    private $controllersService;

    public function __construct(
        \Core\TemplateInterface $template,
        \Core\DataBinderInterface $dataBinder,
        \GameCatalog\Service\ControllersServiceInterface $controllersService
    )
    {
        parent::__construct($template, $dataBinder);
        $this->controllersService = $controllersService;
    }

    public function report()
    {
        $report = $this->controllersService->report();

        $this->render('games/statistics', $report);
    }
}
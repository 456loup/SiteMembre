<?php
namespace controllers;

use services\UsersService;
use yasmf\HttpHelper;
use yasmf\View;

class HomeController {

    private $usersService;

    public function __construct()
    {
        $this->usersService = UsersService::getDefaultUsersService();
    }

    public function index($pdo) {
        $view = new View("views/vueClient");
        $view->setVar('searchStmt', null );
        return $view;
    }
}

?>

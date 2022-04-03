<?php

spl_autoload_extensions(".php");
spl_autoload_register();
session_start(); 

use yasmf\DataSource;
use yasmf\Router;

$dataSource = new DataSource(
    $host = 'localhost',
    $port = '8889', # to change with the port your mySql server listen to
    $db = 'SiteWeb', # to change with your db name
    $user = 'admin', # to change with your db user name
    $pass = 'admin', # to change with your db password
    $charset = 'utf8mb4'
);

$router = new Router() ;
$router->route($dataSource);

?> 

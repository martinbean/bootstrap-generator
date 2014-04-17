<?php
require('../vendor/autoload.php');

$container = new \Pimple();
$container['database'] = function ($c) {
    $dsn = 'mysql:host=localhost;dbname=bs_generator';
    $username = 'root';
    $password = '';
    $driver_options = array(
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    return new \PDO($dsn, $username, $password, $driver_options);
};

$controller = new MCB\Bootstrap\Generator\Controller\ThemesController($container);
$action = 'index';
$parameters = array();

call_user_func_array(array($controller, $action), $parameters);

$view_data = call_user_func(array($controller, 'getViewData'));

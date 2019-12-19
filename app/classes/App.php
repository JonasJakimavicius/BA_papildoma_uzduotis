<?php

namespace App;

use Core\User\Session;
use Core\Database\Connection;
use Core\Database\Schema;
use Core\Router;
use Core\User\Repository;


class App
{

    /** @var \Core\Session * */
    public static $session;
    public static $connection;
    public static $schema;
    public static $router;
    public static $company_repository;

    public function __construct()
    {

        self::$connection = new \Core\Database\Conection(DNS);
        self::$schema = new Schema(MYDB);
        self::$router = new Router();
        self::$company_repository = new \App\Company\Repository();

    }

    public static function run()
    {
        print $controller = self::$router->getRouteController($_SERVER['REQUEST_URI']);

    }


    public function __destruct()
    {

    }

}

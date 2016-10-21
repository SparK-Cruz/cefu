<?php
  session_start();
  require('vendor/autoload.php');

  use elpho\di\DependencyInjector;
  use elpho\mvc\Router;
  use elpho\database\EntityProvider;

  use cefu\db\Connection;

  class Index{
    public static function main($args=array()){
      elpho\mvc\View::addHelper("cefu\helpers\content");


      $di = new DependencyInjector();
      $router = Router::getInstance(__DIR__);

      $router->setDependencyInjector($di);

      self::registerModelProviders($di);
      self::mapRoutes($router);

      $router->serve();
    }

    public static function registerModelProviders(DependencyInjector $di){
      $connection = Connection::get();

      $categoriaProvider = new EntityProvider($connection, "cefu\models\Categoria");
      $contatoProvider = new EntityProvider($connection, "cefu\models\Contato");
      $cursoProvider = new EntityProvider($connection, "cefu\models\Curso");
      $paginaEstaticaProvider = new EntityProvider($connection, "cefu\models\PaginaEstatica");

      $di->registerProvider($categoriaProvider);
      $di->registerProvider($contatoProvider);
      $di->registerProvider($cursoProvider);
      $di->registerProvider($paginaEstaticaProvider);
    }
    public static function mapRoutes(Router $router){
      $router->mapFor("cefu\controllers\Home");
      $router->mapFor("cefu\controllers\Categories");
      $router->mapFor("cefu\controllers\Courses");
    }
  }

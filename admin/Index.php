<?php
  session_start();
  require 'vendor/autoload.php';

  use elpho\mvc\Router;
  use elpho\di\DependencyInjector;
  use elpho\database\EntityProvider;

  use cefu\admin\db\Connection;

  class Index{
    public static function main($args=array()){
      $di = new DependencyInjector();
      self::setupDependencyInjector($di);

      $router = Router::getInstance(__DIR__);
      $router->setDependencyInjector($di);

      $di->inject(new \ReflectionMethod("Index::setupSinglePages"));

      $router->mapFor('cefu\admin\controllers\Home');
      $router->mapFor('cefu\admin\controllers\Categories');
      $router->mapFor('cefu\admin\controllers\Courses');

      $router->serve();
    }

    private static function setupDependencyInjector(DependencyInjector $di){
      $connection = Connection::get();

      $categoriaProvider = new EntityProvider($connection, 'cefu\admin\models\Categoria');
      $contatoProvider = new EntityProvider($connection, 'cefu\admin\models\Contato');
      $cursoProvider = new EntityProvider($connection, 'cefu\admin\models\Curso');
      $paginaEstaticaProvider = new EntityProvider($connection, 'cefu\admin\models\PaginaEstatica');
      $usuarioProvider = new EntityProvider($connection, 'cefu\admin\models\Usuario');

      $di->registerProvider($categoriaProvider);
      $di->registerProvider($contatoProvider);
      $di->registerProvider($cursoProvider);
      $di->registerProvider($paginaEstaticaProvider);
      $di->registerProvider($usuarioProvider);
    }

    public static function setupSinglePages($paginaEstatica, $contato){
      $static = $paginaEstatica;

      self::setupStaticPage($static, "inicio");
      self::setupStaticPage($static, "sobre");
      self::setupStaticPage($static, "contato");

      $contato->findFirst();
      if(!$contato->isAvailable()){
        $contato->reset();
        $contato->email = "";
        $contato->save();
      }
    }
    private static function setupStaticPage($entity, $slug){
      $entity->findBySlug($slug);
      if(!$entity->isAvailable()){
        $entity->reset();
        $entity->slug = $slug;
        $entity->titulo = "";
        $entity->conteudo = "";
        $entity->save();
      }
    }
  }
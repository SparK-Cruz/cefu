<?php
  session_start();
  require("../../../../elpho/startup.php");

  require("../db/Connection.php");

  requireDirOnce("php/io/file");
  requireDirOnce("mvc");
  requireDirOnce("database");
  requireDirOnce("models");

  require("controllers/ApplicationController.php");
  requireDirOnce("controllers");

  class Index{
    public static function main($args=array()){
      $router = Router::getInstance(__DIR__);

      self::setupSinglePages();

      Home::mapRoutes($router);
      Categories::mapRoutes($router);
      Courses::mapRoutes($router);

      $router->serve();
    }

    private static function setupSinglePages(){
      $static = new AdminPaginaEstatica(Connection::get());

      self::setupStaticPage($static, "inicio");
      self::setupStaticPage($static, "sobre");
      self::setupStaticPage($static, "contato");

      $contato = new AdminContato(Connection::get());
      $contato->findFirst();
      if($contato->getCount() == 0){
        $contato->reset();
        $contato->email = "";
        $contato->save();
      }
    }
    private static function setupStaticPage($entity, $slug){
      $entity->findBySlug($slug);
      if($entity->getCount() == 0){
        $entity->reset();
        $entity->slug = $slug;
        $entity->titulo = "";
        $entity->conteudo = "";
        $entity->save();
      }
    }
  }
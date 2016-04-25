<?php
  session_start();
  require("../elpho/startup.php");

  require("db/Connection.php");
  requireDirOnce("mvc");
  requireDirOnce("database");
  requireDirOnce("models");
  requireDirOnce("controllers");

  class Index{
    public static function main($args=array()){
      $router = Router::getInstance(__DIR__);

      Home::mapRoutes($router);
      Categories::mapRoutes($router);
      Courses::mapRoutes($router);

      $router->serve();
    }
  }

  function formatContent(String $string){
    return $string->replace("\r", "")->replace("\n\n", "</p><p>")->replace("\n", "<br/>");
  }
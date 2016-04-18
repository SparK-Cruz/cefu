<?php
  class Home extends Controller{
    public static function mapRoutes($router){
      $router->map(array("", "inicio"), array("Home", "index"));
      $router->map("sobre", array("Home", "about"));
      $router->map("contato", array("Home", "contact"));
      $router->map("contato", array("Home", "sendContactEmail"), "post");
    }

    public static function index($args){
      $view = new View("views/home/index.html.php");
      $view->render();
    }

    public static function about($args){
      $view = new View("views/home/about.html.php");
      $view->render();
    }

    public static function contact($args){
      $view = new View("views/home/contact.html.php");
      $view->render();
    }

    public static function sendContactEmail($args){
      $resposta = new stdClass();
      print(json_encode($resposta));
    }
  }
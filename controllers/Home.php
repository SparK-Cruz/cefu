<?php
  class Home extends Controller{
    public static function mapRoutes($router){
      $router->map(array("", "inicio"), array("Home", "index"));
      $router->map("sobre", array("Home", "about"));
      $router->map("contato", array("Home", "contact"));
      $router->map("contato", array("Home", "sendContactEmail"), "post");
    }

    public static function index($args){
      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("inicio");

      $view = new View("views/home/index.html.php");
      $view->render($model);
    }

    public static function about($args){
      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("sobre");

      $view = new View("views/home/about.html.php");
      $view->render($model);
    }

    public static function contact($args){
      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("contato");

      $view = new View("views/home/contact.html.php");
      $view->render($model);
    }

    public static function sendContactEmail($args){
      require_once("php/io/Email.php");

      $model = new Contato(Connection::get());
      $model->findFirst();

      $email = new Email();
      $email->setDestiny($model->email);
      $email->setOrigin($args->email);
      $email->setSubject("[CEFU] ".$args->subject);
      $email->setMessage("<p><b>".$args->name."</b> disse:</p><p>".strip_tags($args->message)."</p>");

      $resposta = new stdClass();

      try{
        $email->send();
        $resposta->ok = true;
      }catch(Exception $ex){
        $resposta->error = $ex->getMessage();
      }

      exit(json_encode($resposta));
    }
  }
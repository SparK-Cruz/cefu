<?php
  namespace cefu\controllers;

  use elpho\mvc\Controller;
  use elpho\mvc\View;

  use elpho\io\Email;

  class Home extends Controller{
    /**
    * @route()
    * @route("inicio")
    */
    public static function index($args, $paginaEstatica){
      $model = $paginaEstatica;
      $model->findBySlug("inicio");

      $view = new View("src/views/home/index.html.php");
      $view->render($model);
    }

    /**
    * @route(sobre)
    */
    public static function about($args, $paginaEstatica){
      $model = $paginaEstatica;
      $model->findBySlug("sobre");

      $view = new View("src/views/home/about.html.php");
      $view->render($model);
    }

    /**
    * @route(contato)
    */
    public static function contact($args, $paginaEstatica){
      $model = $paginaEstatica;
      $model->findBySlug("contato");

      $view = new View("src/views/home/contact.html.php");
      $view->render($model);
    }

    /**
    * @route(contato, post)
    */
    public static function sendContactEmail($args, $contato){
      $model = $contato;
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
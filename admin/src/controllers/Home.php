<?php
  namespace cefu\admin\controllers;

  use elpho\mvc\View;
  use elpho\io\file\Image;

  class Home extends ApplicationController{
    /**
    * @route()
    */
    public static function index($args){
      self::mustLogin("");

      $view = new View("src/views/home/index.html.php");
      $view->render();
    }

    //Index

    /**
    * @route(inicio)
    */
    public static function editIndex($args, $paginaEstatica){
      self::mustLogin("inicio");

      $model = $paginaEstatica;
      $model->findBySlug("inicio");

      $view = new View("src/views/home/editIndex.html.php");
      $view->render($model);
    }

    /**
    * @route(inicio, post)
    */
    public static function updateIndex($args, $paginaEstatica){
      self::allowMethods("post");
      self::mustLogin("inicio");

      $model = $paginaEstatica;
      $model->findBySlug("inicio");

      $model->titulo = $_POST["titulo"];
      $model->conteudo = $_POST["conteudo"];

      $view = new View("src/views/home/editIndex.html.php");

      try{
        $storage = dirname(dirname(__DIR__))."/img";

        if($_FILES["imagem"]["name"] !== ""){
          $image = new Image($_FILES["imagem"]["tmp_name"]);
          $filename = $_FILES["imagem"]["name"];
          $filename = $storage."/index".substr($filename, strrpos($filename, '.'));

          if(file_exists($filename))
            unlink($filename);

          $image->setName($filename);
          $image->save();

          $model->imagem = $filename;
        }

        $model->save();
        $view->message = "Salvo com sucesso!";
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    //About

    /**
    * @route(sobre)
    */
    public static function editAbout($args, $paginaEstatica){
      self::mustLogin("sobre");

      $model = $paginaEstatica;
      $model->findBySlug("sobre");

      $view = new View("src/views/home/editAbout.html.php");
      $view->render($model);
    }

    /**
    * @route(sobre, post)
    */
    public static function updateAbout($args, $paginaEstatica){
      self::mustLogin("sobre");

      $model = $paginaEstatica;
      $model->findBySlug("sobre");

      $model->titulo = $_POST["titulo"];
      $model->conteudo = $_POST["conteudo"];

      $view = new View("src/views/home/editAbout.html.php");

      try{
        $storage = dirname(dirname(__DIR__))."/img";

        if($_FILES["imagem"]["name"] !== ""){
          $image = new Image($_FILES["imagem"]["tmp_name"]);
          $filename = $_FILES["imagem"]["name"];
          $filename = $storage."/about".substr($filename, strrpos($filename, '.'));

          if(file_exists($filename))
            unlink($filename);

          $image->setName($filename);
          $image->save();

          $model->imagem = $filename;
        }

        $model->save();
        $view->message = "Salvo com sucesso!";
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    //Contact

    /**
    * @route(contato)
    */
    public static function editContact($args, $paginaEstatica, $contato){
      self::mustLogin("contato");

      $model = $paginaEstatica;
      $model->findBySlug("contato");

      $contact = $contato;
      $contact->findFirst();

      $view = new View("src/views/home/editContact.html.php");
      $view->email = $contact->email;
      $view->render($model);
    }

    /**
    * @route(contato, post)
    */
    public static function updateContact($args, $paginaEstatica, $contato){
      self::mustLogin("contato");

      $model = $paginaEstatica;
      $model->findBySlug("contato");

      $contact = $contato;
      $contact->findFirst();

      $view = new View("src/views/home/editContact.html.php");

      $model->titulo = $_POST["titulo"];
      $model->conteudo = $_POST["conteudo"];
      $contact->email = $_POST["email"];

      $view->email = $contact->email;

      try{
        $storage = dirname(dirname(__DIR__))."/img";

        if($_FILES["imagem"]["name"] !== ""){
          $image = new Image($_FILES["imagem"]["tmp_name"]);
          $filename = $_FILES["imagem"]["name"];
          $filename = $storage."/contact".substr($filename, strrpos($filename, '.'));

          if(file_exists($filename))
            unlink($filename);

          $image->setName($filename);
          $image->save();

          $model->imagem = $filename;
        }

        $model->save();
        $contact->save();

        $view->message = "Salvo com sucesso!";
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    //AUTH

    /**
    * @route(entrar)
    */
    public static function login($args, $usuario){
      if(isset($_SESSION["user"]))
        self::redirect("");

      $model = $usuario;
      $model->login = "";
      $model->senha = "";

      $view = new View("src/views/home/login.html.php");
      $view->message = "";
      $view->render($model);
    }

    /**
    * @route(entrar, post)
    */
    public static function authenticate($args, $usuario){
      self::allowMethods("post");

      $model = $usuario;
      $model->login = $args->login;
      $model->senha = "";

      try
      {
        $model->findAuth($args->login, $args->senha);

        $user = new \stdClass();
        $user->login = $model->login;

        $_SESSION["user"] = $user;

        $retorno = "";
        if(isset($_SESSION["retorno"]))
          $retorno = $_SESSION["retorno"];

        self::redirect($retorno);
      }
      catch(Exception $ex){
        $view = new View("src/views/home/login.html.php");
        $view->message = $ex->getMessage();
        $view->render($model);
      }
    }

    /**
    * @route(sair)
    */
    public static function logout($args){
      session_destroy();
      self::redirect("");
    }
  }

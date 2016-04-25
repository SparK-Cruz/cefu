<?php
  class Home extends ApplicationController{
    public static function mapRoutes($router){
      $router->map("", array("Home", "index"));

      //auth
      $router->map("entrar", array("Home", "login"));
      $router->map("entrar", array("Home", "authenticate"), "post");

      $router->map("sair", array("Home", "logout"));

      //read
      $router->map("inicio", array("Home", "editIndex"));
      $router->map("sobre", array("Home", "editAbout"));
      $router->map("contato", array("Home", "editContact"));

      //write
      $router->map("inicio", array("Home", "updateIndex"), "post");
      $router->map("sobre", array("Home", "updateAbout"), "post");
      $router->map("contato", array("Home", "updateContact"), "post");
    }

    public static function index($args){
      self::mustLogin("");

      $view = new View("views/home/index.html.php");
      $view->render();
    }

    //Index
    public static function editIndex($args){
      self::mustLogin("inicio");

      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("inicio");

      $view = new View("views/home/editIndex.html.php");
      $view->render($model);
    }
    public static function updateIndex($args){
      self::allowMethods("post");
      self::mustLogin("inicio");

      $model = new AdminPaginaEstatica(Connection::get());
      $model->findBySlug("inicio");

      $model->titulo = $_POST["titulo"];
      $model->conteudo = $_POST["conteudo"];

      $view = new View("views/home/editIndex.html.php");

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
    public static function editAbout($args){
      self::mustLogin("sobre");

      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("sobre");

      $view = new View("views/home/editAbout.html.php");
      $view->render($model);
    }
    public static function updateAbout($args){
      self::mustLogin("sobre");

      $model = new AdminPaginaEstatica(Connection::get());
      $model->findBySlug("sobre");

      $model->titulo = $_POST["titulo"];
      $model->conteudo = $_POST["conteudo"];

      $view = new View("views/home/editAbout.html.php");

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
    public static function editContact($args){
      self::mustLogin("contato");

      $model = new PaginaEstatica(Connection::get());
      $model->findBySlug("contato");

      $contact = new Contato(Connection::get());
      $contact->findFirst();

      $view = new View("views/home/editContact.html.php");
      $view->email = $contact->email;
      $view->render($model);
    }
    public static function updateContact($args){
      self::mustLogin("contato");

      $model = new AdminPaginaEstatica(Connection::get());
      $model->findBySlug("contato");

      $contact = new AdminContato(Connection::get());
      $contact->findFirst();

      $view = new View("views/home/editContact.html.php");

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
    public static function login($args){
      if(isset($_SESSION["user"]))
        self::redirect("");

      $model = new AdminUsuario(Connection::get());
      $model->login = "";
      $model->senha = "";

      $view = new View("views/home/login.html.php");
      $view->message = "";
      $view->render($model);
    }
    public static function authenticate($args){
      self::allowMethods("post");

      $model = new AdminUsuario(Connection::get());
      $model->login = $args->login;
      $model->senha = "";

      try
      {
        $model->findAuth($args->login, $args->senha);

        $user = new stdClass();
        $user->login = $model->login;

        $_SESSION["user"] = $user;

        $retorno = "";
        if(isset($_SESSION["retorno"]))
          $retorno = $_SESSION["retorno"];

        self::redirect($retorno);
      }
      catch(Exception $ex){
        $view = new View("views/home/login.html.php");
        $view->message = $ex->getMessage();
        $view->render($model);
      }
    }

    public static function logout($args){
      session_destroy();
      self::redirect("");
    }
  }

<?php
  class Categories extends ApplicationController{
    public static function mapRoutes($router){
      $router->map("categorias", array("Categories", "index"));

      $router->map("categorias/nova", array("Categories", "form"));
      $router->map("categorias/nova", array("Categories", "save"), "post");

      $router->map("categorias/#id", array("Categories", "form"));
      $router->map("categorias/#id", array("Categories", "save"), "post");

      $router->map("categorias/#id/delete", array("Categories", "delete"), "post");
    }

    public static function index($args){
      self::mustLogin("categorias");

      $model = new Categoria(Connection::get());
      $model->find(array("order" => "nome ASC"));

      $view = new View("views/categories/index.html.php");
      $view->render($model);
    }

    public static function form($args){
      self::mustLogin("categorias/".($args->id?$args->id:"nova"));

      $model = new Categoria(Connection::get());

      if($args->id)
        $model->findId($args->id);

      $view = new View("views/categories/form.html.php");
      $view->message = "";
      $view->render($model);
    }

    public static function save($args){
      self::mustLogin("categorias/".($args->id?$args->id:"nova"));

      $model = new AdminCategoria(Connection::get());

      if($args->id)
        $model->findId($args->id);

      $model->nome = $args->nome;
      $model->descricao = $args->descricao;
      $model->slug = $args->slug;

      $view = new View("views/categories/form.html.php");

      try{
        $model->save();
        self::redirect("categorias");
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    public static function delete($args){
      self::mustLogin("categorias");

      if(!$args->id)
        self::notFound();

      $model = new AdminCategoria(Connection::get());
      $model->findId($args->id);
      $model->delete();

      self::redirect("categorias");
    }
  }
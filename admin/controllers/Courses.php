<?php
  class Courses extends ApplicationController{
    public static function mapRoutes($router){
      $router->map("cursos", array("Courses", "index"));

      $router->map("cursos/novo", array("Courses", "form"));
      $router->map("cursos/novo", array("Courses", "save"), "post");

      $router->map("cursos/#id", array("Courses", "form"));
      $router->map("cursos/#id", array("Courses", "save"), "post");

      $router->map("cursos/#id/delete", array("Courses", "delete"), "post");
    }

    public static function index($args){
      self::mustLogin("cursos");

      $model = new Curso(Connection::get());
      $model->find();

      $view = new View("views/courses/index.html.php");
      $view->render($model);
    }

    public static function form($args){
      self::mustLogin("cursos/".($args->id?$args->id:"novo"));

      $model = new Curso(Connection::get());

      $categorias = new Categoria(Connection::get());
      $categorias->find();

      if($args->id)
        $model->findId($args->id);

      $view = new View("views/courses/form.html.php");
      $view->message = "";
      $view->categorias = $categorias;
      $view->render($model);
    }
    public static function save($args){
      self::mustLogin("cursos/".($args->id?$args->id:"novo"));

      $model = new AdminCurso(Connection::get());

      $categorias = new Categoria(Connection::get());
      $categorias->find();

      if($args->id)
        $model->findId($args->id);

      $model->nome = $args->nome;
      $model->descricao = $args->descricao;
      $model->slug = $args->slug;
      $model->categoria_id = $args->categoria_id;

      $view = new View("views/courses/form.html.php");

      try{
        $model->save();
        self::redirect("cursos");
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    public static function delete($args){
      self::mustLogin("cursos");

      if(!$args->id)
        self::notFound();

      $model = new AdminCurso(Connection::get());
      $model->find($args->id);
      $model->delete();

      self::redirect("cursos");
    }
  }
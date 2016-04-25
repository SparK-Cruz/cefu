<?php
  class Courses extends Controller{
    public static function mapRoutes($router){
      $router->map("cursos", array("Courses", "index"));
      $router->map("categorias/*cat_slug/cursos/*slug", array("Courses", "show"));
      $router->map("cursos/*slug", array("Courses", "show"));
    }

    public static function index($args){
      $model = new Curso(Connection::get());
      $model->find(array(
        "order" => "nome ASC"
      ));

      $view = new View("views/courses/index.html.php");
      $view->render($model);
    }

    public static function show($args){
      $model = new Curso(Connection::get());
      $model->findBySlug($args->slug);

      $categoria = new Categoria(Connection::get());
      $categoria->findId($model->categoria_id);

      $view = new View("views/courses/show.html.php");
      $view->categoria = $categoria;
      $view->render($model);
    }
  }

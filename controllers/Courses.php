<?php
  class Courses extends Controller{
    public static function mapRoutes($router){
      $router->map("cursos", array("Courses", "index"));
      $router->map("categorias/*cat_slug/cursos/*slug", array("Courses", "show"));
    }

    public static function index($args){
      $model = new Curso(Connection::get());
      $model->find();

      $view = new View("views/courses/index.html.php");
      $view->model = $model;
      $view->render();
    }

    public static function show($args){
      $model = new Curso(Connection::get());
      $model->findBySlug($args->slug);

      $categoria = new Categoria(Connection::get());
      $categoria->findBySlug($args->cat_slug);

      $view = new View("views/courses/show.html.php");
      $view->categoria = $categoria;
      $view->model = $model;
      $view->render();
    }
  }

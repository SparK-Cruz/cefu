<?php
  class Categories extends Controller{
    public static function mapRoutes($router){
      $router->map("categorias", array("Categories", "index"));
      $router->map("categorias/#id", array("Categories", "show"));
    }

    public static function index($args){
      $categorias = new Categoria(Connection::get());
      $categorias->find();

      $view = new View("views/categories/index.html.php");
      $view->model = $categorias;
      $view->render();
    }

    public static function show($args){
      $categoria = new Categoria(Connection::get());
      $categoria->findId($args->id);

      $cursos = new Curso(Connection::get());
      $cursos->findByCategoria($args->id);

      $view = new View("views/categories/show.html.php");
      $view->model = $categoria;
      $view->cursos = $cursos;
      $view->render();
    }
  }
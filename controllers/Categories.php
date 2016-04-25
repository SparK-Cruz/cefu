<?php
  class Categories extends Controller{
    public static function mapRoutes($router){
      $router->map("categorias", array("Categories", "index"));
      $router->map("categorias/*slug", array("Categories", "show"));
    }

    public static function index($args){
      $categorias = new Categoria(Connection::get());
      $categorias->find(array(
        "order" => "nome ASC"
      ));

      $view = new View("views/categories/index.html.php");
      $view->render($categorias);
    }

    public static function show($args){
      $categoria = new Categoria(Connection::get());
      $categoria->findBySlug($args->slug);

      $cursos = new Curso(Connection::get());
      $cursos->findByCategoria($categoria->id);

      $view = new View("views/categories/show.html.php");
      $view->cursos = $cursos;
      $view->render($categoria);
    }
  }
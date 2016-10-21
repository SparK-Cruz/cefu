<?php
  namespace cefu\controllers;

  use elpho\mvc\Controller;
  use elpho\mvc\View;

  class Categories extends Controller{
    /**
    * @route(categorias)
    */
    public static function index($args, $categoria){
      $categorias = $categoria;
      $categorias->find(array(
        "order" => "nome ASC"
      ));

      $view = new View("src/views/categories/index.html.php");
      $view->render($categorias);
    }

    /**
    * @route(categorias/*slug)
    */
    public static function show($args, $categoria, $curso){
      $categoria->findBySlug($args->slug);

      $cursos = $curso;
      $cursos->findByCategoria($categoria->id);

      $view = new View("src/views/categories/show.html.php");
      $view->cursos = $cursos;
      $view->render($categoria);
    }
  }
<?php
  namespace cefu\controllers;

  use elpho\mvc\Controller;
  use elpho\mvc\View;

  class Courses extends Controller{
    /**
    * @route(cursos)
    */
    public static function index($args, $curso){
      $model = $curso;
      $model->find(array(
        "order" => "nome ASC"
      ));

      $view = new View("src/views/courses/index.html.php");
      $view->render($model);
    }

    /**
    * @route(categorias/*cat_slug/cursos/*slug)
    * @route(cursos/*slug)
    */
    public static function show($args, $curso){
      $model = $curso;
      $model->findBySlug($args->slug);

      $categoria = $model->getCategoria();

      $view = new View("src/views/courses/show.html.php");
      $view->categoria = $categoria;
      $view->render($model);
    }
  }

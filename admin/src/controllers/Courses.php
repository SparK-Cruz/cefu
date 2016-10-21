<?php
  namespace cefu\admin\controllers;

  use elpho\mvc\View;

  class Courses extends ApplicationController{
    /**
    * @route(cursos)
    */
    public static function index($args, $curso){
      self::mustLogin("cursos");

      $model = $curso;
      $model->find();

      $view = new View("src/views/courses/index.html.php");
      $view->render($model);
    }

    /**
    * @route(cursos/novo)
    * @route(cursos/#id)
    */
    public static function form($args, $curso, $categoria){
      self::mustLogin("cursos/".($args->id?$args->id:"novo"));

      $model = $curso;

      $categorias = $categoria;
      $categorias->find();

      if($args->id)
        $model->findId($args->id);

      $view = new View("src/views/courses/form.html.php");
      $view->message = "";
      $view->categorias = $categorias;
      $view->render($model);
    }

    /**
    * @route(cursos/novo, post)
    * @route(cursos/#id, post)
    */
    public static function save($args, $curso, $categoria){
      self::mustLogin("cursos/".($args->id?$args->id:"novo"));

      $model = $curso;

      $categorias = $categoria;
      $categorias->find();

      if($args->id)
        $model->findId($args->id);

      $model->nome = $args->nome;
      $model->descricao = $args->descricao;
      $model->slug = $args->slug;
      $model->categoria_id = $args->categoria_id;

      $view = new View("src/views/courses/form.html.php");

      try{
        $model->save();
        self::redirect("cursos");
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    /**
    * @route(cursos/#id/delete, post)
    */
    public static function delete($args, $curso){
      self::mustLogin("cursos");

      if(!$args->id)
        self::notFound();

      $model = $curso;
      $model->findId($args->id);
      $model->delete();

      self::redirect("cursos");
    }
  }
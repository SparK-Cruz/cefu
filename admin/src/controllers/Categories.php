<?php
  namespace cefu\admin\controllers;

  use elpho\mvc\View;

  class Categories extends ApplicationController{
    /**
    * @route(categorias)
    */
    public static function index($args, $categoria){
      self::mustLogin("categorias");

      $model = $categoria;
      $model->find(array("order" => "nome ASC"));

      $view = new View("src/views/categories/index.html.php");
      $view->render($model);
    }

    /**
    * @route(categorias/nova)
    * @route(categorias/#id)
    */
    public static function form($args, $categoria){
      self::mustLogin("categorias/".($args->id?$args->id:"nova"));

      $model = $categoria;

      if($args->id)
        $model->findId($args->id);

      $view = new View("src/views/categories/form.html.php");
      $view->message = "";
      $view->render($model);
    }

    /**
    * @route(categorias/nova, post)
    * @route(categorias/#id, post)
    */
    public static function save($args, $categoria){
      self::mustLogin("categorias/".($args->id?$args->id:"nova"));

      $model = $categoria;

      if($args->id)
        $model->findId($args->id);

      $model->nome = $args->nome;
      $model->descricao = $args->descricao;
      $model->slug = $args->slug;

      $view = new View("src/views/categories/form.html.php");

      try{
        $model->save();
        self::redirect("categorias");
      }catch(Exception $ex){
        $view->message = $ex->getMessage();
      }

      $view->render($model);
    }

    /**
    * @route(categorias/#id/delete, post)
    */
    public static function delete($args, $categoria){
      self::mustLogin("categorias");

      if(!$args->id)
        self::notFound();

      $model = $categoria;
      $model->findId($args->id);
      $model->delete();

      self::redirect("categorias");
    }
  }
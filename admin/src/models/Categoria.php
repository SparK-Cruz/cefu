<?php
  namespace cefu\admin\models;

  use elpho\database\Entity;

  class Categoria extends Entity{
    public function __construct(\PDO $connection=null){
      $this->setTable("categorias");
      $this->setFieldList("nome", "descricao", "slug");
      $this->setWritable(true);

      parent::__construct($connection);
    }

    public function findBySlug($slug){
      $this->find(array(
        "where" => "slug = :slug",
        "slug" => $slug
      ));

      $this->first();
    }
  }
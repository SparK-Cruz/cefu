<?php
  namespace cefu\admin\models;

  use elpho\database\Entity;

  class PaginaEstatica extends Entity{
    public function __construct(\PDO $connection=null){
      $this->setTable("paginas_estaticas");
      $this->setFieldList("slug", "titulo", "conteudo", "imagem");
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
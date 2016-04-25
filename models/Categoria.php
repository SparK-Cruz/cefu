<?php
  class Categoria extends Entity{
    public function Categoria(PDO $connection=null){
      $this->setTable("categorias");
      $this->setFieldList("nome", "descricao", "slug");

      parent::Entity($connection);
    }

    public function findBySlug($slug){
      $this->find(array(
        "where" => "slug = :slug",
        "slug" => $slug
      ));

      $this->first();
    }
  }
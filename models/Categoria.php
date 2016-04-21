<?php
  class Categoria extends Entity{
    public function Categoria(PDO $connection=null){
      $this->setTable("categorias");
      $this->setFieldList("nome", "descricao", "slug");

      parent::Entity($connection);
    }

    public function findBySlug($slug){
      $success = $this->find(array(
        "where" => "slug = :slug",
        "slug" => $slug
      ));

      if($success)
        $this->first();

      return $success;
    }
  }
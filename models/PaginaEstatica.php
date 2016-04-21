<?php
  class PaginaEstatica extends Entity{
    public function PaginaEstatica(PDO $connection=null){
      $this->setTable("paginas_estaticas");
      $this->setFieldList("slug", "titulo", "conteudo", "imagem");

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
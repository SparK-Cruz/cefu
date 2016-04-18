<?php
  class Categoria extends Entity{
    public function Categoria(PDO $connection=null){
      $this->setTable("categorias");
      $this->setFieldList("nome", "descricao");

      parent::Entity($connection);
    }
  }
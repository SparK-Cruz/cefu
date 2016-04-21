<?php
  class Curso extends Entity{
    public function Curso(PDO $connection=null){
      $this->setTable("cursos");
      $this->setFieldList("categoria_id", "nome", "descricao", "horas", "coordenador", "slug");

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

    public function findByCategoria($categoriaId){
      return $this->find(array(
        "where" => "categoria_id = :catid",
        "catid" => $categoriaId
      ));
    }
  }

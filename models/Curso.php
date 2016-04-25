<?php
  class Curso extends Entity{
    public function Curso(PDO $connection=null){
      $this->setTable("cursos");
      $this->setFieldList("categoria_id", "nome", "descricao", "horas", "coordenador", "slug");

      parent::Entity($connection);
    }

    public function findBySlug($slug){
      $this->find(array(
        "where" => "slug = :slug",
        "slug" => $slug
      ));

      $this->first();
    }

    public function findByCategoria($categoriaId){
      return $this->find(array(
        "where" => "categoria_id = :catid",
        "order" => "nome ASC",
        "catid" => $categoriaId
      ));
    }

    public function getCategoria(){
      $categoria = new Categoria($this->connection);
      $categoria->findId($this->categoria_id);
      return $categoria;
    }
  }

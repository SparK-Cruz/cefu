<?php
  class Curso extends Entity{
    public function Curso(PDO $connection=null){
      $this->setTable("cursos");
      $this->setFieldList("categoria_id", "nome", "descricao", "horas", "coordenador");

      parent::Entity($connection);
    }

    public function findByCategoria($categoriaId){
      return $this->find(array(
        "where" => "categoria_id = :catid",
        "catid" => $categoriaId
      ));
    }
  }

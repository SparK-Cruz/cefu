<?php
  class Contato extends Entity{
    public function Contato(PDO $connection=null){
      $this->setTable("contato");
      $this->setFieldList("email");

      parent::Entity($connection);
    }

    public function findFirst(){
      $this->find(array("limit" => 1));
      $this->first();
    }
  }
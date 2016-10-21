<?php
  namespace cefu\admin\models;

  use elpho\database\Entity;

  class Contato extends Entity{
    public function __construct(\PDO $connection=null){
      $this->setTable("contato");
      $this->setFieldList("email");
      $this->setWritable(true);

      parent::__construct($connection);
    }

    public function findFirst(){
      $this->find(array("limit" => 1));
      $this->first();
    }
  }
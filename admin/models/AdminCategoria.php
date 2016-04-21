<?php
  require_once("../models/Categoria.php");
  class AdminCategoria extends Categoria{
    public function AdminCategoria(PDO $connection=null){
      $this->setWritable(true);
      parent::Categoria($connection);
    }
  }
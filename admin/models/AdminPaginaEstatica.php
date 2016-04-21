<?php
  require_once("../models/PaginaEstatica.php");
  class AdminPaginaEstatica extends PaginaEstatica{
    public function AdminPaginaEstatica(PDO $connection=null){
      $this->setWritable(true);
      parent::PaginaEstatica($connection);
    }
  }
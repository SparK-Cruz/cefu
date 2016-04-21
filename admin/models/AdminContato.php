<?php
  require_once("../models/Contato.php");
  class AdminContato extends Contato{
    public function AdminContato(PDO $connection=null){
      $this->setWritable(true);
      parent::Contato($connection);
    }
  }
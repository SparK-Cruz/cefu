<?php
  require_once("../models/Curso.php");
  class AdminCurso extends Curso{
    public function AdminCurso(PDO $connection=null){
      $this->setWritable(true);
      parent::Curso($connection);
    }
  }

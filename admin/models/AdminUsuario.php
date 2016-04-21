<?php
  class AdminUsuario extends Entity{
    const INVALID_AUTH = "Usuário e/ou senha incorretos.";

    public function AdminUsuario(PDO $connection=null){
      $this->setTable("usuarios");
      $this->setFieldList("login", "senha");

      parent::Entity($connection);
    }

    public function findAuth($login, $senha){
      $loginReverso = new String($login);
      $loginReverso = $loginReverso->split("")->reverse()->join();
      $hash = sha1($loginReverso.$senha);

      $this->find(array(
        "where" => "login = :login",
        "login" => $login
      ));

      if($this->getCount() == 0)
        throw new Exception(self::INVALID_AUTH);

      $this->first();

      if(!$this->senha == $hash){
        $this->reset();
        throw new Exception(self::INVALID_AUTH);
      }
    }
  }
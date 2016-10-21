<?php
  namespace cefu\admin\controllers;

  use elpho\mvc\Controller;

  abstract class ApplicationController extends Controller{
    public static function mustLogin($retorno){
      if(!isset($_SESSION["user"]) || $_SESSION["user"] == null){
        $_SESSION["retorno"] = $retorno;
        self::redirect("entrar");
        exit();
      }
    }
  }
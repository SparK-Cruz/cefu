<?php
  namespace cefu\helpers;

  use elpho\lang\String;

  class ContentHelper{
    public static function format(String $text){
      return $text
        ->replace("\r", "") //get rid of crlf
        ->replace("\n\n", "</p><p>") //empty line = paragraph separator
        ->replace("\n", "<br/>"); //line break = line break
    }
  }
<?php
  namespace cefu\admin\db;

  class Connection{
    private static $connection = null;

    public static function get(){
      if(self::$connection === null)
        self::$connection = new \PDO("mysql:host=127.0.0.1;dbname=cefu", "root", "");

      return self::$connection;
    }
  }

<?php
class DB
{

  protected function connect(){
    $conn = "";
    try{
      $DB_USER = "root";
      $DB_PASSWORD = "1234";
      $DB_NAME = "twilightseacanoe_twilldbs";
      $DB_HOST = "localhost";
      $conn = new PDO('mysqli:host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASSWORD);
    }catch(PDOException $e){

      print"<pre>Error : ".$e->getMessage()."</pre>";
      die();
    }

    return $conn;
  }

}

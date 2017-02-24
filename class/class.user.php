<?php

  require_once('class.db.php');
  $db = new Db();

  class User
  {
    public $id;
    public $email;
    public $password;
    public $name;
    public $activate;
    public $random;

    /**
     * Wysyła do bazy zapytanie sql
     * @param  string $sql [zapytanie w języku SQL]
     * @return [obiekt mysqli_result]
     */
    public static function find_by_sql($sql="")
    {
      global $db;

      $result = $db->queryDb($sql);
      return $result;
    }

    /**
     * Szuka w bazie użytkownika o podanym id
     * @param  integer $id [id użytkownika]
     * @return object      [zwraca obiekt z polami jak nazwy kolumn w tabeli users]
     */
    public static function find_by_id($id=0)
    {
      $result = self::find_by_sql("SELECT * FROM users WHERE id='{$id}' LIMIT 1");
      $found = $result->fetch_object();
      return $found;
    }

  }

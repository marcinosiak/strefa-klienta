<?php

  require_once('class.db.php');
  $db = new Db();

  class User
  {
    private $id;
    private $email;
    private $password;
    private $name;
    private $activate;
    private $random;

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

    /**
     * Sprawdza czy istnieje użytkownik o podanym emailu i haśle
     * Sprawdza też czy email i hasło są poprawnie podane w formularzu logowania
     *
     * @param  string $username [description]
     * @param  string $password [description]
     * @return object      [zwraca obiekt z polami jak nazwy kolumn w tabeli users]
     * @return false      [jeśli dane do logowania się nie zgadzają]
     */
    public static function authenticate($username="", $password="")
    {
      global $db;

      $username = $db->escape_value($username);
      $password = $db->escape_value($password);

      $result = self::find_by_sql("SELECT * FROM users WHERE email='{$username}' AND password='{$password}' LIMIT 1");

      return !empty($result) ? $result->fetch_object() : false;
    }

  }

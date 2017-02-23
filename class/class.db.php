<?php

	class Db {

		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $dbname = 'adresy-url';

		private $mysqli;

		public function __construct(){
			$this->open_connection();
		}

		public function open_connection()
		{
			try {
				$this->mysqli = new MySQLi($this->host, $this->user, $this->password, $this->dbname);

				if($this->mysqli->connect_error) {
					throw new Exception("Nawiązanie połączenia z bazą danych zakończyło się niepowodzeniem, komunikat błędu:<br>".mysqli_connect_error());
				}
				else {
					$this->mysqli->set_charset("utf8");
				}
			}
			catch (Exception $e){
				print_r($e->getMessage());
			}
		}

		public function getMysqli() {
			return $this->mysqli;
		}

		private function confirm_querry($result)
		{
			if(!$result){
				die("Błąd wykonania zapytania do bazy danych");
			}
		}

		public function queryDb($query)
		{
			$result = $this->mysqli->query($query);
			$this->confirm_querry($result);
			return $result;
		}

		public function escape_value($string)
		{
			$escaped_string = $this->mysqli->real_escape_string($string);
			return $escaped_string;
		}

	}

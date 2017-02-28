<?php
	$db = new Db();

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

		/**
		 * Sprawdza czy wykonało się zapytanie do bazy danych
		 * @param  [type] $result [description]
		 * @return [type]         [description]
		 */
		private function confirm_querry($result)
		{
			if(!$result){
				die("Błąd wykonania zapytania do bazy danych");
			}
		}

		/**
		 * Wykonuje zapytanie do bazy danych
		 * @param  string $query [zapytanie w języku SQL]
		 * @return [obiekt mysqli_result]
		 * Zwraca FALSE w przypadku porażki.
		 * Dla powodzenia SELECT, SHOW, DESCRIBE zwróci obiekt mysqli_result.
		 * Dla innych udanych zapytań mysqli_query () zwróci TRUE.
		 */
		public function queryDb($query)
		{
			$result = $this->mysqli->query($query);
			$this->confirm_querry($result);
			return $result;
		}


		/**
		 * Dodaje znaki unikowe w łańcuchu znaków do użycia w instrukcji SQL
		 *
		 * wywołuje funkcję biblioteki MySQL mysql_real_escape_string, która dodaje lewe ukośniki (backslash)
		 * do następujących znaków: \x00, \n, \r, \, ', " and \x1a.
		 * Użycie tej funkcji jest wymagane zawsze (poza kilkoma wyjątkami) przed wysłaniem
		 * zapytania do bazy danych aby zabezpieczyć dane.
		 *
		 * @param  string $string
		 * @return string
		 */
		public function escape_value($string)
		{
			$escaped_string = $this->mysqli->real_escape_string($string);
			return $escaped_string;
		}

		public function fetch_array($result_set) {
			return mysql_fetch_array($result_set);
		}

	}

<?php

	class Db {

		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $dbname = 'adresy-url';

		private $mysqli;


		public function connectDb()
		{
			try{

				$this->mysqli = new MySQLi($this->host, $this->user, $this->password, $this->dbname);

				if(mysqli_connect_error()){

					throw new Exception("Nawiązanie połączenia zakończyło się niepowodzeniem, komunikat błędu:".mysqli_connect_error());

				}
				else{

					$this->mysqli->set_charset("utf8");
				}
			}

			catch (Exception $e){
				print_r($e->getMessage());
			}
		}


		public function getMysqli()
		{
			return $this->mysqli;
		}


		public function queryDb($query)
		{
			$result = $this->mysqli->query($query);

			return $result;
		}


	}

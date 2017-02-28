<?php
	$adres = new Adres();

	class Adres {

		private $url; 		//pełny adres url, np. http://www.wikipedia.com/wiki/URL
		private $host;		//adres hosta, np. http://www.wikipedia.com
		private $strona;	//ścieżka dostępu do zasobu , np. /wiki/URL
		private $katalog = "/strefa-klienta/";  //jeśli adres url jest w postaci np. http://www.wikipedia.com/wiki/index.php - to /wiki/ jest katalogiem

		/**
		 * konstruktor ustwia hosta i nazwę strony do wyświetlenia, ktora została wpisana w pasku pzeglądarki
		 */
		public function __construct()
		{
			$this->host = $_SERVER['HTTP_HOST'];
			$this->strona = $_SERVER['REQUEST_URI'];
			$this->url = $this->host . $this->strona;
		}


		/**
		 * @return $url
		 */
		public function getUrl()
		{
		    return $this->url;
		}


		/**
		 * @param type $url
		 * @return $this
		 */
		public function setUrl($url)
		{
		    $this->url = $url;
		    return $this;
		}

		/**
		 * zwraca nazwę hosta w postaci np. http://annaosiak.pl
		 * @return $host
		 */
		public function getHost()
		{
			return "http://" . $this->host;
		}


		/**
		 * zwraca nazwę hosta w postaci np. http://annaosiak.pl/przykladowa-strona-do-wyswietlenia
		 * @return $strona
		 */
		public function getStrona()
		{
			return $this->strona;
		}

		/**
		 * @return $katalog
		 */
		public function getKatalog()
		{
			return $this->katalog;
		}

		/**
		 * zwraca adres w postaci np. http://annaosiak.pl/domeny/
		 * adres hosta i katalog
		 * @return $host-katalog
		 */
		public function getHostKatalog()
		{
			return "http://" . $this->host . $this->katalog;
		}


	}

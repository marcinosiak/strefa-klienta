<?php 

	class Folder{

		private $path = "photo/";
		private $files = array(); //tablica z plikami z odczytanego katalogu
		private $d; //instancja klady dir (Directory)

		public function __construct($path)
		{
			$this->path = $this->path . $path;

			//dir - klasa wbudowana w PHP
			$this->d = dir($this->path);

			$this->read();
		}


		public function read()
		{
			while (false !== ($entry = $this->d->read()))
			{
				if($entry != "." && $entry != "..")
				{
					array_push($this->files, $entry);
				}
			}
			//print_r($this->files);
		}


		public function getPath()
		{
			return $this->path . "/";
		}


		public function getFiles()
		{
			return $this->files;
		}
		

		public function __destruct()
		{
			$this->d->close();
		}


	}
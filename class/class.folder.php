<?php

	class Folder{

		private $path = "photo/";
		private $files = array(); //tablica z plikami z odczytanego katalogu
		private $d; //instancja klady dir (Directory)
		private $is_folder = false;

		public function __construct($path)
		{
			$this->path = $this->path . $path;

			if(is_dir($this->path))
			{
			//dir - klasa wbudowana w PHP
				$this->d = dir($this->path);
				$this->read();
				$this->is_folder = true;
			}
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
			sort($this->files);
		}


		public function getPath()
		{
			return $this->path . "/";
		}


		public function getFiles()
		{
			return $this->files;
		}

		public function get_is_folder()
		{
			return $this->is_folder;
		}

		public function __destruct()
		{
			if(is_object($this->d))
			{
				$this->d->close();
			}
		}


	}

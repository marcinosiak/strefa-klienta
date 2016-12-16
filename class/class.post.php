<?php 
	
	class Post {

		private $postId;
		private $urlText;
		private $title;
		private $content;
		private $folder;
		private $date;

		public function getPostId()
		{
			return $this->postId;
		}

		public function setPostId($postId)
		{
			$this->postId = $postId;
		}

		public function getUrlText()
		{
			return $this->urlText;
		}

		public function setUrlText($url)
		{
			$this->urlText = $url;
		}

		public function clearUrl($url, $katalog)
		{
			return str_replace($katalog, "", $url);
		}

		public function getTitle()
		{
			return $this->title;
		}

		public function setTitle($title)
		{
			$this->title = $title;
		}

		public function getContent()
		{
			return $this->content;
		}

		public function setContent($content)
		{
			$this->content = $content;
		}

		public function getFolder()
		{
			return $this->folder;
		}

		public function setFolder($folder)
		{
			$this->folder = $folder;
		}

		public function plCharset($string) {
			
			
			$polskie = array(',', ' - ',' ','ę', 'Ę', 'ó', 'Ó', 'Ą', 'ą', 'Ś', 's', 'ł', 'Ł', 'ż', 'Ż', 'Ź', 'ź', 'ć', 'Ć', 'ń', 'Ń','-',"'","/","?", '"', ":", 'ś', '!','.', '&', '&amp;', '#', ';', '[',']','domena.pl', '(', ')', '`', '%', '”', '„', '…');
			$miedzyn = array('-', '-',  '-','e', 'e', 'o', 'o', 'a', 'a', 's', 's', 'l', 'l', 'z', 'z', 'z', 'z', 'c', 'c', 'n', 'n','-',"","","","","",'s','','', '', '', '', '', '', '', '', '', '', '', '', '');

			//$polskie = array('ę', 'ó', 'ą', 'ś', 'ł', 'ż', 'ź', 'ć', 'ń', ' ');
			//$miedzyn = array('e', 'o', 'a', 's', 'l', 'z', 'z', 'c', 'n', '-');

			$string = str_replace($polskie, $miedzyn, $string);
			
			// usuń wszytko co jest niedozwolonym znakiem
			$string = preg_replace('/[^0-9a-zA-Z\-]+/', '', $string);
			
			// zredukuj liczbę myślników do jednego obok siebie
			$string = preg_replace('/[\-]+/', '-', $string);
			
			// usuwamy możliwe myślniki na początku i końcu
			$string = trim($string, '-');

			$string = stripslashes($string);
			
			//wszystko małymi
			$string = strtolower($string);

			// na wszelki wypadek
			$string = urlencode($string);
			
			return $string;
		}

	}

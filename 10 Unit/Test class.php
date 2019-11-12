<?php
	class Test {
		//muutujad ehk properties
		private $privateNumber;
		public $publicNumber;

		//funktsioonid ehk methods
		//constructor on funktsioon, mis käivitub üks kord klassi kasutusele võtmisel.
		function __construct(){
			$this->privateNumber = 72;
			$this->publicNumber = 10;
			echo "Salajase ja avaliku arvu korrutis on: " .$this->privateNumber * $this->publicNumber;
			$this->tellSecret();
		}

		private function tellSecret(){
			echo "Salajane number: " .$this->privateNumber;
		}

		public function tellPublicSecret(){
			echo "Salajane number tõesti: " .$this->privateNumber;
		}

	}//class lõppeb

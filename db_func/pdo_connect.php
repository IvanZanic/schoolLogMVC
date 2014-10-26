<?php

	class DatabaseClass {

		const hostname = 'localhost';
		const username = 'root';
		const password = '';		

		private $db_name;	

		public function __construct($db_name) {
			$this->db_name = $db_name;
		}	
	
		public function connect() {

		    $this->dbc = new PDO("mysql:host=".self::hostname.";dbname=".$this->db_name, self::username, self::password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    return $this->dbc;
		}
	}
?>

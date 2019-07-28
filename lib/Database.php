<?php

class Database{
	 
	 private $dbhost = "localhost";
	 private $dbname = "database";
	 private $dbuser = "root";
	 private $dbpass = "";
	 public $pdo ;

	public function __construct(){
		if(!isset($this->pdo)){
			try{
			$link = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
			$link->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
			$link->exec("SET CHARACTER SET UTF8");
			$this->pdo = $link ;
		}
		catch(PDOException $e){
			die("failed to connected Database".$e->getmessage());
		}
		}
		
		}
}


?>
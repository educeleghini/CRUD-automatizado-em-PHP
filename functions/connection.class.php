﻿<?php
/*
 * 	Descrição do Arquivo
 * 	@author - 
 * 	@date - 
 * 	@description  - 
 */
date_default_timezone_set("Brazil/East");

class Connection{
	private $connection;
	private $parameters = array("host"=>"localhost","user"=>"root","password"=>"yes","database"=>"projeto");
	
	
	public function openConnection(){
		$this->connection = mysqli_connect($this->parameters["host"], $this->parameters["user"], $this->parameters["password"]);
		if (!$this->connection) {
			die ("Erro ao estabelecer conexão com a base de dados");
		}else{
			$this->selectDatabase();
		}
	}
	
	private function selectDatabase(){
		$database = mysqli_select_db($this->connection, $this->parameters["database"]);
		if (!$database) {
			die ("Base de dados não encontrada");
		}
		mysqli_query($this->connection,"SET NAMES 'utf8'");
		mysqli_query($this->connection,'SET character_set_connection=utf8');
		mysqli_query($this->connection,'SET character_set_client=utf8');
		mysqli_query($this->connection,'SET character_set_results=utf8');
	}
	
	public function getConnection(){
		return $this->connection;
	}
	
	public function closeConnection(){
		mysqli_close($this->connection);
	}
}
?>
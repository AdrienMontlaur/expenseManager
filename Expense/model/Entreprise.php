<?php

require_once("Database.php");
$db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8', "root", "");
Class Entreprise
{


	private $_siret;
	private $_nom;

	public function setSiret($numeroSiret){
		if (strlen($numeroSiret)>1){
			$this->_siret=$numeroSiret;
		}
	}
	public function setNom($nomSociete){
		if (is_string($nomSociete)){
			$this->_nom=$nomSociete;
		}
	}
	public function getSiret(){
		return $this->_siret;
	}
	public function getNom(){
		return $this->_nom;
	}

	public function connectDB($identifiant='root',$mdp=''){

		try {
		    $db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8', "$identifiant", "$mdp");
		    return $db;
		}

		catch(Exception $e) {
		    die('Erreur : '.$e->getMessage());
		}
	}
}
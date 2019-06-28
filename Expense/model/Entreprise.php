<?php


Class Entreprise
{


	private $entSiret;
	private $entNom;
	private $entAdresse;
	private $entPostal;
	private $entVille;

	public function setEntSiret($numeroSiret){
		if (strlen($numeroSiret)==14&&(int)$numeroSiret){
			$this->entSiret=$numeroSiret;
		}
	}
	public function setEntNom($nomSociete){
		if (is_string($nomSociete)){
		    if (iconv_strlen($nomSociete)>50) {
                $nomSociete = substr($nomSociete,0,50);
            }
            $this->entNom = strtoupper($nomSociete);
		}
	}
    public function setEntAdresse($adresse){
        if (is_string($adresse)){
            if (iconv_strlen($adresse)>50) {
                $adresse = substr($adresse,0,50);
            }
            $this->entAdresse = strtoupper($adresse);
        }
    }

    public function setEntPostal($codePostal){
        if (strlen($codePostal)==5&&(int)$codePostal){
            $this->entPostal=$codePostal;
        }
    }

    public function setEntVille($ville){
        if (is_string($ville)){
            if (iconv_strlen($ville)>50) {
                $ville = substr($ville,0,50);
            }
            $this->entVille = strtoupper($ville);
        }
    }

	public function getEntSiret(){
		return $this->entSiret;
	}
	public function getEntNom(){
		return $this->entNom;
	}
    public function getEntAdresse(){
        return $this->entAdresse;
    }

    public function getEntPostal(){
        return $this->entPostal;
    }
    public function getEntVille(){
        return $this->entVille;
    }
}
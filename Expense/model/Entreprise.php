<?php


Class Entreprise extends Entity
{

        /**
         *
         * @param int $entSiret
         * @param int $entSiret
         * @param int $entSiret
         * @param int $entSiret
         * @param int $entSiret
         * 
         */
	private $entSiret;
	private $entNom;
	private $entAdresse;
	private $entPostal;
	private $entVille;



    public function __construct($array=null){
        if(is_array($array)){
            $this->hydrate($array);
        }
    }
        /**
         * 
         * @param int $numeroentSiret Numero entSiret de l'entreprise à instancier
         */
        
	public function setEntSiret($numeroentSiret){
		if (strlen($numeroentSiret)==14&&(int)$numeroentSiret){
			$this->entSiret=$numeroentSiret;
		}
	}
        /**
         * 
         * @param int $nomSociete Nom de l'entreprise à instancier
         */
	public function setEntNom($nomSociete){
		if (is_string($nomSociete)){
		    if (iconv_strlen($nomSociete)>50) {
                $nomSociete = substr($nomSociete,0,50);
            }
            $this->entNom = strtoupper($nomSociete);
		}
	}
        /**
         * 
         * @param str $adresse Adresse de l'entreprise à instancier
         */
    public function setEntAdresse($adresse){
        if (is_string($adresse)){
            if (iconv_strlen($adresse)>50) {
                $adresse = substr($adresse,0,50);
            }
            $this->entAdresse = strtoupper($adresse);
        }
    }
        /**
         * 
         * @param str $codePostal Code postal de l'entreprise à instancier
         */
    public function setEntPostal($codePostal){
        if (strlen($codePostal)==5&&(int)$codePostal){
            $this->entPostal=$codePostal;
        }
    }
        /**
         * 
         * @param str $ville Ville de l'entreprise à instancier
         */
    public function setEntVille($ville){
        if (is_string($ville)){
            if (iconv_strlen($ville)>50) {
                $ville = substr($ville,0,50);
            }
            $this->entVille = strtoupper($ville);
        }
    }
        /**
         * 
         * @return str $entSiret Retourne le entSiret de l'objet entreprise
         */
    public function getEntSiret(){
            return $this->entSiret;
    }
        /**
         * 
         * @return str $entNom Retourne le nom de l'objet entreprise
         */        
    public function getEntNom(){
            return $this->entNom;
    }
         /**
         * 
         * @return str $entAdresse Retourne l'adresse de l'objet entreprise
         */  
    public function getEntAdresse(){
        return $this->entAdresse;
    }
         /**
         * 
         * @return str $entPostal Retourne le code postal de l'objet entreprise
         */  
    public function getEntPostal(){
        return $this->entPostal;
    }
         /**
         * 
         * @return str $entVille Retourne la ville de l'objet entreprise
         */  
    public function getEntVille(){
        return $this->entVille;
    }
}
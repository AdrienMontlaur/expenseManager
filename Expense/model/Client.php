<?php

Class Client extends Entity

{
	private $cliId;
	private $cliNom;
	private $cliPrenom;
	private $cliFonction;
    private $cliMail;
    private $cliNumeroTelephone;
    private $entSiret;
    private $salId;//TODO get set, vérifier si nécessaire
    private $cliCommentaire;




        /**
         * Construction d'un objet client à partir d'un tableau
         * 
         * @param array $array Tableau de valeur de la DB
         */

    public function __construct($array=null){
        if(is_array($array)){
            $this->hydrate($array);
        }
    }
        /**
         * 
         * @param int $id id du contact chez le client à instancier
         */
        
    public function setCliId($id){
        if(filter_var($id, FILTER_VALIDATE_INT)){
            $this->cliId = $id;
        }
    }

        /**
         * 
         * @param string $nomClient Nom du contact chez le client à instancier
         */
	public function setCliNom($nomClient){
		if (is_string($nomClient)){
		    if (iconv_strlen($nomClient)>50) {
                $nomClient = substr($nomClient,0,50);
            }
            $this->cliNom = strtoupper($nomClient);
		}
    }
        /**
         * 
         * @param string $prenomClient prenom du contact chez le client à instancier
         */
	public function setCliPrenom($prenomClient){
		if (is_string($prenomClient)){
		    if (iconv_strlen($prenomClient)>50) {
                $prenomClient = substr($prenomClient,0,50);
            }
            $this->cliPrenom = strtoupper($prenomClient);
		}
    }
        /**
         * 
         * @param string $fonctionClient fonction du contact chez le client à instancier
         */
    public function setCliFonction($fonctionClient){
        if (is_string($fonctionClient)){
		    if (iconv_strlen($fonctionClient)>50) {
                $fonctionClient = substr($fonctionClient,0,50);
            }
            $this->cliFonction = strtoupper($fonctionClient);
		}
    }

        /**
         * 
         * @param string $mailClient Mail du contact chez le client à instancier
         */
        public function setCliMail($mailClient){
            if (is_string($mailClient)){
                if (iconv_strlen($mailClient)<100) {
                    if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $mailClient )){
                        $this->cliMail = strtolower($mailClient);
                    }            
                }
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
         * @param int $numeroTelephone Numero de téléphone du contact chez le client à instancier
         */
        
        public function setCliNumeroTelephone($telephoneClient){
            // Nettoyage de la chaine
            $charOk = ['0','1','2','3','4','5','6','7','8','9'];
            $telephoneClientTraite = '';

            for ($i=0;$i<=iconv_strlen($telephoneClient);$i++){
                $char = substr($telephoneClient,$i,1);
                if(in_array($char,$charOk)){
                    $telephoneClientTraite .= $char;
                }
            }
            // Prend les 9 derniers chiffres
            $telephoneClientTraite = substr($telephoneClientTraite, -9);

            // Valide le prefixe
            $prefixe = substr($telephoneClientTraite,0,1);


            if(($prefixe>=1 && $prefixe<=7) || $prefixe == 9){
                $this->cliNumeroTelephone = '+33'.$telephoneClientTraite;
            }
        }

        /**
         * 
         * @param string $cliCommentaire Commentaire sur le client
         */
        public function setCliCommentaire($cliCommentaire){
            if (is_string($cliCommentaire)){
                if (iconv_strlen($cliCommentaire)>255) {
                    $cliCommentaire = substr($cliCommentaire,0,255);
                }
                $this->cliCommentaire = strtoupper($cliCommentaire);
            }
        }


        /**
         * 
         * @return int $cliId Retourne le cliId de l'objet entreprise
         */
        public function getCliId(){
            return $this->cliId;
        }

        /**
         * 
         * @return string $entSiret Retourne le entSiret de l'objet entreprise
         */
    public function getEntSiret(){
            return $this->entSiret;
    }
        /**
         * 
         * @return string $cliNom Retourne le cliNom de l'objet client
         */
    public function getCliPrenom(){
            return $this->cliPrenom;
    }
        /**
         * 
         * @return string $cliFonction Retourne le cliFonction de l'objet client
         */
        public function getCliFonction(){
            return $this->cliFonction;
    }

        /**
         * 
         * @return string $cliMail Retourne le cliMail de l'objet client
         */
        public function getCliMail(){
            return $this->cliMail;
    }
        /**
         * 
         * @return string $cliNumeroTelephone Retourne le cliNumeroTelephone de l'objet client
         */
        public function getCliNumeroTelephone(){
            return $this->cliNumeroTelephone;
    }
        /**
         * 
         * @return string $cliNom Retourne le cliNom de l'objet client
         */
    public function getCliNom(){
            return $this->cliNom;
    }
        /**
         * 
         * @return string $salId Retourne le salId de l'objet client
         */
        public function getSalId(){
            return $this->salId;
    }
        /**
         * 
         * @return string $cliNom Retourne le cliNom de l'objet client
         */
        public function getCliCommentaire(){
            return $this->cliCommentaire;
    }

}
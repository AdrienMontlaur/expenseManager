<?php


Class Client
{


	private $cliId;//TODO get set
	private $cliNom;//TODO set
	private $cliPrenom;//TODO set
	private $cliFonction;//TODO get set
    private $cliMail;//TOD Oget set
    private $cliNumeroTelephone;//TODO get set
    private $entSiret;
    private $salId;//TODO get set


        /**
         * 
         * @param int $nomClient Nom du contact chez le client à instancier
         */
	public function setEntNom($nomClient){
		if (is_string($nomClient)){
		    if (iconv_strlen($nomClient)>50) {
                $nomClient = substr($nomClient,0,50);
            }
            $this->cliNom = strtoupper($nomClient);
		}
    }
        /**
         * 
         * @param int $prenomClient prenom du contact chez le client à instancier
         */
	public function setEntNom($prenomClient){
		if (is_string($prenomClient)){
		    if (iconv_strlen($prenomClient)>50) {
                $prenomClient = substr($prenomClient,0,50);
            }
            $this->cliPrenom = strtoupper($prenomClient);
		}
    }
        /**
         * 
         * @param int $numeroentSiret Numero entSiret de l'entreprise à instancier
         */
        
	public function setEntentSiret($numeroentSiret){
		if (strlen($numeroentSiret)==14&&(int)$numeroentSiret){
			$this->ententSiret=$numeroentSiret;
		}
	}

        /**
         * 
         * @return str $ententSiret Retourne le entSiret de l'objet entreprise
         */
    public function getEntentSiret(){
            return $this->ententSiret;
    }

}
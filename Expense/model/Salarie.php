<?php

require_once('../functions.php');

class Salarie
{

    private $salFonction;
    private $salId;
    private $salMail;
    private $salMdp;
    private $salNom;
    private $salPrenom;
    private $salentSiret;

    /**
     * @return mixed
     */
    public function getSalFonction()
    {
        return $this->salFonction;
    }

    /**
     * @param mixed $salFonction
     */
    public function setSalFonction($salFonction)
    {
        $salFonction = $this->tronque($salFonction,50);
        $this->salFonction = $salFonction;
    }

    /**
     * @return mixed
     */
    public function getSalId()
    {
        return $this->salId;
    }

    /**
     * @param mixed $salId
     */
    public function setSalId($salId)
    {
        if (is_int($salId)) {
            $this->salId = intval($salId);
        }
    }

    /**
     * @return mixed
     */
    public function getSalMail()
    {
        return $this->salMail;
    }

    /**
     * @param mixed $SalMail
     */
    public function setSalMail($salMail)
    {
        if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $salMail ))
        {
            $this->salMail = $salMail;
        }

    }

    /**
     * @return mixed
     */
    public function getSalMdp()
    {
        return $this->salMdp;
    }

    /**
     * @param mixed $SalMdp
     */
    public function setSalMdp($salMdp)
    {
        if(iconv_strlen($salMdp)>=6) {
            $this->salMdp = $salMdp;
        }
    }

    /**
     * @return mixed
     */
    public function getSalNom()
    {
        return $this->salNom;
    }

    /**
     * @param mixed $salNom
     */
    public function setSalNom($salNom)
    {
        if(is_string($salNom)){
        $salNom = $this->tronque($salNom,50);
        $this->salNom = strtoupper($salNom);
        }
    }

    /**
     * @return mixed
     */
    public function getSalPrenom()
    {
        return $this->salPrenom;
    }

    /**
     * @param mixed $salPrenom
     */
    public function setSalPrenom($salPrenom)
    {   if(is_string($salPrenom)) {
        $salPrenom = $this->tronque($salPrenom, 50);
        $this->salPrenom = strtolower($salPrenom);
        $this->salPrenom = ucfirst($salPrenom);
        $this->salPrenom = $salPrenom;
        }
    }

    /**
     * @return mixed
     */
    public function getSalentSiret()
    {

        return $this->salentSiret;
    }

    /**
     * @param mixed $salentSiret
     */
    public function setSalentSiret($salentSiret)
    {
        if (strlen($salentSiret)==14&&(int)$salentSiret){
            $this->salentSiret=$salentSiret;
        }

    }





}
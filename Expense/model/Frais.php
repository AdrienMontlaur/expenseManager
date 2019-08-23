<?php

require_once('../functions.php');

class Frais extends Entity
{

    private $fraId;
    private $fraType;
    private $fraDate;
    private $fraEntSiret;
    private $fraStatut;
    private $fraRemboursementDemande;
    private $fraRemboursement;
    private $fraDateRemboursement;
    private $salId;
    private $cliId;

    public function __construct($array=null){
        if(is_array($array)){
            $this->hydrate($array);
        }
    }

    public function getFraId()
    {
        return $this->fraId;
    }

    public function setFraId($fraId)
    {
            $this->fraId = intval($fraId);
    }

    public function getFraType()
    {
        return $this->fraType;
    }

    public function setFraType($fraType)
    {
        if(is_string($fraType)){
            $fraType = $this->tronque($fraType,50);
            $this->fraType = strtoupper($fraType);
            }
    }

    public function getFraDate()
    {
        /*$explodeDate = explode("-", $fraDate);
        if(checkdate(int $explodeDate[1],int $explodeDate[2],int $explodeDate[0])){*/
        return $this->fraDate;
        /*}*/
    }

    public function setFraDate($fraDate)
    {
            $this->fraDate=$fraDate;
    }

    public function getFraEntSiret()
    {
        return $this->fraEntSiret;
    }

    public function setFraEntSiret($fraEntSiret)
    {
        if (strlen($fraEntSiret)==14){
            $this->fraEntSiret=$fraEntSiret;
        }
    }

    public function getFraStatut()
    {
        return $this->fraStatut;
    }

    public function setFraStatut($fraStatut)
    {
        if(is_string($fraStatut)){
            $fraStatut = $this->tronque($fraStatut,50);
            $this->fraStatut = strtoupper($fraStatut);
            }
    }

    public function getFraRemboursement()
    {
        return $this->fraRemboursement;
    }

    public function setFraRemboursement($fraRemboursement)
    {
            $this->fraRemboursement = intval($fraRemboursement);
    }

    public function getFraRemboursementDemande()
    {
        return $this->fraRemboursementDemande;
    }

    public function setFraRemboursementDemande($fraRemboursementDemande)
    {
            $this->fraRemboursementDemande = intval($fraRemboursementDemande);
    }

    public function getFraDateRemboursement()
    {
        /*$explodeDate = explode("-", $fraDate);
        if(checkdate(int $explodeDate[1],int $explodeDate[2],int $explodeDate[0])){*/
        return $this->fraDateRemboursement;
        /*}*/
    }

    public function setFraDateRemboursement($fraDateRemboursement)
    {
            $this->fraDateRemboursement=$fraDateRemboursement;
    }

    public function getSalId()
    {
        return $this->salId;
    }

    public function setSalId($salId)
    {
            $this->salId = intval($salId);
    }

    public function getCliId()
    {
        return $this->cliId;
    }

    public function setCliId($cliId)
    {
            $this->cliId = intval($cliId);
    }
}
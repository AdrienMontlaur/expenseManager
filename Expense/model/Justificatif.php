<?php

require_once('../functions.php');

class Justificatif extends Entity
{

    private $fraId;
    private $jusPhoto;
    private $jusMimeType;
    private $jusId;

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

    public function getJusPhoto()
    {
        return $this->jusPhoto;
    }

    public function setJusPhoto($jusPhoto)
    {
        $this->jusPhoto =$jusPhoto;
    }

    public function getJusMimeType()
    {
        return $this->jusMimeType;
    }

    public function setJusMimeType($jusMimeType)
    {
        if(is_string($jusMimeType)&&strlen($jusMimeType)<255){
            $this->jusMimeType = $jusMimeType;
            }
    }

    public function getJusId()
    {
        return $this->jusId;
    }

    public function setJusId($jusId)
    {
            $this->jusId = intval($jusId);
    }
}
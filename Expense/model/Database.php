<?php

abstract class Database
{
    /**
     *
     * @param str $db Paramètre contenant le lien avec la BdD
     * @param str $identifiant Paramètre contenant le login à la BdD
     * @param str $salMdp Paramètre contenant le mot de passe d'accès à la BdD 
     */
    protected $db;
    protected $identifiant = 'root';
    protected $salMdp = '';

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8',"root","");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
<?php

abstract class Database
{
    protected $db;
    protected $identifiant = 'root';
    protected $mdp = '';

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8',"root","");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
<?php

    $db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8', "root", "");


Class Database
{


        function insert($siret,$nom)
        {
            $db = new PDO('mysql:host=localhost;dbname=expense;charset=utf8', "root", "");
            $sql = "INSERT INTO entreprise(SIRET, nom_entreprise) 
                VALUES('$siret','$nom')";

            $db->query($sql);
        }



}
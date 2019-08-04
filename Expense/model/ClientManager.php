<?php

class ClientManager extends Database
{
    public function create(Client $client){
        $sql="INSERT INTO client (cliNom, cliPrenom, cliFonction, cliMail,cliNumeroTelephone, entSiret, cliCommentaire) 
        VALUES (:cliNom, :cliPrenom, :cliFonction, :cliMail, :cliNumeroTelephone, :entSiret, :cliCommentaire)";
        $req=$this->db->prepare($sql);
        //$req->bindValue(':cliId',$client->getCliId(),PDO::PARAM_INT);
        $req->bindValue(':cliNom',$client->getCliNom(),PDO::PARAM_STR);
        $req->bindValue(':cliPrenom',$client->getCliPrenom(),PDO::PARAM_STR);
        $req->bindValue(':cliFonction',$client->getCliFonction(),PDO::PARAM_STR);
        $req->bindValue(':cliMail',$client->getCliMail(),PDO::PARAM_STR);
        $req->bindValue(':cliNumeroTelephone',$client->getCliNumeroTelephone(),PDO::PARAM_STR);
        $req->bindValue(':entSiret',$client->getEntSiret(),PDO::PARAM_INT);
        //$req->bindValue(':salId',$client->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':cliCommentaire',$client->getCliCommentaire(),PDO::PARAM_STR);
        $req->execute();
    }
    public function update(Client $client){
        $sql = "UPDATE client SET cliId = :cliId,
                                      cliNom = :cliNom,
                                      cliPrenom = :cliPrenom,
                                      cliFonction = :cliFonction,
                                      cliMail = :cliMail,
                                      cliNumeroTelephone = :cliNumeroTelephone,
                                      entSiret = :entSiret,
                                      salId = :salId,
                                      cliCommentaire=:cliCommentaire
            WHERE cliId = :cliId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':cliId',$client->getCliId(),PDO::PARAM_INT);
        $req->bindValue(':cliNom',$client->getCliNom(),PDO::PARAM_STR);
        $req->bindValue(':cliPrenom',$client->getCliPrenom(),PDO::PARAM_STR);
        $req->bindValue(':cliFonction',$client->getCliFonction(),PDO::PARAM_STR);
        $req->bindValue(':cliMail',$client->getCliMail(),PDO::PARAM_STR);
        $req->bindValue(':cliNumeroTelephone',$client->getCliNumeroTelephone(),PDO::PARAM_STR);
        $req->bindValue(':entSiret',$client->getEntSiret(),PDO::PARAM_INT);
        $req->bindValue(':salId',$client->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':cliCommentaire',$client->getCliCommentaire(),PDO::PARAM_STR);
        $req->execute();
    }


    public function delete(Client $client){

        $sql = "DELETE FROM client 
                WHERE cliId = :cliId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':cliId',$client->getCliId(),PDO::PARAM_INT);
        $req->execute();
        unset($client);
    }

    public function read(int $cliId){
        $sql = "SELECT * FROM client WHERE cliId = :cliId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':cliId', $cliId, PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Client($values);
    }


    public function readAll(){
        
        $clients = [];

        $sql = "SELECT * FROM client";
        $results = $this->db->query($sql);
        $clientsData = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($clientsData as $clientData){
            $clients[] = new Entreprise($clientData);
        }

        return $clients;

    }

}
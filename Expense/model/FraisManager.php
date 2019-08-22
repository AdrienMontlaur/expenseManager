<?php

class FraisManager extends Database
{

    public function create(Frais $frais){
        $sql="INSERT INTO frais (fraId, fraType, fraDate, fraEntSiret, fraStatus, salId, cliId) 
        VALUES (:fraId, :fraType, :fraDate, :fraEntSiret, :fraStatus, :salId, :cliId)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':fraId',$frais->getFraId(),PDO::PARAM_INT);
        $req->bindValue(':fraType',$frais->getFraType(),PDO::PARAM_STR);
        $req->bindValue(':fraDate',$frais->getFraDate(),PDO::PARAM_STR);
        $req->bindValue(':fraRemboursementDemande',$frais->getFraRemboursementDemande(),PDO::PARAM_INT);
        $req->bindValue(':fraEntSiret',$frais->getFraEntSiret(),PDO::PARAM_STR);
        $req->bindValue(':fraStatus',$frais->getFraStatus(),PDO::PARAM_STR);
        $req->bindValue(':salId',$frais->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':cliId',$frais->getCliId(),PDO::PARAM_INT);
        $req->execute();
    }

    public function update(Frais $frais){
        $sql = "UPDATE frais SET      fraId = :fraId,
                                      fraType = :fraType,
                                      fraDate = :fraDate,
                                      fraRemboursementDemande = :fraRemboursementDemande,
                                      fraEntSiret = :fraEntSiret,
                                      fraStatus = :fraStatus,
                                      salId = :salId,
                                      cliId = :cliId,

            WHERE fraId = :fraId
                                    ";
        $req=$this->db->prepare($sql);
        $req->bindValue(':fraId',$frais->getFraId(),PDO::PARAM_INT);
        $req->bindValue(':fraType',$frais->getFraType(),PDO::PARAM_STR);
        $req->bindValue(':fraDate',$frais->getFraDate(),PDO::PARAM_STR);
        $req->bindValue(':fraRemboursementDemande',$frais->getFraRemboursementDemande(),PDO::PARAM_INT);
        $req->bindValue(':fraEntSiret',$frais->getFraEntSiret(),PDO::PARAM_STR);
        $req->bindValue(':fraStatus',$frais->getFraStatus(),PDO::PARAM_STR);
        $req->bindValue(':salId',$frais->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':cliId',$frais->getCliId(),PDO::PARAM_INT);
        $req->execute();
    }


    public function delete(Frais $frais){

        $sql = "DELETE FROM frais 
                WHERE fraId = :fraId
                                        ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':fraId',$salarie->getFraId(),PDO::PARAM_INT);
        $req->execute();
        unset($frais);
    }


    public function read($id){
        $sql = "SELECT * FROM frais WHERE fraId = :fraId";
        $req = $this->db->prepare($sql);
        $req->bindValue(':fraId',$id,PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Frais($values);
    }
    
    public function readAll(){
        
        $frais = [];

        $sql = "SELECT * FROM frais";
        $results = $this->db->query($sql);
        $fraisData = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($fraisData as $fraiData){
            $frais[] = new Frais($fraiData);
        }
        return $frais;

    }
    public function validateManager(Frais $frais){
        $sql = "UPDATE frais SET      fraStatut=:fraStatus
                                      fraRemboursement=:fraRemboursement
                                      fraDateRemboursement=:fraDateRemboursement

            WHERE fraId = :fraId
                                    ";
        $req=$this->db->prepare($sql);
        $req->bindValue(':fraId',$frais->getFraId(),PDO::PARAM_INT);
        $req->bindValue(':fraStatut',$frais->getFraStatut(),PDO::PARAM_STR);
        $req->bindValue(':fraRemboursement',$frais->getFraRemboursement(),PDO::PARAM_STR);
        $req->bindValue(':fraDateRemboursement',$frais->getFraDateRemboursement(),PDO::PARAM_STR);

        $req->execute();
    }

}
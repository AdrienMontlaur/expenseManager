<?php


class JustificatifManager extends Database
{

    public function create(Justificatif $justificatif){
        $sql="INSERT INTO justificatif (fraId, jusPhoto, jusMimeType, jusId) 
        VALUES (:fraId, :fraType, :fraDate, :fraEntSiret, :fraStatus, :salId, :cliId)";
        $req=$this->db->prepare($sql);
        //$fp=fopen($_FILES['photo'] [$justificatif->getJusId()],'rb']);
        $req->bindValue(':fraId',$frais->getFraId(),PDO::PARAM_INT);
        $req->bindValue(':jusPhoto',$fp,PDO::PARAM_LOB);
        $req->bindValue(':jusMimeType',$frais->getJusMimeType(),PDO::PARAM_STR);
        $req->bindValue(':jusId',$frais->getJusId(),PDO::PARAM_INT);
        $req->execute();
    }
/*
    public function update(Justificatif $justificatif){
        $sql = "UPDATE frais SET      fraId = :fraId,
                                      fraType = :fraType,
                                      fraDate = :fraDate,
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
        $req->bindValue(':fraEntSiret',$frais->getFraEntSiret(),PDO::PARAM_STR);
        $req->bindValue(':fraStatus',$frais->getFraStatus(),PDO::PARAM_STR);
        $req->bindValue(':salId',$frais->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':cliId',$frais->getCliId(),PDO::PARAM_INT);
        $req->execute();
    }

*/
    public function delete(Justificatif $justificatif){

        $sql = "DELETE FROM justificatif 
                WHERE jusId = :jusId
                                        ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':jusId',$salarie->getJusId(),PDO::PARAM_INT);
        $req->execute();
        unset($justificatif);
    }


    public function read(int $jusId){
        $sql = "SELECT * FROM justificatif WHERE jusId = :jusId";
        $req = $this->db->prepare($sql);
        $req->bindValue('',$id,PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Justificatif($values);
    }
/*
    public function readImage(int $jusId){
        $sql="SELECT jusPhoto FROM justificatif WHERE jusId = :jusId";
        $req = fbsql_query($sql);
        $row_data = fbsql_fetch_row($req);
        $blob_data = fbsql_read_blob($row_data[0]);
        fbsql_free_result($req);
        return
    }*/

    public function readAll(){
        $sql = "SELECT * FROM justificatif";
        $req = $this->db->prepare($sql);
        $req->execute();
        $values = $req->fetchAll(PDO::FETCH_CLASS,"Justificatif");
        return $values;
    }

}
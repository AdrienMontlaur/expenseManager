<?php


class SalarieManager extends Database
{

    public function create(Salarie $salarie){
        $sql="INSERT INTO salarie (salId, salFonction, nom_salarie, salPrenom, salMail, salMdp, entSiret) 
        VALUES (:salId, :salFonction, :nom_salarie, :salPrenom, :salMail, :salMdp, :entSiret)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':salId',$salarie->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':salFonction',$salarie->getSalFonction(),PDO::PARAM_STR);
        $req->bindValue(':nom_salarie',$salarie->getSalNom(),PDO::PARAM_STR);
        $req->bindValue(':salPrenom',$salarie->getSalPrenom(),PDO::PARAM_STR);
        $req->bindValue(':salMail',$salarie->getSalMail(),PDO::PARAM_STR);
        $req->bindValue(':salMdp',$salarie->getSalMdp(),PDO::PARAM_STR);
        $req->bindValue(':entSiret',$salarie->getSalentSiret(),PDO::PARAM_INT);
        $req->execute();
    }

    public function update(Salarie $salarie){
        $sql = "UPDATE salarie SET    salId = :salId,
                                      salFonction = :salFonction,
                                      nom_salarie = :nom_salarie,
                                      salPrenom = :salPrenom,
                                      salMail = :salMail,
                                      salMdp = :salMdp,
                                      entSiret = :entSiret,

            WHERE salId = :salId
                                    ";
        $req=$this->db->prepare($sql);
        $req->bindValue(':salId',$salarie->getSalId(),PDO::PARAM_INT);
        $req->bindValue(':salFonction',$salarie->getSalFonction(),PDO::PARAM_STR);
        $req->bindValue(':nom_salarie',$salarie->getSalNom(),PDO::PARAM_STR);
        $req->bindValue(':salPrenom',$salarie->getSalPrenom(),PDO::PARAM_STR);
        $req->bindValue(':salMail',$salarie->getSalMail(),PDO::PARAM_STR);
        $req->bindValue(':salMdp',$salarie->getSalMdp(),PDO::PARAM_STR);
        $req->bindValue(':entSiret',$salarie->getSalentSiret(),PDO::PARAM_INT);
        $req->execute();
    }


    public function delete(Salarie $salarie){

        $sql = "DELETE FROM salarie 
                WHERE salId = :salId
                                        ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':salId',$salarie->getSalId(),PDO::PARAM_INT);
        $req->execute();
        unset($salarie);
    }


    public function read(int $id){
        $sql = "SELECT * FROM salarie WHERE salId = :salId";
        $req = $this->db->prepare($sql);
        $req->bindValue('',$id,PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Salarie($values);
    }
    
    public function readAll(){
        $sql = "SELECT * FROM salarie";
        $req = $this->db->prepare($sql);
        $req->execute();
        $values = $req->fetchAll(PDO::FETCH_CLASS,"Salarie");
        var_dump($values);
        return $values;
    }

}
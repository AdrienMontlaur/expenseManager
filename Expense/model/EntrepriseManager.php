<?php


class EntrepriseManager extends Database
{
    public function create(Entreprise $entreprise){
        $sql="INSERT INTO entreprise (entSiret, entNom, entAdresse, entPostal, entVille) 
        VALUES (:entSiret, :entNom, :entAdresse, :entPostal, :entVille)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':entSiret',$entreprise->getEntSiret(),PDO::PARAM_INT);
        $req->bindValue(':entNom',$entreprise->getEntNom(),PDO::PARAM_STR);
        $req->bindValue(':entAdresse',$entreprise->getEntAdresse(),PDO::PARAM_STR);
        $req->bindValue(':entPostal',$entreprise->getEntPostal(),PDO::PARAM_INT);
        $req->bindValue(':entVille',$entreprise->getEntVille(),PDO::PARAM_STR);
        $req->execute();
    }
    public function update(Entreprise $entreprise){
        $sql = "UPDATE entreprise SET entSiret = :entSiret,
                                      entNom = :entNom,
                                      entAdresse = :entAdresse,
                                      entPostal = :entPostal,
                                      entVille = :entVille

            WHERE entSiret = :entSiret
                                    ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':entSiret',$entreprise->getEntSiret(),PDO::PARAM_INT);
        $req->bindValue(':entNom',$entreprise->getEntNom(),PDO::PARAM_STR);
        $req->bindValue(':entAdresse',$entreprise->getEntAdresse(),PDO::PARAM_STR);
        $req->bindValue(':entPostal',$entreprise->getEntPostal(),PDO::PARAM_INT);
        $req->bindValue(':entVille',$entreprise->getEntVille(),PDO::PARAM_STR);
        $req->execute();
    }


    public function delete(Entreprise $entreprise){

        $sql = "DELETE FROM entreprise 
                WHERE entSiret = :entSiret
                                        ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':entSiret',$entreprise->getEntSiret(),PDO::PARAM_INT);
        $req->execute();
        unset($entreprise);
    }

    public function read(int $siret){
        $sql = "SELECT * FROM entreprise WHERE entSiret = :entSiret";
        $req = $this->db->prepare($sql);
        $req->bindValue(':entSiret', $siret, PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Entreprise($values);
    }


}
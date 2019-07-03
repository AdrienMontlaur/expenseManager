<?php


class EntrepriseManager extends Database
{
    public function create(Entreprise $entreprise){
        $sql="INSERT INTO entreprise (ententSiret, entNom, entAdresse, entPostal, entVille) 
        VALUES (:ententSiret, :entNom, :entAdresse, :entPostal, :entVille)";
        $req=$this->db->prepare($sql);
        $req->bindValue(':ententSiret',$entreprise->getEntentSiret(),PDO::PARAM_STR);
        $req->bindValue(':entNom',$entreprise->getEntNom(),PDO::PARAM_STR);
        $req->bindValue(':entAdresse',$entreprise->getEntAdresse(),PDO::PARAM_STR);
        $req->bindValue(':entPostal',$entreprise->getEntPostal(),PDO::PARAM_INT);
        $req->bindValue(':entVille',$entreprise->getEntVille(),PDO::PARAM_STR);
        $req->execute();
    }
    public function update(Entreprise $entreprise){
        $sql = "UPDATE entreprise SET ententSiret = :ententSiret,
                                      entNom = :entNom,
                                      entAdresse = :entAdresse,
                                      entPostal = :entPostal,
                                      entVille = :entVille

            WHERE ententSiret = :ententSiret
                                    ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':ententSiret',$entreprise->getEntentSiret(),PDO::PARAM_INT);
        $req->bindValue(':entNom',$entreprise->getEntNom(),PDO::PARAM_STR);
        $req->bindValue(':entAdresse',$entreprise->getEntAdresse(),PDO::PARAM_STR);
        $req->bindValue(':entPostal',$entreprise->getEntPostal(),PDO::PARAM_INT);
        $req->bindValue(':entVille',$entreprise->getEntVille(),PDO::PARAM_STR);
        $req->execute();
    }


    public function delete(Entreprise $entreprise){

        $sql = "DELETE FROM entreprise 
                WHERE ententSiret = :ententSiret
                                        ";
        $req = $this->db->prepare($sql);
        $req->bindValue(':ententSiret',$entreprise->getEntentSiret(),PDO::PARAM_INT);
        $req->execute();
        unset($entreprise);
    }

    public function read(int $entSiret){
        $sql = "SELECT * FROM entreprise WHERE ententSiret = :ententSiret";
        $req = $this->db->prepare($sql);
        $req->bindValue(':ententSiret', $entSiret, PDO::PARAM_INT);
        $req->execute();
        $values = $req->fetch(PDO::FETCH_ASSOC);
        return New Entreprise($values);
    }


}
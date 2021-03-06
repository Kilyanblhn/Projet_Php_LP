<?php

require_once ("objets/Magazine.php");
require_once("models/Manager.php");

class MagazineManager extends Manager
{

    public function nouveauMagazine(int $reference, String $titre, int $anneePublication, String $typeMagazine){
        $db = $this->dbConnect();
        $stmt = $db->prepare('INSERT INTO `magazine` (`reference`, `titre`, `anneePublication`, `typeMagazine`) VALUES (:reference, :titre, :anneePublication, :typeMagazine)');
        $params = ['reference' => $reference, 'titre' => $titre, 'anneePublication' => $anneePublication, 'typeMagazine' => $typeMagazine];
        $stmt->execute($params);
    }

    public function modifierMagazine(int $reference, String $titre, int $anneePublication, String $typeMagazine){
        $db = $this->dbConnect();
        $stmt = $db->prepare('UPDATE `magazine` SET titre = :titre, anneePublication = :anneePublication, typeMagazine = :typeMagazine WHERE (`reference` = :reference)');
        $params = ['reference' => $reference, 'titre' => $titre, 'anneePublication' => $anneePublication, 'typeMagazine' => $typeMagazine];
        $stmt->execute($params);
    }

    public function supprimerMagazine($reference){
        $db = $this->dbConnect();
        $stmt = $db->prepare('DELETE FROM `magazine` WHERE `reference` = :reference');
        $params = ['reference' => $_GET['reference']];
        $stmt->execute($params);
    }

    public function getListeMagazines(): array {
        $magazines = array();

        $db = $this->dbConnect();
        $listeMagazines = $db->query('SELECT * FROM magazine');
        while ($unMagazine = $listeMagazines->fetch()) {
            $magazines[] = new Magazine($unMagazine["reference"], $unMagazine["titre"], $unMagazine["anneePublication"], $unMagazine["typeMagazine"]);
        }
        return $magazines;
    }

    public function getMagazineByRef($reference) {
        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM magazine WHERE reference= :reference');
        $params = ['reference' => $_GET['reference']];
        $stmt->execute($params);
        $unMagazine = $stmt->fetch();

        return new Magazine($unMagazine["reference"], $unMagazine["titre"], $unMagazine["anneePublication"], $unMagazine["typeMagazine"]);
    }

}
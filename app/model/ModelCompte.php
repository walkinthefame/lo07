<?php
require_once('Model.php');
require_once('ModelBanque.php');
require_once('ModelPersonne.php');

class ModelCompte
{
    private $id, $label, $montant, $banque_id, $user_id;
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $user_id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->montant = $montant;
            $this->banque_id = $banque_id;
            $this->user_id = $user_id;
        }
    }
    function setId($id) {
        $this->id = $id;
    }
    function setLabel($label) {
        $this->label = $label;
    }
    function setMontant($montant) {
        $this->montant = $montant;
    }
    function setBanque_id($banque_id) {
        $this->banque_id = $banque_id;
    }
    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
    function getId() {
        return $this->id;
    }
    function getLabel() {
        return $this->label;
    }
    function getMontant() {
        return $this->montant;
    }
    function getBanque_id() {
        return $this->banque_id;
    }
    function getUser_id() {
        return $this->user_id;
    }
    
    public static function getComptes($label) {
        try {
            $database = Model::getInstance();
            $id = ModelBanque::getBanqueIDByLabel($label);
            $query = "SELECT * FROM compte where banque_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(
                ['id' => $id]
            );
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            $results2 = [];
            foreach($results as $element){
                $results2 = $element->getUser_id();
            }
            $inQuery = implode(',', array_fill(0, count($results2), '?')); // Crée une chaîne de placeholders
            $query2 = "SELECT nom, prenom FROM personne WHERE id IN ($inQuery)";
            $statement2 = $database->prepare($query2);
            $statement2->execute($results2); // Passez les IDs comme tableau
            $resultats_personnes = $statement2->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return array($resultats_personnes, $results);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    
}
?>
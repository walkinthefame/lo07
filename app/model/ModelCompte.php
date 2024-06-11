<?php
require_once('Model.php');
require_once('ModelBanque.php');
require_once('ModelPersonne.php');

class ModelCompte
{
    private $id, $label, $montant, $banque_id, $personne_id;
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->montant = $montant;
            $this->banque_id = $banque_id;
            $this->personne_id = $personne_id;
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
    function setPersonne_id($personne_id) {
        $this->personne_id = $personne_id;
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
    function getPersonne_id() {
        return $this->personne_id;
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
            $results3 = array();
            $value = 0;
            foreach($results as $element){
                $id = $element->getPersonne_id();
                $results2 = ModelPersonne::getInfosByID($id);
                $results3[] = $results2;
                $value = $value +1;
            }
            return array($results, $results3, $value);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    
}
?>
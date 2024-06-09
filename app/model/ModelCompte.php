<?php
require_once('Model.php');

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
    public static function getAllComptes() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM compte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
}
?>
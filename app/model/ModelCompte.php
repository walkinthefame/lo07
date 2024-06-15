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

    public static function getAllComptes(){
        $database = Model::getInstance();
         $sql = 'SELECT personne.nom, personne.prenom, banque.label AS banque_label, banque.pays, compte.label AS compte_label, compte.montant
            FROM compte
            INNER JOIN personne ON compte.personne_id = personne.id
            INNER JOIN banque ON compte.banque_id = banque.id';
    $query = $database->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOneCompte($id)
{
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM compte where personne_id = :id";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id
    ]);
    $results = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $element){
        $id = $element['banque_id'];
        $results2 = ModelBanque::getBanqueByID_asso($id);
        $results[] = $results2;
    }
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}

}

public static function addCompte($label, $montant, $banque, $personne_id)
{
    try{
    $database = Model::getInstance();
    $id = ModelPersonne::getMaxIDCompte();
    $query = "INSERT INTO compte (id, label, montant, banque_id, personne_id) VALUES (:id, :label, :montant, :banque_id, :personne_id)";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id,
        'label' => $label,
        'montant' => $montant,
        'banque_id' => $banque,
        'personne_id' => $personne_id
    ]);
    return 1;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;

}

    
}
}
?>
<?php
require_once('Model.php');
require_once('ModelBanque.php');
require_once('ModelPersonne.php');

class ModelResidence {
    private $id, $label, $ville, $prix, $personne_id ;

    public function __construct($id, $label, $ville, $prix, $personne_id){
        $this->id = $id;
        $this->label = $label;
        $this->ville = $ville;
        $this->prix = $prix;
        $this->personne_id = $personne_id;
    }

    function setId($id){
        $this->id = $id;
    }
    function setLabel($label){
        $this->label = $label;
    }
    function setVille($ville){
        $this->ville = $ville;
    }
    function setPrix($prix){
        $this->prix = $prix;
    }
    function setPersonneId($personne_id){
        $this->personne_id = $personne_id;
    }

    function getId(){
        return $this->id;
    }
    function getLabel(){
        return $this->label;
    }
    function getVille(){
        return $this->ville;
    }
    function getPrix(){
        return $this->prix;
    }
    function getPersonne_id(){
        return $this->personne_id;
    }

    public static function getAllResidences(){
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.nom, personne.prenom, residence.label, residence.prix, residence.ville
                  FROM residence 
                  INNER JOIN personne ON residence.personne_id = personne.id
                  ORDER BY residence.prix ASC";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
    
}}
?>
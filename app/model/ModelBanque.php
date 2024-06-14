<?php
require_once('Model.php');

class ModelBanque{
    private $id, $label, $pays;

    public function __construct($id = NULL, $label = NULL, $pays = NULL){
        if (!is_null($id)){
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
        }
    }
    function setId($id){
        $this->id = $id;
    }
    function setLabel($label){
        $this->label = $label;
    }
    function setPays($pays){
        $this->pays = $pays;
    }
    function getId(){
        return $this->id;
    }
    function getLabel(){
        return $this->label;
    }
    function getPays(){
        return $this->pays;
    } 
    public static function getAllBanques(){
        try{
        $database = Model::getInstance();
        $query = "SELECT * FROM banque";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelBanque");
        return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
    }
}

    public static function AddBanque($label, $pays){
        try{
            $database = Model::getInstance();
            $query1 = "select max(id) from banque";
            $statement = $database->query($query1);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            $query = "INSERT INTO banque (id, label, pays) VALUES (:id, :label, :pays)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id, 
                'label' => $label,
                'pays' => $pays
            ]);
            return 1;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function FindBanqueID()
    {
        try{
            $database = Model::getInstance();
            $query = "SELECT id FROM banque WHERE label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $_GET['banque']
            ]);
            $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getBanqueIDByLabel($label)
    {
        try{
            $database = Model::getInstance();
            $query = "SELECT id FROM banque WHERE label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label
            ]);
            $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
            return $results[0];
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getBanqueByID($id)
    {
        try{
            $database = Model::getInstance();
            $query = "SELECT * FROM banque WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getBanqueByID_asso($id)
    {
        try{
            $database = Model::getInstance();
            $query = "SELECT * FROM banque WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement -> fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}


?>
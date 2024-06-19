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

    /*appelée pour afficher toutes les residences avec toutes les infos*/
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
}
    /*donne les noms de toutes les residences de la table residence*/
    public static function getNameResidences($userId){
        try{
            $database = Model::getInstance();
            $query = "SELECT label 
            FROM residence WHERE personne_id!= :userId" ;
            $statement = $database->prepare($query);
            $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
            $statement->execute();
            $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function getResidenceOwner($residenceToBuy){
        try{
            $database = Model::getInstance();
            $query1 = "SELECT personne_id from residence where label = :residenceToBuy";  /*recupere l id de la personne qui possede la residence actuellement */
            $statement = $database->prepare($query1);
            $statement->execute(['residenceToBuy' => $residenceToBuy]);
            $results = $statement->fetchColumn();
            return $results; 
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function OwnAccountOrNot ($personneId){
        try{
        $database = Model::getInstance();
            $query = "SELECT label FROM compte WHERE personne_id = :personneId";
            $statement = $database->prepare($query);
            $statement->execute(['personneId' => $personneId]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results ; 
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }


    }

    public static function getResidencePrice($residenceName){
        try{
            $database = Model::getInstance();
                $query = "SELECT prix FROM residence WHERE label = :residenceName";
                $statement = $database->prepare($query);
                $statement->execute(['residenceName' => $residenceName]);
                $result = $statement->fetchColumn();
                return $result; 
            }
            catch(PDOException $e) {
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                return NULL;
            }
    }

    public static function transactionResidence( $residenceName, $ownerId, $userId){
        try{
            $database = Model::getInstance();
            $query = "UPDATE residence SET personne_id = :newOwnerId WHERE label = :residenceName";
                $statement = $database->prepare($query);
                $statement->execute(['newOwnerId' => $userId, 'residenceName' => $residenceName]);
            }
            catch(PDOException $e) {
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                return NULL;
            }

    }






    public static function getClientResidence($id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM residence where personne_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(
                ['id' => $id]
            );
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function transactionCompte($buyerAccount, $ownerAccount, $residencePrice){
        try{
            $database = Model::getInstance();
            $query1 = "UPDATE compte SET montant = montant + :residencePrice WHERE label = :ownerAccount";
            $query2 = "UPDATE compte SET montant = montant - :residencePrice WHERE label = :buyerAccount";
            $statement1 = $database->prepare($query1);
            $statement1->execute(['residencePrice' => $residencePrice, 'ownerAccount' => $ownerAccount]);
            $statement2 = $database->prepare($query2);
            $statement2->execute(['residencePrice' => $residencePrice, 'buyerAccount' => $buyerAccount]);
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMontantNomCompte($userId){
        try{
            $database = Model::getInstance();
            $query = "SELECT label, montant FROM compte WHERE personne_id = :userId";
            $statement = $database->prepare($query);
            $statement->execute(['userId' => $userId]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result ; 
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getNomPrixResidence($userId){
        try{
            $database = Model::getInstance();
            $query = "SELECT label, prix FROM residence where personne_id = :userId";
            $statement = $database->prepare($query);
            $statement->execute(['userId' => $userId]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    
}
?>
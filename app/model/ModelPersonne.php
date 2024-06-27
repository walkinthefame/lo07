<?php
require_once('Model.php');
require_once('ModelCompte.php');
class ModelPersonne {
public const ADMINISTRATEUR =0;
public const CLIENT =1;

private $id, $nom, $prenom, $statut, $login, $password;	

public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $statut = NULL, $login = NULL, $password = NULL){
    if(!is_null($id)){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->statut = $statut;
        $this->login = $login;
        $this->password = $password;
    }
}
function setId($id){
    $this->id = $id;
}
function setNom($nom){
    $this->nom = $nom;
}
function setPrenom($prenom){
    $this->prenom = $prenom;
}
function setStatut($statut){
    $this->statut = $statut;
}
function setLogin($login){
    $this->login = $login;
}
function setMdp($password){
    $this->password = $password;
}
function getId(){
    return $this->id;
}
function getNom(){
    return $this->nom;
}
function getPrenom(){
    return $this->prenom;
}
function getStatut(){
    return $this->statut;
}
function getLogin(){
    return $this->login;
}
function getPassword(){
    return $this->password;
} 


public static function getAllClients(){
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM personne where statut = 1";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}
public static function getAllAdmins(){
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM personne where statut = 0";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}
 
public static function getAllCompte()
{
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM compte";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelCompte");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}


public static function getAllResidence()
{
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM residence order by prix asc";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelResidence");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}

public static function getInfosByID($id)
{
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM personne where id = :id";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id
    ]);
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}

}

public static function getMaxIDCompte()
{
    try{
    $database = Model::getInstance();
    $query = "SELECT MAX(id) FROM compte";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
    $results[0] = $results[0] + 1;
    return $results[0];
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}
public static function getMaxIDPersonne()
{
    try{
    $database = Model::getInstance();
    $query = "SELECT MAX(id) FROM personne";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
    $results[0] = $results[0] + 1;
    return $results[0];
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}

public static function getPersonneByID($id)
{
    try{
    $database = Model::getInstance();
    $query = "SELECT * FROM personne where id = :id";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id
    ]);
    $results = $statement -> fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
    return $results;
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}
}

public static function getIDByUser($user)
{
    try{
    $database = Model::getInstance();
    $query = "SELECT id FROM personne where login = :user";
    $statement = $database->prepare($query);
    $statement->execute([
        'user' => $user
    ]);
    $results = $statement -> fetchAll(PDO::FETCH_COLUMN, 0);
    return $results[0];
    }
    catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
}


}
}
?>
<?php
require_once('Model.php');
require_once('ModelPersonne.php');
class ModelLogin
{
    public static function CheckUser($user, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login = :user AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'user' => $user,
                'password' => $password
            ]);
            $_SESSION['login'] = $user;
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(count($results)>0)
            {
                if ($results[0]["statut"]==0)
                {
                    $_SESSION['type'] = 0;
                    return 0;
                    // 0 admin  
                }
                else if ($results[0]["statut"]==1)
                {
                    $_SESSION['type'] = 1;
                    return 1;
                    //1 client              
                }
            }
            else{
                return -1;
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function UserChecked($user, $password, $statut)
    {
        try {
            
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function Register($nom, $prenom, $user,$password)
    {
        try {
            $id = ModelPersonne::getMaxIDPersonne();
            $database = Model::getInstance();
            $query = "INSERT INTO personne (id, nom, prenom, statut, login, password) VALUES (:id, :nom, :prenom, 1, :user, :password)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'user' => $user,
                'password' => $password
            ]);
            return 1;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
    }
}


}

?>
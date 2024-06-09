<?php
require_once('Model.php');
class ModelLogin
{
    public static function CheckUser($user, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE username = :user AND password = :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'user' => $user,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            if($statement->rowCount() >0)
            {
                if ($results->getStatut() == 0)
                {
                    return "admin";
                }
                else
                {
                    return "client";
                
                }
            }
            else{
                return "error";
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}

?>
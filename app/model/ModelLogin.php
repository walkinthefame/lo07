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
            $results = $statement->fetchAll(PDO::FETCH_COLUMN);
            if(count($results)>0)
            {
                if ($results[0]["statut"]==0)
                {
                    return 0
                }
                else if ($results[0]["statut"]==1)
                {
                    return 1;
                
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
}

?>
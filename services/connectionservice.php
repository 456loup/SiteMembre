<?php
namespace services;

use PDOException;

class ConnectionService
{
    /**
     * @param $pdo \PDO the pdo object
     * @param $likeUsername String the string the username should contain
     * @param $statusId Int the status id
     * @return \PDOStatement the statement referencing the result set
     */
    public function findUsersByUsernameAndStatus($pdo, $likeUsername, $statusId)
    {
        $sql = "select users.id as user_id, username, email, s.name as status, s.id as status_id 
            from users join status s on users.status_id = s.id 
            where username like :likeUsername and status_id = :statusId order by username";
        $searchStmt = $pdo->prepare($sql);
        $searchStmt->execute(['likeUsername' => $likeUsername, 'statusId' => $statusId]);
        return $searchStmt;
    }
    
    
    public function identifiantValide($pdo ,  $identifiant , $motDePasse){
        
        $sql = "Select * from users where Nom=:identifiant and motDePasse=:motDePasse";
        $searchStmt = $pdo->prepare($sql); 
        $searchStmt->execute(['identifiant' => $identifiant , 'motDePasse' => $motDePasse]); 
        
        return $searchStmt; 
    }


    private static $defaultConnexionService ;
    public static function getDefaultConnectionService()
    {
        if (ConnectionService::$defaultConnexionService == null) {
            ConnectionService::$defaultConnexionService = new ConnectionService();
        }
        return ConnectionService::$defaultConnexionService ;
    }
}

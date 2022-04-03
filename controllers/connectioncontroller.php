<?php
namespace controllers;

use services\ConnectionService;
use yasmf\HttpHelper;
use yasmf\View;

class ConnectionController {

    private $connectionService;

    public function __construct()
    {
        $this->connectionService = ConnectionService::getDefaultConnectionService();
    }

    public function index($pdo) {
        $view = new View("views/vueConnection");
        $view->setVar('searchStmt', null );
        return $view;
    }
    
    public function seConnecter($pdo){
        $identifiant = HttpHelper::getParam('identifiant'); 
        $motDePasse = HttpHelper::getParam('motDePasse'); 
        $Valide =  $this->connectionService->identifiantValide($pdo , $identifiant , $motDePasse); 
        if($Valide->rowCount() > 0){
            $view = new View("views/vueClient" , $Valide); 
            $_SESSION['identifiant'] = $identifiant; 
            $_SESSION['motDePasse'] = $motDePasse; 
            return $view;
        }
        
        $erreur = " L IDENTIFIANT ETAIT INCORRECT "; 
        
        echo $erreur; 
        $view2 = new View("views/vueConnection" , $erreur);
        
        return $view2; 
    }
}
?>

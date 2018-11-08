<?php
// Cette classe représente la connexion à la BDD.L'approche Singleton nous permmetra d'etre certain qu'il n'y ait pas plusieurs connexion initilalisées.

namespace Manager;

class PDOManager{
    private static $instance = null; // Contiendra l'instance de notre classe
    protected $pdo; // Contiendra l'instance PDO

    private function __construct(){}
    private function __clone(){}

    public static function getInstance(){

        // Si on a pas encore instancié notre classe
        if(is_null(self::$instance)){
            self::$instance = new self; // revient à faire un new PDOManager
        }
        return self::$instance; // On retourne toujours le me^me objey (avec la référence [1])
    }
    public function getPdo(){
        include __DIR__. '/../../app/Config.php'; // on ressort pour se diriger au bon endroit

        $config = new \Config(); // Config à été déclaré sans namespace dans l'espace global, d'où l'utilisation du '\' devant Config()    
   
        $connect = $config->getParametersConnect(); // On récupère les pâramètre de connexion à travers la config
    

    try{
        $this->pdo = new \PDO("mysql:dbname=" . $connect['dbname'] . ";host=" . $connect['host'], $connect['user'], $connect['password'], array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION) );
        // PDO est une class existante déclaré dans l'espace global d'ou la encore l'utilisation du '\'
    }
    catch(\PDOEXCEPTION $e){  // PDO est une class existante déclaré dans l'espace global d'ou la encore l'utilisation du '\'
        echo 'la connexion a échoué : ' . $e->getMessage();
    }

    return $this->pdo;
    }
}
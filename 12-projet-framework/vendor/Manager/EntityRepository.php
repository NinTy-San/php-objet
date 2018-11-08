<?php
// Un repository centralise tout ce qui touche à la récupération de vos entités. Concretement, vous ne devez pas faire la moindre requete SQL ailleurs que dans un repository (c'est la regle)
// Entity répository ne connait pas "employes" ou autre, il ne connait que les entités. Cela doit donc rester générique afin que cela soit ré-utilisable

namespace Manager;

    // On utilise des 'use' lorsque l'on utilise des classes sans faire de 'new' directement dans le fichier courant
    use Manager\PDOManager; // On a besoin de PDOManager car en utilisant ce namespace, on a cces a tout ce qui est static de Manager\PDOManager. le 'use' déclanche l'autoload pour que la lasse soit chargée et ainsi éviter une erreur

    use PDO; // Nous utilison ce namespace car on utilise les constantes et autres propriétés, function static de la classe PSO

    class EntityRepository{

        private $db;
        public function __construct(){}

        public function getDb(){
            if(!$this->db){
                $this->db = PDOManager::getinstance()->getPdo(); //getInstance() retourne un objet on peut donce mettre une fleche pour appeler une méthode
            }
            return $this->db;
        }
        private function getTableName(){
            return 'employes';
        }
        public function find($id){

            $q = $this->getDb()->query('SELECT * FROM ' . $this->getTableName() .'WHERE id' . ucfirst($this->getTableName() ). '= ' . (int) $id  ); // id employe Le premier champ de notre  table. Caster en 'int' permet d'éviter des erreurs de requête SQL

            $q->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this->getTableName() );
            // PDO::FETCH_CLASS : permet d'instncier un objet (dans notre cas : Entity\Employe)
            //SetFetMode() : perùet de prendre les resultats de la requete et d'affecter les propriétés de l'objet. (Pour cela il faut que l'ortographe des noms de collones (champs) correspondent auxx propriétés de l'objet)

            $r = $q->fetch();

            if( !$r ){
                return false;
            }else{
                return $r;
            }
        }
        public function findAll(){ //permet d'aller chercher toutes les informations sur un empoyé
        $q = $this->getDb()->query('SELECT * FROM ' . $this->getTableName() );

        $q->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' .$this->getTableName());

        $r= $q->fetchAll(); // On récupère un tableau Array compopsé d'objet

        if( !$r ){ // Si la requete ne fonctionne pas
                return false;
            }else{ // Si on
                return $r;
            }
        
        }
        public function register(){

            $q= $this->getDb()->query('INSERT INTO ' . $this->getTableName() . '(' . implode(',', array_keys($_POST) ) . ') VALUES (' . "'" . implode("','", $_POST). "'" . ')');

            //array_keys me permet de parcourir les indices plutot que les valeur pour annoncer les champs

            return $this->getDb()->lastInsertId(); // Dernière identifiant généré
        }
    }




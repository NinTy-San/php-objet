<!-- <style type="text/css"
    div{
        background:blue;
        margin:5px;
        padding:5px;
    }

> -->
<?php
// PDO : Php Data Object
/* 
    Exec() :
        INSERT, UPDATE, DELETE :    Exec() est utilisé pour la formulation de requête de ne retournant pas de resultat.
                                    exec() renvoie le nombre de ligne affectées par la requête.

    Valeur retour : 
        Echec : False (BOOLEAN)
        Succes : 1 (INT), ce nombre peut bien évidement etre supérieur tout dépend du nombre d'enregistrement afecté par la requête
        -----------------------------------------------------------------------------
    
    Query() : 
        SELECT: A l'inverse d'Exec(), Query() est utilisé pour la formulation de rquête retournant un ou plusieurs resultat/
        Valeur retour :
            Echec : False (BOOLEAN)
            Succes : PDOStatement (object)
        ------------------------------------------------------------------------------
    Prepare() -> Execute() : 
    INSERT, UPDATE, DELETE, SELET : prepare() permet de préparer une requête mais ne l'execute pas .
                                    execute() permet d'executer la requête préparée.
    Cette m"thode est ) préconniser si l'on exécute plusieurs fois la même requete et ainsi vouloir éviter le cycle : Analyse / interprétation / exécution
    Valeur retour :
        prepare() renvoie TOUJOURS un PDOStatement (object)
        execute() :
            Echec : False (BOOLEAN)
            Succes : PDOStatement (object)
        ------------------------------------------------------------------------------
    Toutes ces méthodes peuvent prendre un ou des arguments si nécessaire.
    SAUF pour Exec() : $pdo représente mon objet PDO, quand j'exécute une requête PDO, il me retourne un objet PDOStatement (qui n'est donc plus l'objet PDO.. !!) 

    Permet d'afficher les erreurs et la requête apreès execution :
        Pour Exec() ou Query() :
            print <pre>;
                print_r($pdo->errorInfo() ); // sur l'objet PDO
            print </pre>;
        Pour prepare() puis execute() : 
        print_r($resultat->errorInfo() ); // sur l'objet PDOStatement

        Il est interessant d'utiliser Query ou EXEc pour les requete en dur et d'utiliser prepare + execute pour les requete dynamique (incluant du post, get, etc..)
        ----------------------------------------------------------------------------
*/
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise_pole_S', 
                'root', 
                '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
);
// var_dump($pdo);

// print '<pre>';
//     print_r(get_class_methods($pdo));
// print '</pre>';
//-----------------------------------------------------------------------
echo '<h1>SELECT + Query() + fetch()</h1>';

$r = $pdo->query('SELECT * FROM employes'); //$resultat : PDOStatement

// var_dump($r);

// print '<pre>';
//     print_r(get_class_methods($r)); // permet d'afficher les methodes de la propriété PDOStatement
// print '</pre>';

// print '<pre>';
//     print_r(get_object_vars($r)); // permet d'afficher les propriété dde la classe PDOStatement
// print '</pre>';

$donnees = $r->fetch();

// print '<pre>';
//     print_r($donnees);
// print '</pre>';

foreach($donnees as $indice => $contenu){

    echo $indice . ' => ' . $contenu . '<br>';
}
// fetch() ressort la première ligne de resultat et nous effectuons une boucle dessus pour afficher toutes les ligne de chaque champs sur cettre même ligne.
//-----------------------------------------------------------------------
echo '<h2>SELECT + fetch() ne renvoie pas un seul resultat si il est dans une boucle</h2>';

$r = $pdo->query('SELECT * FROM employes'); //$resultat : PDOStatement

while($contenu = $r->fetch() ){
// A chaque tour de boucle, je lis le resultat suivant dans la table suite à ma requête
    echo '<div>';
        echo $contenu['id_employes'] . '<br>';
        echo $contenu['prenom'] . '<br>';
        echo $contenu['nom'] . '<br>';
        echo $contenu['sexe'] . '<br>';
        echo $contenu['service'] . '<br>';
        echo $contenu['date_embauche'] . '<br>';
        echo $contenu['salaire'] . '<br>';
    echo '</div>';
}
//-----------------
echo '<hr><h2>SELECT + Query() + fetchAll() et PDO::FETCH_ASSOC</h2>';
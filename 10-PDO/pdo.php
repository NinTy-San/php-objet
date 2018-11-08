<style type="text/css">
    div{
        background:grey;
        margin:5px;
        padding:5px;
    }

</style>
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
echo '<br><h2>SELECT + fetch() ne renvoie pas un seul resultat si il est dans une boucle</h2>';

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
echo '<br><hr><h2>SELECT + Query() + fetchAll() et PDO::FETCH_ASSOC</h2>';
$r = $pdo->query('SELECT * FROM employes');

$donnees = $r->fetchAll(PDO::FETCH_ASSOC); /// fetchAll() retourne toutes les lignes de resultat dans un tableau multidimentionnel

// print '<pre>';
//     print_r($donnees);
// print '</pre>';

foreach($donnees as $indice => $contenu){
    echo '<div>';
        foreach($contenu as $indice2 => $contenu2){
            echo "$indice2 : $contenu2 <br>";
        }
    echo '</div>';

}
// FOR
echo '<h3>FOR</h3>';
for($i = 0; $i < count($donnees); $i++){
    echo '<div>';
        echo $donnees[$i]['id_employes'] . '<br>';
        echo $donnees[$i]['prenom'] . '<br>';
        echo $donnees[$i]['nom'] . '<br>';
        echo $donnees[$i]['sexe'] . '<br>';
        echo $donnees[$i]['service'] . '<br>';
        echo $donnees[$i]['date_embauche'] . '<br>';
        echo $donnees[$i]['salaire'] . '<br>';
    echo '</div>';
}

echo '<h3>WHILE</h3>';

$i = 0;
while($i < count($donnees)){
       echo '<div>';
        echo $donnees[$i]['id_employes'] . '<br>';
        echo $donnees[$i]['prenom'] . '<br>';
        echo $donnees[$i]['nom'] . '<br>';
        echo $donnees[$i]['sexe'] . '<br>';
        echo $donnees[$i]['service'] . '<br>';
        echo $donnees[$i]['date_embauche'] . '<br>';
        echo $donnees[$i]['salaire'] . '<br>';
    echo '</div>';
    
    $i++;
}
//-------------------------------------------------------------------------------------
echo '<br><hr><h2>SELECT + Query() + fetchAll() + ColumnCount()</h2>';

$resultat = $pdo->query('SELECT * FROM employes', PDO::FETCH_ASSOC); // Ici, on demande d'indexer numeriquement quand c'est toujours au stde d'objet

echo '<table border="1"><tr>';
for($i=0 ; $i<$resultat->columnCount(); $i++){ // columnCount() (methode de PDOStatement) permet de compter le nombre de colonne de ma table 

    $colonne = $resultat->getColumnMeta($i); // getColumnMeta() (methode de PDOStatment) permet de récuperer les infos sur les champs de la table
    echo '<th>' . $colonne['name'] . '</th>';
}
echo '</tr>';
foreach($resultat as $contenu){
    echo '<tr align="center">';
    foreach($contenu as $indice => $info){

        echo '<td>'. $info .'</td>';
    }
    echo '</tr>';
}
echo '</table>';

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Arg Array + prepare() + execute + fetch()</h2>';

$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = ?'); // On prepare notre requête, ici le '?' est un marqueur

$resultat->execute(array("durand")); // "Durand" va remplacer mon marqueur ('?')

print '<pre>';
    print_r($resultat->errorInfo() ); // Si je fais uneerreur sur prepare() ou execute() on demande l'erreur via l'objet PDOStatement
print '</pre>';
var_dump($resultat);

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);
echo '<br>';

$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom'); // :nom est un marqeur 

$resultat->execute(array('nom' => 'chevel'));

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Arg bindParam() + prepare() + execute + fetch()</h2>';
$nom = 'sennard';

$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom'); // :nom est un marqeur 

$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // On précise que bindParam() doit recevoir exclusivelent une variable
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Arg bindParam() + prepare() + execute + fetch()</h2>';
$nom = 'Thoyer';

$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom'); // :nom est un marqeur 

$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // On précise que bindParam() doit recevoir exclusivelent une variable ou une chaine de caractère
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Arg bindValue() + prepare() + execute + fetch() + PDO::FETCH_OBJ</h2>';

$nom = 'perrin';
$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = :name'); // :nom est un marqeur 

$resultat->bindValue(':name',  $nom);
$resultat->execute();

echo '<ul>';
$donnees = $resultat->fetch(PDO::FETCH_OBJ);
    print '<pre>';
        print_r($donnees);
    print '</pre>';
    echo $donnees->prenom;
echo '</ul>';

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Plusieurs execution d\'une même requête</h2>';

// $pdostatement = $pdo->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test' , 'm', 'test', '2012-01-01', 1111)");

// for($i = 0; $i < 3; $i++){
//     $pdostatement->execute();
// }

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>Transaction  + requete et annulation</h2>';
// ATTENTION : Si la transactiopn ne passe pas, il faut supprimer la bdd 'entreprise_pole_S'

    $pdo->beginTransaction(); // Démarre une transaction (desactivé l'auto-commit)

    $resultat = $pdo->query('SELECT * FROM employes', PDO::FETCH_NUM);

    echo '<table border="1"><tr>';
    for($i=0; $i < $resultat->columnCount(); $i++){

        $colonne =$resultat->getColumnMeta($i);
        echo '<th>' . $colonne['name'] . '</th>';
    }
    foreach($resultat as $contenu){
        echo '<tr>';
            foreach($contenu as $indice => $info){

                echo    '<td>' . $info . '</td>';
            }
        echo '</tr>';
    }
    echo '</table>';

    var_dump($pdo->inTransaction() ); // Renvoie true si nous sommes dans une transaction à cet instant précis, sinon false.

    // Si on s'aperçoiut que l'on a fait une erreur et que l'on veux annuler une modification : 
        $pdo->rollBack();

//-------------------------------------------------------------------------------------
echo '<br><hr><h2>FETCH_CLASS</h2>';

class Employes{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}
$r = $pdo->query('SELECT * FROM employes');

$objet = $r->fetchAll(PDO::FETCH_CLASS, 'Employes');

foreach($objet as $employe){
    echo $employe->prenom . '<br>';
}
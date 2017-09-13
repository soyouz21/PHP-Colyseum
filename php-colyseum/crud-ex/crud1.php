<!--PDO:1ère partie; Lire les données-->


<?php
try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'user');//je fais une connection à la base de données (à distance) qui s 'appele colyseum dont le user est root et mon mot de passe est user
}catch(Exception $e){
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());//arrete tout
}

//exercice 1
$resultat = $bdd->query('SELECT * FROM clients');//je cree une variable resultat qui va contenir une requete sur la table clients($bdd=variable qui contient la connection à ma base de donne),query signifie faire un select.

$tableClients = [];//cree un tableau qui ne me sert à rien pour le moment

while ($donnees = $resultat->fetch()){//je fais une boucle while (je cree une variable donnees qui contient une ligne de ma  requete, l'un à la suite de l autre grace au ftech (qui signifie pointer, comme une fleche, ))
$tableClients[$donnees['id']] //ici dans ma table clients, je stock les donnees par leur id car cet id est une donnee unique
    
    = array('firstName' => $donnees['firstName'],// a cet id j associe un tableau qui contient le champ firstname
            'lastName' => $donnees['lastName'], //a cet id j associe un tableau qui contient le champ lastname
            'birthDate'=> $donnees['birthDate'], //a cet id j associe un tableau qui contient le champ birthDate 
            'card'=> $donnees ['card'],//a cet id j associe un tableau qui contient le champ card
            'cardNumber' => $donnees ['cardNumber'] );//a cet id j associe un tableau qui contient le champ cardNumber
}
//exercice 1 autre facon
$sql='SELECT * FROM clients';//variable sql ou je stocke
$resultat=$bdd->query($sql);
$arrAll=$resultat->fetchAll();

//exercice 2
$resultatShowTypes = $bdd->query('SELECT * FROM showTypes');//je cree une variable resultat qui va contenir une requete sur la table showtypes($bdd=variable qui contient la connection à ma base de donne),query signifie faire un select.

$tableShowTypes = [];//cree un tableau qui ne me sert à rien pour le moment

while ($donnees = $resultatShowTypes->fetch()){//je fais une boucle while (je cree une variable donnees qui contient une ligne de ma  requete, l'un à la suite de l autre grace au ftech (qui signifie pointer, comme une fleche, ))
$tableShowTypes[$donnees['id']] //ici dans ma table showtypes, je stock les donnees par leur id car cet id est une donnee unique
    
    = array('type' => $donnees['type']);// a cet id j associe un tableau qui contient le champ type
            
}
//exercice 2 autre facon
$sql='SELECT type FROM showTypes';//variable sql ou je vais stocker "type" de la table showtypes
$resultat=$bdd->query($sql);
$arrAll2=$resultat->fetchAll();

//exercice 3
$VingtPremiers = $bdd->query('SELECT * FROM clients LIMIT 20');//je cree une variable resultat qui va contenir une requete sur la table clients($bdd=variable qui contient la connection à ma base de donne),query signifie faire un select.

$tableVingtPremiers = [];//cree un tableau qui ne me sert à rien pour le moment

while ($donnees = $VingtPremiers->fetch()){//je fais une boucle while (je cree une variable donnees qui contient une ligne de ma  requete, l'un à la suite de l autre grace au ftech (qui signifie pointer, comme une fleche, ))
$tableVingtPremiers[$donnees['id']] //ici dans ma table showtypes, je stock les donnees par leur id car cet id est une donnee unique
    
    = array('firstName' => $donnees['firstName'],// a cet id j associe un tableau qui contient le champ firstname
            'lastName' => $donnees['lastName'], //a cet id j associe un tableau qui contient le champ lastname
            'birthDate'=> $donnees['birthDate'], //a cet id j associe un tableau qui contient le champ birthDate 
            'card'=> $donnees['card'],//a cet id j associe un tableau qui contient le champ card
            'cardNumber' => $donnees['cardNumber'] );//a cet id j associe un tableau qui contient le champ cardNumber
            
}

//exercice 4

$resultatCardNumber = $bdd->query('SELECT * FROM clients');//je cree une variable resultat qui va contenir une requete sur la table clients($bdd=variable qui contient la connection à ma base de donne),query signifie faire un select.

$tableCardNumber = [];//cree un tableau qui ne me sert à rien pour le moment

while ($donnees = $resultatCardNumber->fetch()){//je fais une boucle while (je cree une variable donnees qui contient une ligne de ma  requete, l'un à la suite de l autre grace au ftech (qui signifie pointer, comme une fleche, ))
$tableCardNumber[$donnees['id']] //ici dans ma table card Number, je stock les donnees par leur id car cet id est une donnee unique
    
    = array('cardNumber' => $donnees['cardNumber'] );//a cet id j associe un tableau qui contient le champ cardNumber
            
}

//exercice 5
$resultatClientParM = $bdd->query('SELECT lastName, firstName FROM clients WHERE lastName LIKE "M%" order by lastName asc');

$tableClientParM= [];

while ($donnees= $resultatClientParM->fetch()){
    

$tableClientParM[] //ici dans ma table client par M, je stock les donnees par leur id car cet id est une donnee unique
    
    = array('lastName' => $donnees['lastName'] ,//a cet id j associe un tableau qui contient le champ lastName
            'firstName' => $donnees['firstName'] );

}

//exercice 6
$resultatSpectacleArtisteDateHeure = $bdd->query('SELECT title, performer, date, startTime FROM shows order by title asc');

$tableSpectacle= [];

while ($donnees= $resultatSpectacleArtisteDateHeure->fetch()){
    

$tableSpectacle[] //ici dans ma table spectacle, je stocke les donnees par leur id car cet id est une donnee unique
    
    = array('title' => $donnees['title'] ,//a cet id j associe un tableau qui contient le champ lastName
            'performer' => $donnees['performer'] ,
           'date' => $donnees['date'],
            'startTime' => $donnees['startTime']);

}
//exercice 7
$resultatDonneesPersonnelles = $bdd->query('SELECT * FROM clients');

$tableDonneesPersonnelles= [];

while ($donnees= $resultatDonneesPersonnelles->fetch()){
    

$tableDonneesPersonnelles[$donnees['id']] //ici dans ma table donnees personnelles, je stocke les donnees par leur id car cet id est une donnee unique
    
    = array('firstName' => $donnees['firstName'] ,//a cet id j associe un tableau qui contient le champ lastName
            'lastName' => $donnees['lastName'] ,
           'birthDate' => $donnees['birthDate'],
            'card' => $donnees['card'],
    'cardNumber' => $donnees['cardNumber']);

}

?>

<!DOCTYPE html>

<html>
    <head>
    <title>Exercice Crud-Colyseum</title>
        </head>

<body>
    
    <!--affichage exercice 1-->
       <h1>Afficher tous les clients</h1>
<ul>
    
    <?php
    foreach ($tableClients as $key => $value) {//ici je parcours mon tableau à 2 dimensions, et je stocke l id dans la key et le tableau associé à l id je le stocke dans la $value
        echo "<li>".$value['firstName'].$value['lastName'].$value['birthDate'].$value['card'].$value['cardNumber']."</li>";
    }
    echo "<hr/>";
    ?>
   <!--exercice 1 autre façon-->
    <pre>
    <?php
        print_r($arrAll);
        for ($j=0; $j<25; $j++){//je cree une boucle for pour toutes les lignes
        for ($i=0; $i<6; $i++){//je parcours tous les elements d une ligne
            echo ($arrAll[$j][$i])." ";
            
        }
            echo "</br>";
        }
       
    ?>
    </pre>
  

    
      <!--affichage exercice 2-->
    <h1>Afficher tous les types de spectacles possibles</h1>
    
     <?php
    foreach ($tableShowTypes as $key => $value) {
        echo "<li>".$value['type']."</li>";
    }
    echo "<hr/>";
    ?>
    <!--affichage exercice 2 autre facon-->
    <pre>
    <?php
    print_r($arrAll2);
    for ($i=0; $i<4; $i++){
        echo $arrAll2[$i][0];
    }

    ?>
    </pre>

    
      <!--affichage exercice 3-->
    <h1>Afficher les 20 premiers clients</h1>
    
     <?php
    foreach ($tableVingtPremiers as $key => $value) {
        echo "<li>".$value['firstName'].$value['lastName'].$value['birthDate'].$value['card'].$value['cardNumber']."</li>";
    }
    echo "<hr/>";
    ?>
    
      <!--affichage exercice 4-->
     <h1>Afficher les clients possédant une carte de fidélité</h1>
    
     <?php
    foreach ($tableCardNumber as $key => $value) {
        echo "<li>".$value['cardNumber']."</li>";
    }
    echo "<hr/>";
    ?>
    
      <!--affichage exercice 5-->
    <h1>Afficher les clients dont le nom commence par M</h1>
    
     <?php
    foreach ($tableClientParM as $key => $value) {
        echo "<li>".$value['lastName'].$value['firstName']."</li>";
    }
    echo "<hr/>";
    ?>
    
      <!--affichage exercice 6-->
     <h1>Afficher tous les spectacles,artiste,date et heure par ordre alphabétique</h1>
    
     <?php
    foreach ($tableSpectacle as $key => $value) {
        echo "<li>".$value['title'].$value['performer'].$value['date'].$value['startTime']."</li>";
    }
    echo "<hr/>";
    ?>
     <!--affichage exercice 7-->
     <h1>Afficher tous les clients: Nom, Prénom, Date de naissance, Carte de fidelité, Numéro de carte </h1>
    
     <?php
    foreach ($tableDonneesPersonnelles as $key => $value) {
        echo "<li>".$value['firstName'].$value['lastName'].$value['birthDate'].$value['card'].$value['cardNumber']."</li>";
    }
    echo "<hr/>";
    ?>
    
    </ul>
   
    </body>
</html>
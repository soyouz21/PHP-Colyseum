<?php
try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'user');//je fais une connection à la base de données (à distance) qui s 'appele colyseum dont le user est root et mon mot de passe est user
}catch(Exception $e){
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());//arrete tout
}

$affichageAjax= $bdd->query ('SELECT * FROM clients');
?>



<!DOCTYPE html>

<html>
    <head>
            <script src="ajax.js" type="text/javascript"></script>

    <title>Exercice Ajax</title>
        </head>

<body>
    
    <!--affichage exercice d'ajax-->
       <h1>Afficher tous les clients</h1>
<ul>
    
    <!--<form method="get" action="ajax.js">
        <label for="titre">Titre</label> : <input type="text" name="titre" placeholder="Ex : Dubois" />
       <label for="artiste">Artiste</label> :  <input type="text" name="artiste" placeholder="Ex : Jean"  />
       
        <label for="Date">Date</label> :  <input type="date" name="date" placeholder="Ex : 21/10"/>
    </form>
    -->
     <?php
    foreach ($affichageAjax as $key => $value) {//ici je parcours mon tableau à 2 dimensions, et je stocke l id dans la key et le tableau associé à l id je le stocke dans la $value
        echo "<li>".$value['firstName'].$value['lastName'].$value['birthDate'].$value['card'].$value['cardNumber']."</li>";
    }
    echo "<hr/>";
    ?>
    </ul>
    </body>
</html>

    
    

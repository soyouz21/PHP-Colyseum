<?php
//2 etape:je fais une connection à ma base de donnees PDO= une methode pour acceder a une base de donnee comme msqyli, etc...
try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'user');//je fais une connection à la base de données (à distance) qui s 'appele colyseum dont le user est root et mon mot de passe est user
   // echo "ca fonctionne";
    
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
  //  echo "zut";
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());//arrete tout
}

//exercice 1-->



//4eme étape pour tester mon formulaire: 

if (isset ($_POST["Ex1"])){//je met un isset post "ex1", juste pour avoir l'exercice 1 afficher sans afficher le résultat de l'exercice 2 et du coup dans ma base de données ca n'affichera pas des doublons.J'ai du avant changer le nom de mon de mon input submit dans la partie html (name=Ex1).


if(isset($_POST['nom']) && isset( $_POST['prenom']) && isset($_POST['datedenaissance'])){//je teste SI mes 3 variables sont définis (remplis)
    
    //ici j ai pas besoin de créer une variable pour stocker ma requete car je ne stocke rien ni récupere rien cat j fais un insert, et c est pareil pour update, et delete !!!!je n ai besoin d'une variable pour stocker ma requete que lorsque je fais un select. 
    
    //3ème etape pour récuperer mes données:
$leNom = $_POST['nom'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
$lePreNom = $_POST['prenom'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
$datedeNaissance = $_POST['datedenaissance'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
//$numCarte = $_POST['numCarte'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
//$carteFidelite= $_POST['cartedefidelite'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom


if(isset($_POST['cartedefidelite'])) {//je teste ces valeurs qui ne sont pas obligatoires et je leur attribue que l utilisateur va indique grace à la méthode post( de ma variable $numCarte)
    $carteFidelite=1;//donc ici si la chekbox est "on"(cad,validé,cad 1) alors .....
    $numCarte=$_POST['numCarte'];//....la méthode post va récuperer le numm de la carte insérer par l utilisateur
    
    
}else{
    $carteFidelite=0;//donc ici si la chekbox est "off"(cad,invalidé,cad 0) alors .....
    $numCarte=null;//....ca va afficher null
    
}

   
    $requetePrepare=$bdd->prepare('INSERT INTO clients(lastName,firstName,birthDate,card,cardNumber) 
                VALUES (:lastName,:firstName,:birthDate,:card,:cardNumber)');
       //$bdd->prepare (variable):veut dire que je prepare  la requete que je place dans la variable requetePrepare
       //je fais un insert dans la table client. 
       //Sur la premiere ligne j ai les champs de la base de donne et sur la 2 eme ligne j ai le svariables qui contiennent les noms qui vont etre remplacee par des valeurs grace a ma methode BINDVALUe ici bas,...
    
    
        
    $requetePrepare->bindValue(':lastName',$leNom);//lie une valeur 
    $requetePrepare->bindValue(':firstName',$lePreNom);
    $requetePrepare->bindValue(':birthDate',$datedeNaissance);
    $requetePrepare->bindValue(':card',$carteFidelite);
    $requetePrepare->bindValue(':cardNumber',$numCarte);
    
    $requetePrepare->execute();   
}
}

//if (!empty ($_POST['envoi'])){, ici vient du code d 'emily d'un ex sur github, à revoir plus tard

/*execice 2*/

if (isset ($_POST["Ex2"])){//je met un isset post "ex2", juste pour avoir l'exercice 2 afficher sans refaire l 'exercice 1 avant et du coup dans ma base de donnée ca n'affichera pas des doublons.
    
if(isset($_POST['nom']) && isset( $_POST['prenom']) && isset($_POST['datedenaissance'])){//je teste SI mes 3 variables sont définis (remplis)
    
    //ici j ai pas besoin de créer une variable pour stocker ma requete car je ne stocke rien ni récupere rien car j fais un insert, et c est pareil pour update, et delete !!!!je n ai besoin d'une variable pour stocker ma requete que lorsque je fais un select. 
    
    //3ème etape pour récuperer mes données:
    
$leNom = $_POST['nom'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
$lePreNom = $_POST['prenom'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
$datedeNaissance = $_POST['datedenaissance'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
//$numCarte = $_POST['numCarte'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
//$carteFidelite= $_POST['cartedefidelite'];//la valeur de l input dont le name est NOM est stockée dans ds la variable leNom
    

if(isset($_POST['cartedefidelite'])) {//je teste ces valeurs qui ne sont pas obligatoires et je leur attribue que l utilisateur va indique grace à la méthode post( de ma variable $numCarte)
    $carteFidelite=1;//donc ici si la chekbox est "on"(cad,validé,cad 1) alors .....
    $numCarte=$_POST['numCarte'];//....la méthode post va récuperer le numm de la carte insérer par l utilisateur
    $cardTypesId=$_POST['typeCarte'];

    
    
    
}else{
    $carteFidelite=0;//donc ici si la chekbox est "off"(cad,invalidé,cad 0) alors .....
    $numCarte=null;//....ca va afficher null
    $cardTypesId=null;

    
}
    if(isset($cardTypesId))

   
    $requetePrepareEx2=$bdd->prepare('INSERT INTO clients(lastName,firstName,birthDate,card,cardNumber)
      VALUES (:lastName,:firstName,:birthDate,:card,:cardNumber)');
       //$bdd->prepare (variable):veut dire que je prepare  la requete que je place dans la variable requetePrepare
       //je fais un insert dans la table client. 
       //Sur la premiere ligne j ai les champs de la base de donne et sur la 2 eme ligne j ai le svariables qui contiennent les noms qui vont etre remplacee par des valeurs grace a ma methode BINDVALUe ici bas,...
    
    
        
    $requetePrepareEx2->bindValue(':lastName',$leNom);//lie une valeur 
    $requetePrepareEx2->bindValue(':firstName',$lePreNom);
    $requetePrepareEx2->bindValue(':birthDate',$datedeNaissance);
    $requetePrepareEx2->bindValue(':card',$carteFidelite);
    $requetePrepareEx2->bindValue(':cardNumber',$numCarte);
    
    $requetePrepareEx2->execute(); 
    
    
    $requetePrepareEx2Card=$bdd->prepare('INSERT INTO cards(cardNumber,cardTypesId)
                                           VALUES (:cardNumber,:cardTypesId)');
    $requetePrepareEx2Card->bindValue(':cardNumber',$numCarte);
        $requetePrepareEx2Card->bindValue(':cardTypesId',$cardTypesId);
    
     $requetePrepareEx2Card->execute(); 
}
}
/*exercice3*/

if (isset ($_POST["Ex3"])){
    
    //je teste SI mes 7 variables sont définis (remplis)
    if(isset($_POST['titre']) && isset( $_POST['artiste']) && isset($_POST['date']) && isset($_POST['typeDeSpectacle']) && isset($_POST['premGenre']) && isset($_POST['deuxGenre']) && isset($_POST['heureDeDebut'])){

    //je cree des variables ou je v stocker les entrees de l utilisateur
    $titre=$_POST['titre'];
    $artiste=$_POST['artiste'];
    $date=$_POST['date'];
    $typeDeSpectacle=$_POST['typeDeSpectacle'];
    $premGenre=$_POST['premGenre'];
    $deuxGenre=$_POST['deuxGenre'];
    $duree=$_POST['heureDeDebut'];
    }
    
  
    
    //je prepare ma requete 
    $requetePrepareEx3=$bdd->prepare('INSERT into shows (id, title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (:titre,:artiste,:date,:typeDeSpectacle,:premGenre,:deuxGenre,:duree)');
    
    /*ici j'ai copié la formule dans mon sql de ma base de donnee pour me faciliter la bonne syntaxe
    INSERT INTO shows(`id`, `title`, `performer`, `date`, `showTypesId`, `firstGenresId`, `secondGenreId`, `duration`, `startTime`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
    */
         $requetePrepareEx3->bindValue(':titre',$titre);
     $requetePrepareEx3->bindValue(':artiste',$artiste);
     $requetePrepareEx3->bindValue(':date',$date);
     $requetePrepareEx3->bindValue(':typeDeSpectacle',$typeDeSpectacle);
     $requetePrepareEx3->bindValue(':premGenre',$premGenre);
     $requetePrepareEx3->bindValue(':deuxGenre',$deuxGenre);
     $requetePrepareEx3->bindValue(':heureDeDebut',$duree);

    $requetePrepareEx3->execute();
    
    
}
?>
<!--1ere etape de l'exercice 1, je cree mon formulaire, je mets bien des name, car ils sont important dans ma methode post (je vais les utilse dans mes variables), je n oublie pas de faire une chekbox-->
<!DOCTYPE html>
<html>
    <head>
    <title>Exercice Crud partie 2- colyseum </title>
        </head>
<body>
    <h3>Exercice1</h3>
   <form method="post" action="">
        <label for="nom">Nom</label> : <input type="text" name="nom" placeholder="Ex : Dubois" />
       <label for="prenom">Prénom</label> :  <input type="text" name="prenom" placeholder="Ex : Jean"  />
       
        <label for="datedenaissance">Date de naissance</label> :  <input type="date" name="datedenaissance" placeholder="Ex : Jean"/>
       
        <label for="cartedefidelite">Carte de fidelité</label> :  <input type="checkbox" name="cartedefidelite" placeholder="Ex : Jean" />
       
       <label for="numCarte">Numero de Carte</label> :  <input type="text" name="numCarte" placeholder="Ex : Jean" />
       
    <input type="submit" name="Ex1" value="Envoyer" />
    </form>
    <hr/>
    
    <h3>Exercice2</h3>
    <!--1ere etape de l'exercice 2, je cree mon formulaire, je mets bien des name, car ils sont important dans ma methode post (je vais les utilse dans mes variables), je n oublie pas de faire une chekbox-->
    <form method="post" action="">
        <label for="nom">Nom</label> : <input type="text" name="nom" placeholder="Ex : Dubois" />
       <label for="prenom">Prénom</label> :  <input type="text" name="prenom" placeholder="Ex : Jean"  />
       
        <label for="datedenaissance">Date de naissance</label> :  <input type="date" name="datedenaissance" placeholder="Ex : Jean"/>
       
        <label for="cartedefidelite">Carte de fidelité</label> :  <input type="checkbox" name="cartedefidelite" placeholder="Ex : Jean" />
       
       <label for="numCarte">Numero de Carte</label> :  <input type="text" name="numCarte" placeholder="Ex : Jean" />
        
        <label for="typeCarte">Type de carte</label> :  <input type="text" name="typeCarte" placeholder="Ex : 1,2,3" />
        
        
        
    <input type="submit" name="Ex2" value="Envoyer" />
        
    </form>
    <hr/>
    
    <h3>Exercie3</h3>
    
     <form method="post" action="">
        <label for="titre">Titre</label> : <input type="text" name="titre" placeholder="Ex : Dubois" />
       <label for="artiste">Artiste</label> :  <input type="text" name="artiste" placeholder="Ex : Jean"  />
       
        <label for="Date">Date</label> :  <input type="date" name="date" placeholder="Ex : 21/10"/>
       
        <!--<label for="cartedefidelite">Carte de fidelité</label> :  <input type="checkbox" name="cartedefidelite" placeholder="Ex : Jean" />
       -->
       <label for="typeDeSpectacle">Type de spectacle</label> :  <input type="text" name="typeDeSpectacle" placeholder="Ex : Comédie" />
        
        <label for="1erGenre">1er Genre</label> :  <input type="text" name="1erGenre" placeholder="Ex : 1,2,3" />
         
        <label for="2emeGenre">2eme Genre</label> :  <input type="text" name="2emeGenre" placeholder="Ex : 1,2,3" />
         
        <label for="duree">Duree</label> : <input type="text" name="duree" placeholder="Ex : Dubois" />
         
        <label for="heureDeDebut">Heure de début</label> : <input type="text" name="heureDeDebut" placeholder="Ex : Dubois" />
         
    <input type="submit" name="Ex3" value="Envoyer" />
        
    </form>
    <hr/>
    
    
    
    
    </body>
</html>

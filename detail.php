<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/book_grid.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php
        if(isset($_GET["isbn"])){
            $id=$_GET["isbn"];
          }
        include 'inc/header.php';
        include 'inc/db_conn.php';
         
        ?>
        <!-- MAIN CONTENT -->
<?php

$book = $link->query("SELECT * FROM livre JOIN auteur ON livre.isbn = auteur.isbn JOIN personne ON personne.idPersonne=auteur.idPersonne JOIN roles ON auteur.idRole = roles.idRole JOIN editeur ON editeur.idEditeur = livre.idEditeur WHERE livre.isbn=$id AND roles.role='Ecrivain'")->fetch_assoc();
$traducteur = $link->query("SELECT * FROM livre JOIN auteur ON livre.isbn = auteur.isbn JOIN personne ON personne.idPersonne=auteur.idPersonne JOIN roles ON auteur.idRole = roles.idRole WHERE livre.isbn=$id AND roles.role='Traducteur'")->fetch_assoc();
echo "<div class='book_grille'>";
    echo "<div align ='center' class='titre'><h1><b>".$book['titre']."</b></h1>";
    
    
		
		echo "<img src='img/".$id.".jpg'  height=40% width=40%>";
		echo "<br>";
		echo "<br><p>Auteur: ".$book['prenom']." ".$book['nom']."</p>";
		echo "<p>Traducteur: ".$traducteur['prenom']." ".$traducteur['nom']."</p>";
		echo "<p>Editeur: ".$book['libelleEditeur']."</p>";
		echo "<p>Date de parution: ".$book['annee']."</p>";
		echo "<p>Nombres de pages:".$book['nbpages']."</p>";
		echo "<p>Numéro isbn: ".$id."</p>";
		echo "<p>Résumé:".$book['resume']."</p>";
		?>
    
    <div class="formulaire"><form method="post" action="detail.php">
            
            <br>
            <div align="center">
			<textarea id="comment" name="comment" placeholder="Commenter ce livre" ></textarea><br>
            <button class="formulaire" type="submit">Commenter</button><img src="img/pouce.ico" height=10% width=10%>
            </div>
        </form></div>
    
    </div></div>
    


        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$comment = $_POST["comment"];
        
        
        
		
		
		//$link->query("SELECT numCarte FROM utilisateur WHERE numCarte=$id")->fetch_assoc();
		
     }
        include 'inc/footer.php'; ?>
    </body>
</html>


<?php 
session_start(); ?>

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
        
        include 'inc/header.php';
        include 'inc/db_conn.php';
         
         if(isset($_GET["isbn"])){
            $id=$_GET["isbn"];
          }
         if(isset($_GET["emprunt"])){
            $emprunt=$_GET["emprunt"];
            date_default_timezone_set('Europe/Paris');
			$date = date('Y-m-d');
			$rendu =date('Y-m-d', strtotime($date. ' + 15 days'));
			$link->query('INSERT INTO date VALUES ("'.$date.'")');
			$link->query('INSERT INTO date VALUES ("'.$rendu.'")');
			//$link->query('INSERT INTO emprunt (isbn, idUtilisateur, dateEmpreint, dateRendu) VALUES ('.$id.','.$iduser.',"'.$date.'","'.$rendu.'")');
			if (!$link->query('INSERT INTO emprunt (isbn, idUtilisateur, dateEmpreint, dateRendu,Prolongation) VALUES ('.$id.','.$iduser.',"'.$date.'","'.$rendu.'",0)')) {
				printf("Message d'erreur : %s\n", $link->error);
			}
			//            INSERT INTO emprunt (isbn, idUtilisateur, dateEmpreint, dateRendu) VALUES (9782226186072,1,"2021-03-07","2021-03-22")
          }
          
        ?>
        <!-- MAIN CONTENT -->
<?php

$book = $link->query("SELECT * FROM livre JOIN auteur ON livre.isbn = auteur.isbn JOIN personne ON personne.idPersonne=auteur.idPersonne JOIN roles ON auteur.idRole = roles.idRole JOIN editeur ON editeur.idEditeur = livre.idEditeur WHERE livre.isbn=$id AND roles.role='Ecrivain'")->fetch_assoc();
$L = $link->query("SELECT COUNT(*) AS nblike FROM aime WHERE ISBN=$id")->fetch_assoc();
$traducteur = $link->query("SELECT * FROM livre JOIN auteur ON livre.isbn = auteur.isbn JOIN personne ON personne.idPersonne=auteur.idPersonne JOIN roles ON auteur.idRole = roles.idRole WHERE livre.isbn=$id AND roles.role='Traducteur'")->fetch_assoc();
echo "<div class='book_grille'>";
    echo "<div align ='center' class='titre'><h1><b>".$book['titre']."</b></h1>";
    
    
		$num=$L['nblike'];
		echo "<img src='img/".$id.".jpg'  height=40% width=40%>";
		echo "<br>";
		echo "<br><p>Auteur: ".$book['prenom']." ".$book['nom']."</p>";
		if($book['idLangue']!=2)
		{
			$traducteur = $link->query("SELECT * FROM livre JOIN auteur ON livre.isbn = auteur.isbn JOIN personne ON personne.idPersonne=auteur.idPersonne JOIN roles ON auteur.idRole = roles.idRole WHERE livre.isbn=$id AND roles.role='Traducteur'")->fetch_assoc();
			echo "<p>Traducteur: ".$traducteur['prenom']." ".$traducteur['nom']."</p>";
		}
		echo "<p>Editeur: ".$book['libelleEditeur']."</p>";
		echo "<p>Date de parution: ".$book['annee']."</p>";
		echo "<p>Nombres de pages:".$book['nbpages']."</p>";
		echo "<p>Numéro isbn: ".$id."</p>";
		echo "<p>Résumé:".$book['resume']."</p>";
		
    
    echo '<div class="formulaire"><form method="post" action="detail.php?isbn='.$id.'">';
    ?>
            
            <br>
            <div align="center">
			
            <?php
			//############################
            //$_SESSION['open'] = 1; 
			//session_start();
			//$iduser=1;
			//############################
            if(isset($_SESSION['open'])){
                if($_SESSION['open'] == 1){
					//############################
					$user=$link->query("SELECT * FROM utilisateur WHERE utilisateur=".$_SESSION['username'])->fetch_assoc();
					$iduser=$user['idUtilisateur'];
					//############################
					?>
                    <textarea id="comment" name="comment" placeholder="Commenter ce livre" ></textarea><br>
                    <button class="formulaire" type="submit">Commenter</button>
                    <?php
                    if(isset($_GET["like"]))
                    {
						$jaime= $link->query("SELECT * FROM aime WHERE ISBN=$id AND idUtilisateur=$iduser")->fetch_assoc();
                        $like = $_GET["like"];
                        if((mysqli_num_rows($jaime) > 0))
                        {
								if($like==true)
								{
										$num=$num+1;
										$link->query("INSERT INTO aime VALUES ($id, 1, $iduser)");
								}
						}
						else
						{
							if($like==true)
							{
								if($jaime['Aime']==0)
								{
									$num=$num+1;
									$link->query("UPDATE aime SET Aime = 1 WHERE isbn = $id AND idUtilisateur=$iduser;");
								}
								else
								{
									$num=$num-1;
									//$link->query("UPDATE `livre` SET `likeLivre` = '$num' WHERE `livre`.`isbn` = '$id';");
									$link->query("UPDATE `aime` SET `Aime` = 0 WHERE `isbn` = '$id' AND idUtilisateur='$iduser';");
								}
							}
						}
                    }
                    echo '<a href=detail.php?isbn='.$id.'&amp;like=true><img src="img/pouce.ico" height=10% width=10%></a>'.$num;
                }
            }
            //header('Location:');
            ?>
            </div>
        <br></form></div>
        <?php
        echo '<form action="detail.php?isbn='.$id.'&emprunt=1" method="POST">';
        ?>
                <button class="emprunt" type="submit">Emprunter</button>
            </form>
    
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


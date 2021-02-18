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
        ?>

        <!-- MAIN CONTENT -->

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mdp=$_POST["password"];
        //$mdp=password_hash(($_POST["password"]), PASSWORD_DEFAULT);
/*        $username = $_POST["user_name"];
        echo"$mdp $username";
        $user = $link->query("SELECT mdp FROM utilisateur WHERE utilisateur=$username")->fetch_assoc();
        if($mdp==$username["mdp"])
        {*/
			echo "<table align='center'><tr><th>Livres empruntés</th></tr><tr><td>Titre</td><td>isbn</td><td>Date d'emprunt</td></tr>";
			$livres = $link->query("SELECT titre, livre.isbn AS livreid,dateEmpreint FROM utilisateur JOIN emprunt ON utilisateur.idUtilisateur=emprunt.idUtilisateur JOIN livre ON emprunt.isbn=livre.isbn WHERE utilisateur=$user_name");
			 while($row = mysqli_fetch_array($livres, MYSQLI_ASSOC))
			{
				echo "<tr>";
				echo "oui";
				echo "<td>".$row["titre"]."</td><td>".$row["livreid"]."</td>".$row["dateEmpreint"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
			
		 /*}
		 else{echo"<b>Mot de passe incorect!</b>";}*/

	}
        
        
		
?>

        <?php include 'inc/footer.php'; ?>
    </body>
</html>

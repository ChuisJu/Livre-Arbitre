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
        <link rel="stylesheet" href="./css/login.css">
        <link rel="stylesheet" href="./css/gridn.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php
        include 'inc/header.php';
        ?>

        <!-- MAIN CONTENT -->

        <div class="main">
            <div class="container"><br><br><br>
				<div class ="grille">
		<div class="formulaire"><form method="post" action="inscription.php">
            <fieldset class="formulaire">
                <fieldset class="formulaire">
                <legend>Vos informations de compte</legend>
                
                    <label for="name">Nom :</label><br>
                    <input type="text" id="name" name="name" autofocus required>
                    <br>
                    <label for="first_name">Prénom :</label><br>
                    <input type="text" id="first_name" name="first_name" ><br>
                    <label for="name">Identifiant de la carte bibliothèque :</label><br>
                    <input type="text" id="id" name="id" autofocus required>
                    <br>
                    <label for="name">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" required>
                    <br>

                    
                    
                    

                    <label for="name">Mail :</label><br>
                    <input type="email" id="mail" name="mail" required><br>
					
					<label>Date de Naissance</label><br>
					<label for="anneeNaiss">Année :</label>
					<select name="anneeNaiss" required><br>
					
                  <?php
                  for($i=2020;$i>1920;$i--)
                  {
					echo"<option value='".$i."'>".$i."</option>";
                  }
                  ?>
                  </select>
                  <label for="moisNaiss">Mois :</label>
					<select name="moisNaiss" required><br>
					<?php
                  for($i=1;$i<13;$i++)
                  {
					echo"<option value='".$i."'>".$i."</option>";
                  }
                  ?>
					</select>
					<label for="jourNaiss">Jour :</label>
					<select name="jourNaiss" required><br>
					<?php
                  for($i=1;$i<32;$i++)
                  {
					echo"<option value='".$i."'>".$i."</option>";
                  }
                  ?>
					</select>
                  


               
            </fieldset>
            <br>
            <div align="center">
            <button class="formulaire" type="submit">Confirmer</button></fieldset>
            </div>
        </form></div></div>
        <br><br><br>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>
    </body>
</html>

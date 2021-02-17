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
                
                    <label for="name">Nom d'utilisateur:</label><br>
                    <input type="text" id="name" name="name" autofocus required>
                    <br>
                    <label for="name">Identifiant de la carte bibliothèque :</label><br>
                    <input type="text" id="id" name="id" autofocus required>
                    <br>
                    <label for="name">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" required>
                    <br>
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

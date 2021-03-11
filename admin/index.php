



<?php
    session_start();

    include '../inc/db_conn.php';

    if(isset($_SESSION['open'])){
        if($_SESSION['open'] == 1 && $_SESSION['isAdmin'] == 1){
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/admindex.css">
        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php
        include '../inc/header.php';
        ?>

        <!-- MAIN CONTENT -->

        <div class="container">
            <h1 class="title">Administration</h1>
            <br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Authentification</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Clients</td>
                    <td></td>
                    <td><a href="client.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="client.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                </tbody>
            </table>

            <br>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Catalogue</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Livres</td>
                    <td></td>
                    <td></td>
                    <td><a href="livres.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="livres.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Auteurs</td>
                    <td></td>
                    <td></td>
                    <td><a href="auteurs.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="auteurs.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Genres</td>
                    <td></td>
                    <td></td>
                    <td><a href="genres.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="genres.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Langues</td>
                    <td></td>
                    <td></td>
                    <td><a href="langues.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="langues.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Rôles</td>
                    <td></td>
                    <td></td>
                    <td><a href="roles.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="roles.php?&action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Editeurs</td>
                    <td></td>
                    <td></td>
                    <td><a href="editeurs.php?action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="editeurs.php?action=update&show">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                </tbody>
            </table>

        </div>

        <?php include '../inc/footer.php'; ?>
    </body>
</html>

<?php
        } else{
          echo "Vous n'êtes pas administrateur !\n Vous souhaitez vous connecter en tant qu'administrateur ? Déconnectez-vous et reconnectez-vous en tant qu'administrateur\n\n<a href='../disconnect.php'>Me déconnecter</a>";
        }
    } else{
?> 

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/gridn.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php
        include '../inc/header.php';
        ?>

        <!-- MAIN CONTENT -->

        <div class="main">
            <div class="container"><br><br><br>
                <div class ="grille">
        <div class="formulaire"><form method="post" action="index.php">
            <fieldset class="formulaire">
                <fieldset class="formulaire">
                <legend>Panel Administrateur</legend>
                
                   
                    <label for="name">Nom d'utilisateur :</label><br>
                    <input type="text" id="user_name" name="user_name" autofocus required>
                    <br>
                    <label for="name">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" required>
                    <br>
                    </select>
                  


               
            </fieldset>
            <br>
            <div align="center">
              <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
            </div>
        </form></div></div>
        <br><br><br>

            </div>
        </div>

        <?php include '../inc/footer.php'; ?>
    </body>
</html>

<?php
    }
?>



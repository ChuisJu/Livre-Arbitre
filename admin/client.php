<?php 

include '../inc/config.php';
include '../inc/db_conn.php';

if($_GET['action'] == "add"){

    echo 
    '<!DOCTYPE html>
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
            ';
            
            include "../inc/header.php";

            echo '

            <!-- MAIN CONTENT -->

            <div class="main">
                <div class="container"><br><br><br>
    				<div class ="grille">
    		<div class="formulaire"><form method="post" action="client.php?action=add">
                <fieldset class="formulaire">
                    <fieldset class="formulaire">
                    <legend>Ajoutez un client</legend>

                        <label for="name">Nom d\'utilisateur :</label><br>
                        <input type="text" id="name" name="name" autofocus required>
                        <br>
                        <label for="name">Identifiant de la carte bibliothèque :</label><br>
                        <input type="text" id="id" name="id" autofocus required>
                        <br>
                        <label for="name">Mot de passe :</label><br>
                        <input type="password" id="password" name="password" required>
                        <br>
                </fieldset>
                <br>
                <div align="center">
                    <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
                </div>
            </form></div></div>
            <br><br><br>

                </div>
                <div align="center">
                    <a href="index.php">Revenir sur le panel administrateur</a>
                </div>
            </div>';

            include "../inc/footer.php";

            echo '
        </body>
    </html>';

    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            if(isset($_POST['id'])){
                if(isset($_POST['password'])){
					
					$mot_de_passe=password_hash($_POST['password'],PASSWORD_DEFAULT);
					$nom=password_hash($_POST['name'],PASSWORD_DEFAULT);

                    $sql = 'INSERT INTO utilisateur (`mdp`, `utilisateur`, `numCarte`, `Admin`) VALUES ("' . $mot_de_passe . '", "' . $_POST['name'] . '", "' . $_POST['id'] . '", "0")';
                    $link->query($sql);

                    echo "<script>alert('Client inséré avec succès !');</script>";

                }
            }
        }
    }
}

if($_GET['action'] == "update"){

    if(isset($_GET['show'])){
        $row = mysqli_query($link, 'SELECT * FROM utilisateur');
        
        echo 
        '<!DOCTYPE html>
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
                ';

                include "../inc/header.php";

                echo '

                <!-- MAIN CONTENT -->

                <div class="container">
                    <div align="center">
                    <h1 class="title">Administration</h1>
                </div>

                </br>
';

?>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Identifiant de l'utilisateur</th>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Numéro de carte</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while ($user = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
                ?>
                  <tr>
                    <td><?php echo $user['idUtilisateur'] ?></td>
                    <td><?php echo $user['utilisateur'] ?></td>
                    <td><?php echo $user['mdp'] ?></td>
                    <td><?php echo $user['numCarte'] ?></td>
                    <td>
                    <?php 

                    if($user['Admin'] == 1){
                        echo "Oui";
                    } else{
                        echo "Non";
                    }

                    ?>
                    </td>
                    <td><?php echo '<a href="client.php?action=update&id=' . $user['idUtilisateur'] . '">Modifier <i class="fa fa-pencil"></i></a>'; ?></td>
                    <td><?php echo '<a href="client.php?action=delete&id=' . $user['idUtilisateur'] . '">Supprimer <i class="fa fa-trash"></i></a>'; ?></td>
                  </tr>

                  <?php
                    }
                  ?>
                </tbody>
            </table>
            </br>
            <div align="center">
                    <a href="index.php">Revenir sur le panel administrateur</a>
                </div>
        </div>
<?php

            include "../inc/footer.php";

            echo '
        </body>
    </html>';
                }
    
}

if($_GET['action'] == "delete"){
    if(isset($_GET['id'])){
        
        $intid = (int)$_GET['id'];
        
        $link->query('DELETE FROM utilisateur WHERE idUtilisateur = ' . $intid);
            
        
        echo "<script>alert('Client supprimé avec succès !');</script>";

        header('location: client.php?action=update&show');
    }
}


if($_GET['action'] == "update"){
    if(isset($_GET['id'])){
        
        $intid = (int)$_GET['id'];
        
        $row2 = mysqli_query($link, 'SELECT * FROM utilisateur WHERE idUtilisateur = ' . $intid);
        $user = mysqli_fetch_array($row2, MYSQLI_ASSOC);


        if($user['Admin'] == 1){
            $perms = 'admin';
        } else{
            $perms = 'client';
        }

        echo
        '<!DOCTYPE html>
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
                ';

                include "../inc/header.php";

                echo '

                <!-- MAIN CONTENT -->

                <div class="main">
                    <div class="container"><br><br><br>
                        <div class ="grille">
                <div class="formulaire"><form method="post" action="client.php?action=update&id=' . $intid . '">
                    <fieldset class="formulaire">
                        <fieldset class="formulaire">
                        <legend>Modifier un client</legend>
                            <label for="name">Nom d\'utilisateur :</label><br>
                            <input type="text" id="name" name="username" value="' . $user['utilisateur'] . '" autofocus required>
                            <br>
                            <label for="name">Identifiant de la carte bibliothèque :</label><br>
                            <input type="text" id="id" name="id" value="' . $user['numCarte'] . '" autofocus required>
                            <br>
                            <label for="name">Mot de passe :</label><br>
                            <input type="text" id="password" name="password" value="' . $user['mdp'] . '" required>
                            <br>
                            <label for="name">Permissions ("admin" ou "client") :</label><br>
                            <input type="permissions" id="permissions" name="permissions" value="' . $perms . '" required>
                            <br>
                    </fieldset>
                    <br>
                    <div align="center">
                        <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
                    </div>
                </form></div></div>
                <br><br><br>

                    </div>
                    <div align="center">
                        <a href="index.php">Revenir sur le panel administrateur</a>
                    </div>
                </div>';

                include "../inc/footer.php";

                echo '
            </body>
        </html>';

        if(isset($_POST['submit'])){
            if(isset($_POST['username'])){
                if(isset($_POST['id'])){
                    if(isset($_POST['password'])){ 
                        if(isset($_POST['permissions'])){ 
                            if($_POST['permissions'] == 'admin'){
                                $perm = 1;
                            } elseif($_POST['permissions'] == 'client'){
                                $perm = 0;
                            } else{
                                die('Mauvaise saisie ("admin" ou "client"');
                            }
                            $sql = 'UPDATE utilisateur SET utilisateur = "' . $_POST['username'] . '", numCarte = "' . $_POST['id'] . '", mdp = "' . $_POST['password'] . '", Admin = ' . $perm . ' WHERE idUtilisateur = ' . $intid;
                            $link->query($sql);
                        
                            echo "<script>alert('Client modifié avec succès !');</script>";

                        }
                    }
                }
            }
        }

    }
}
?>

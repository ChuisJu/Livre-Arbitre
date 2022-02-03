
<?php 

include '../inc/config.php';
include '../inc/db_conn.php';

if($_GET['action'] == "add"){

    $lang = mysqli_query($link, 'SELECT * FROM langue');
    $edit = mysqli_query($link, 'SELECT * FROM editeur');
    $genr = mysqli_query($link, 'SELECT * FROM genre');

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
    		<div class="formulaire"><form method="post" action="livres.php?action=add">
                <fieldset class="formulaire">
                    <fieldset class="formulaire">
                    <legend>Ajoutez un livre</legend>

                        <label for="name">ISBN :</label><br>
                        <input type="text" id="isbn" name="isbn" autofocus required>
                        <br>
                        <label for="name">Titre :</label><br>
                        <input type="text" id="titre" name="titre" autofocus required>
                        <br>
                        <label for="name">Annee (Format 2000) :</label><br>
                        <input type="text" id="annee" name="annee" required>
                        <br>
                        <label for="name">Nombre de pages :</label><br>
                        <input type="text" id="nbpages" name="nbpages" required>
                        <br>
                        <label for="name">Résumé du livre :</label><br>
                        <textarea name="resume"></textarea>
                        <br>
                        <label for="name">Langue du livre :</label><br>
                        <select name="langue">
                        <br>
                        
                        
                        ';
                        while ($l = mysqli_fetch_array($lang, MYSQLI_ASSOC)) {?>
                            <option value=<?php echo $l['idLangue'] ?>><?php echo $l['language'] ?></option>
                            
                        <?php } ?>
<?php
            echo '</select>
            </br>
            <label for="name">Editeur du livre :</label><br>
            <select name="editeur">';
            while ($e = mysqli_fetch_array($edit, MYSQLI_ASSOC)) {?>
                <option value=<?php echo $e['idEditeur'] ?>><?php echo $e['libelleEditeur'] ?></option>

            <?php } ?>
<?php
            echo'</select>
            <br>
            <label for="name">Genre du livre :</label><br>
            <select name="genre">';

            while ($g = mysqli_fetch_array($genr, MYSQLI_ASSOC)) {?>
                <option value=<?php echo $g['idGenre'] ?>><?php echo $g['libelle'] ?></option>
                
                


            <?php } ?>

<?php
            echo'</select></fieldset>
                <br>
                <label for="image">Couverture du livre :</label><br>
                <input type="file" name="imgupload"id="imgupload"><br>
                <!--<input type="submit" value="Upload Image" name="submit">-->
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
        if(isset($_POST['isbn'])){
            if(isset($_POST['titre'])){
                if(isset($_POST['annee'])){
                    if(isset($_POST['nbpages'])){
                        if(isset($_POST['resume'])){
							if(isset($_FILES['imgupload'])){

                            $sql = 'INSERT INTO livre (`isbn`, `titre`, `annee`, `nbpages`, `resume`, `idLangue`, `idEditeur`, `idGenre`) VALUES ("' . $_POST['isbn'] . '", "' . $_POST['titre'] . '", "' . $_POST['annee'] . '", "' . $_POST['nbpages'] . '", "' . $_POST['resume'] . '", "' . $_POST['langue'] . '", "' . $_POST['editeur'] . '", "' . $_POST['genre'] . '")';
                            $link->query($sql);
                            
                            $path = "../img/";
							$path = $path . $_GET['isbn'].".png";

							if(move_uploaded_file($_FILES['imgupload']['tmp_name'], $path)) {
							  echo "The file ".  basename( $_FILES['imgupload']['name']). 
							  " has been uploaded";
							} else{
								echo "There was an error uploading the file, please try again!";
							}
						  }
                        }
                    }
                }
            }
        }
    }
}

if($_GET['action'] == "update"){

    if(isset($_GET['show'])){
        $row = mysqli_query($link, 'SELECT * FROM livre');
        
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
                    <th scope="col">ISBN du livre </th>
                    <th scope="col">Titre du livre</th>
                    <th scope="col">Année de sortie</th>
                    <th scope="col">Nombre de pages</th>
                    <th scope="col">Résumé (limité à 100 caractères)</th>
                    <th scope="col">Langue</th>
                    <th scope="col">Editeur</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while ($livre = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
                ?>
                  <tr>
                    <td><?php echo $livre['isbn']; ?></td>
                    <td><?php echo $livre['titre']; ?></td>
                    <td><?php echo $livre['annee']; ?></td>
                    <td><?php echo $livre['nbpages']; ?></td>
                    <td><?php echo substr($livre['resume'], 0, 25) . '...'; ?></td>
                    <td>
                    <?php 

                    // Langue

                    $idLangue = $livre['idLangue'];


                    $row2 = mysqli_query($link, 'SELECT * FROM langue WHERE idLangue = "' . $idLangue . '"');
                    $lang = mysqli_fetch_array($row2, MYSQLI_ASSOC);

                    echo $lang['language'];
                    ?>
                    </td>
                    <td>
                    <?php 

                    // Editeur

                    $idEditeur = $livre['idLangue'];


                    $row3 = mysqli_query($link, 'SELECT * FROM editeur WHERE idEditeur = "' . $idEditeur . '"');
                    $edit = mysqli_fetch_array($row3, MYSQLI_ASSOC);

                    echo $edit['libelleEditeur'];

                    ?>
                    </td>
                    <td>
                    <?php 

                    // Genre

                    $idGenre = $livre['idGenre'];


                    $row4 = mysqli_query($link, 'SELECT * FROM genre WHERE idGenre = "' . $idGenre . '"');
                    $genr = mysqli_fetch_array($row4, MYSQLI_ASSOC);

                    echo $genr['libelle'];

                    ?>
                    </td>
                    <td><?php echo '<a href="livres.php?action=update&isbn=' . $livre['isbn'] . '">Modifier <i class="fa fa-pencil"></i></a>'; ?></td>
                    <td><?php echo '<a href="livres.php?action=delete&isbn=' . $livre['isbn'] . '">Supprimer <i class="fa fa-trash"></i></a>'; ?></td>
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
    if(isset($_GET['isbn'])){
        
        $intid = (int)$_GET['isbn'];
        
        $link->query('DELETE FROM livre WHERE isbn = ' . $intid);
            
        
        echo "<script>alert('Livre supprimé avec succès !');</script>";

        header('location: livres.php?action=update&show');
    }
}


if($_GET['action'] == "update"){
    if(isset($_GET['isbn'])){
        
        $intid = (int)$_GET['isbn'];
        
        $row2 = mysqli_query($link, 'SELECT * FROM livre WHERE isbn = ' . $intid);
        $livre = mysqli_fetch_array($row2, MYSQLI_ASSOC);

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
                <div class="formulaire"><form enctype="multipart/form-data" method="post" action="livres.php?action=update&isbn=' . $intid . '">
                    <fieldset class="formulaire">
                        <fieldset class="formulaire">
                        <legend>Modifier un livre</legend>
                            <label for="name">ISBN :</label><br>
                            <input type="text" id="isbn" name="isbn" value="' . $livre['isbn'] . '" autofocus required>
                            <br>
                            <label for="name">Titre :</label><br>
                            <input type="text" id="titre" name="titre" value="' . $livre['titre'] . '" autofocus required>
                            <br>
                            <label for="name">Année :</label><br>
                            <input type="text" id="annee" name="annee" value="' . $livre['annee'] . '" required>
                            <br>
                            <label for="name">Nombre de pages :</label><br>
                            <input type="text" id="nbpages" name="nbpages" value="' . $livre['nbpages'] . '" required>
                            <br>
                            <label for="name">Résumé :</label><br>
                            <textarea id="resume" name="resume">' . $livre['resume'] . '</textarea>
                            <br>
                            <label for="name">Langue :</label><br>
                            <select name="langue">
';
$lang = mysqli_query($link, 'SELECT * FROM langue');
$i = 1;
while ($l = mysqli_fetch_array($lang, MYSQLI_ASSOC)) {?>
    <option value=<?php echo $l['idLangue'] ?> <?php if($i == $livre['idLangue']){echo "selected";} $i++; ?>><?php echo $l['language'] ?></option>

<?php } ?>

<?php
                        echo '
                            </select>
                            <br>
                            <label for="name">Editeur :</label><br>
                            <select name="editeur">
';
$edit = mysqli_query($link, 'SELECT * FROM editeur');
$i = 1;
while ($e = mysqli_fetch_array($edit, MYSQLI_ASSOC)) {?>
    <option value=<?php echo $e['idEditeur'] ?> <?php if($i == $livre['idEditeur']){echo "selected";} $i++; ?>><?php echo $e['libelleEditeur'] ?></option>

<?php } ?>

<?php
                        echo '
                            </select>
                            <br>
                            <label for="name">Genre :</label><br>
                            <select name="genre">
';
$genr = mysqli_query($link, 'SELECT * FROM genre');
$i = 1;
while ($g = mysqli_fetch_array($genr, MYSQLI_ASSOC)) {?>
    <option value=<?php echo $g['idGenre'] ?> <?php if($i == $livre['idGenre']){echo "selected";} $i++; ?>><?php echo $g['libelle'] ?></option>

<?php } ?>

<?php
                        echo '
                            </select>
                            <br>
                    </fieldset>
                    <br>
                    <input type="file" name="imgupload" id="imgupload">
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

        echo $_POST['editeur'];
        if(isset($_POST['submit'])){
            if(isset($_POST['isbn'])){
                if(isset($_POST['titre'])){
                    if(isset($_POST['annee'])){
                        if(isset($_POST['nbpages'])){
                            if(isset($_POST['resume'])){
                                if(isset($_POST['langue'])){
                                    if(isset($_POST['editeur'])){
                                        if(isset($_POST['genre'])){

                                            $sql = 'UPDATE livre SET isbn = "' . $_POST['isbn'] . '", titre = "' . $_POST['titre'] . '", annee = "' . $_POST['annee'] . '", nbpages = "' . $_POST['nbpages']. '", resume = "' . $_POST['resume']. '", idLangue = "' . $_POST['langue']. '", idEditeur = "' . $_POST['editeur'].  '" WHERE isbn = "' . $intid . '"';
                                            $link->query($sql);

                                            echo "<script>alert('Livre modifié avec succès !');</script>";
                                            
                                        }
                                    }
                                }
                            }
                        }   
                    }
                }
            }
        }

    }
}
?>

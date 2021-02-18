<?php

    include 'inc/config.php';
    include 'inc/db_conn.php'; 

?>

  
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
        <link rel="stylesheet" href="./css/contact.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php include './inc/header.php'; ?>

        <!-- MAIN CONTENT -->

        <div class="con">
            <h1>Contactez-nous !</h1>
            <form action="contact.php" method="POST">
                <input type="text" name="prenom" placeholder="Prenom"><br>
                <input type="text" name="nom" placeholder="Nom"><br>
                <select name="objet">
                    <option value="bug">J'ai trouvé un bug sur votre site !</option>
                    <option value="question">J'ai une question !</option>
                    <option value="idee">J'ai une idée pour votre site !</option>
                    <option value="recrutement">Votre profil m'intéresse !</option>
                    <option value="autre">J'ai une autre demande !</option>
                </select>
                <input type="email" name="mail" placeholder="Email"><br>
                <input type="tel" name="telephone" placeholder="Numéro de téléphone (Exemple : 06 00 00 00 00)"><br>
                <textarea name="commentaire" cols="30" rows="10" placeholder="Votre commentaire"></textarea><br>
                <input type="submit" name="submit"><br><br>
            </form>
        </div>
    
        <?php

        include 'inc/db_conn.php';

        if(isset($_POST['prenom'])){
            if(isset($_POST['nom'])){
                if(isset($_POST['objet'])){
                    if(isset($_POST['mail'])){
                        if(isset($_POST['telephone'])){
                            if(isset($_POST['commentaire'])){
                                if(preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone'])){

                                    $sql = "INSERT INTO formulaire (prenomForm, nomForm, objet, mail, telephone, commentaire) VALUES (?,?,?,?,?,?)";
                                    $query = $link->prepare($sql);
                                    $query->execute([$_POST['prenom'], $_POST['nom'], $_POST['objet'], $_POST['mail'], $_POST['telephone'], $_POST['commentaire']]);
                                    echo "<script>alert('Nous avons bien reçu votre formulaire !');</script>";

                                    header("Location: index.php?success");
                                }
                            }
                        }
                    }
                }
            }
        }
    ?>

        <?php include 'inc/footer.php'; ?>
    </body>
</html>

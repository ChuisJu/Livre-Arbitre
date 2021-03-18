<?php

    include '../inc/db_conn.php';

    session_start();
    
    if(isset($_SESSION['open'])){
        if($_SESSION['open'] == 1){

            $user = $_SESSION['username'];
            $password = $_SESSION['password'];
            $numcarte = $_SESSION['numcarte'];


            ?>

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
      <link rel="stylesheet" href="../css/book_grid.css">
      <link rel="stylesheet" href="../css/index.css">

      <!-- SCRIPT -->

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <title></title>
    </head>
    <body>
      <?php
        include '../inc/header.php';
        include '../inc/db_conn.php';
      ?>
      <div class="main">
        <a> Bonjour <?php echo "$user !"?></a></br>
        <a> Votre numéro de carte est : <?php echo"$numcarte" ?> </a></br>
        <a href="../disconnect.php"> se déconnecter </a><br>
        <a href="emprunt.php">voir les livres empruntés</a><br>
        <!--<a href="avis.php">Voir les livres likés et les commentaires</a>-->
      </div>
      <?php include '../inc/footer.php'; ?>
    </body>
</html>

            <?php
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
                            <legend>Vos idenfiants</legend>
                
                   
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

<?php

  if(isset($_POST['user_name'])){
    if(isset($_POST['password'])){
      if(isset($_POST['submit'])){

        $users = mysqli_query($link, "SELECT utilisateur FROM utilisateur");
        
        
        while ($user = mysqli_fetch_array($users, MYSQLI_ASSOC)) {

          if($user['utilisateur'] == $_POST['user_name']){
          $passwords = mysqli_query($link, 'SELECT mdp FROM utilisateur WHERE utilisateur = "' . $user['utilisateur'] . '"');
            while ($password = mysqli_fetch_array($passwords, MYSQLI_ASSOC)) {
              if($password['mdp'] == $_POST['password']){
                
                if(password_verify($_POST['user_name'],$user['utilisateur'])){
                  $username = $_POST['user_name'];
                  $password = $_POST['password'];

                  $isAdmin = mysqli_query($link, 'SELECT `Admin` FROM utilisateur WHERE utilisateur = "' . $username . '"');
                  $isA = mysqli_fetch_array($isAdmin, MYSQLI_ASSOC);

                  $carteNum = mysqli_query($link, 'SELECT numCarte FROM utilisateur WHERE utilisateur = "' . $username . '"');
                  $carte = mysqli_fetch_array($carteNum, MYSQLI_ASSOC);
                  $idu = mysqli_query($link, 'SELECT idUtilisateur FROM utilisateur WHERE utilisateur = "' . $username . '"');
                  $idU = mysqli_fetch_array($idu, MYSQLI_ASSOC);

                  $_SESSION['open'] = 1;
                  $_SESSION['numcarte'] = $carte['numCarte'];
                  $_SESSION['username'] = $_POST['user_name'];
                  $_SESSION['password'] = $_POST['password'];

                  $_SESSION['isAdmin'] = $isA['Admin'];

                  $_SESSION['idUtilisateur'] = $idU['idUtilisateur'];



                  header('location: ../index.php?connected');

                  die();
                }
              }
              if($password['mdp'] != $_POST['password'])
            {
                echo "<script>alert('Mot de passe ou identifiant incorrect');</script>";
            }

            }
          }
        }
      }
    }
  }


?>
    </body>
</html>

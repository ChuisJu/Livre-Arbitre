<?php

    include '../inc/db_conn.php';

    session_start();
    
    if(isset($_SESSION['open'])){
        if($_SESSION['open'] == 1){

            $user = $_SESSION['username'];
            $password = $_SESSION['password'];
            $numcarte = $_SESSION['numcarte'];
            $initid = $_SESSION['initid'];


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
        </br>
        <div class="main">
        <?php
                    echo '
                <div class="formulaire"><form method="post" action="index.php">
                    <fieldset class="formulaire">
                        <fieldset class="formulaire">
                        <legend>Modifier vos informations</legend>
                            <label for="name">Nom d\'utilisateur :</label><br>
                            <input type="text" id="name" name="username" value="' . $_SESSION['username'] . '" autofocus required>
                            <br>
                            <label for="name">Nouveau de passe :</label><br>
                            <input type="text" id="password" name="password" required>
                            <br>
                    </fieldset>
                    <br>
                    <div align="center">
                        <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
                    </div>
                </form></div>
                </br>
                <center>
                <a href="../disconnect.php">Se déconnecter</a>
                <a href="emprunt.php"> Voir mes emprunts</a>
                </center>
                </div>
                <br><br><br>';

                if(isset($_POST['submit'])){
                  if(isset($_POST['username'])){
                    if(isset($_POST['password'])){ 
                            $sql = 'UPDATE utilisateur SET utilisateur = "' . $_POST['username'] . '", mdp = "' . hash('md5', $_POST['password']) . '" WHERE idUtilisateur = ' . $initid;
                            $link->query($sql);
                        
                            echo "<script>alert('Informations modifiées avec succès !');</script>";
      
                    }
                  }
                }
                ?>
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
  if(isset($_POST['submit'])){
    if(isset($_POST['user_name'])){
      if(isset($_POST['password'])){

        $users = mysqli_query($link, "SELECT utilisateur FROM utilisateur");
        $passwords = mysqli_query($link, "SELECT mdp FROM utilisateur");
        
        while ($user = mysqli_fetch_array($users, MYSQLI_ASSOC)) {

          if($user['utilisateur'] == $_POST['user_name']){

            $pass = md5($_POST['password']);
            while ($password = mysqli_fetch_array($passwords, MYSQLI_ASSOC)) {
              if($pass == $password['mdp']){

                $username = $_POST['user_name'];
                $password = $_POST['password'];

                $isAdmin = mysqli_query($link, 'SELECT `Admin` FROM utilisateur WHERE utilisateur = "' . $username . '"');
                $isA = mysqli_fetch_array($isAdmin, MYSQLI_ASSOC);

                $carteNum = mysqli_query($link, "SELECT numCarte FROM utilisateur WHERE utilisateur = '" . $username . "'");
                $carte = mysqli_fetch_array($carteNum, MYSQLI_ASSOC);

                $id = mysqli_query($link, "SELECT idUtilisateur FROM utilisateur WHERE utilisateur = '" . $username . "'");
                $initid = mysqli_fetch_array($id, MYSQLI_ASSOC);

                $_SESSION['open'] = 1;
                $_SESSION['numcarte'] = $carte['numCarte'];
                $_SESSION['username'] = $_POST['user_name'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['initid'] = $initid['idUtilisateur'];

                $_SESSION['isAdmin'] = $isA['Admin'];
                
                echo("<meta http-equiv='refresh' content='0'>");
              }

            }
          }
        }
      }
    }

  }
?>
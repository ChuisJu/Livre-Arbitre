


<?php

    include '../inc/db_conn.php';

    session_start();

    if(isset($_SESSION['open'])){
        if($_SESSION['open'] == 1){
            
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

        $users = $link->query("SELECT utilisateur FROM utilisateur")->fetchAll();
        $passwords = $link->query("SELECT mdp FROM utilisateur")->fetchAll();

        foreach ($users as $user) {
          if($user == $_POST['user_name']){
            foreach ($passwords as $password) {
              if($password = $_POST['password']){

                $username = $_POST['user_name'];
                $password = $_POST['password'];
                $carteNum = $link->query("SELECT numCarte FROM utilisateur WHERE utilisateur = " . $username)->fetchAll();

                $_SESSION['open'] = 1;
                $_SESSION['numcarte'] = $carteNum;
                
              }

            }
          }


        }
      }
    }
  }

?>
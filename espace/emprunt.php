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
        <?php
         if(isset($_GET["isbn"])){
            $isbn=$_GET["isbn"];
            $emprunt = $link->query("SELECT emprunt.dateRendu AS rendu,emprunt.idUtilisateur as idus FROM emprunt JOIN  utilisateur ON emprunt.idUtilisateur = utilisateur.idUtilisateur WHERE utilisateur.utilisateur = $_Session[‘username’] AND isbn=$isbn")->fetch_assoc();
            $date= $emprunt['rendu'];
            $id=$emprunt['idus'];
            $nouvdate=date('Y-m-d', strtotime($date. ' + 15 days'));
           $link->query('UPDATE emprunt SET dateRendu = "'.$nouvdate.'" WHERE isbn = '.$isbn.' AND idUtilisateur = '.$id);
          }
        ?>

		<div class="container">
            <h1 class="title">Emprunt</h1>
            <br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date d'emprunt</th>
                    <th scope="col">Date de rendu</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$res = $link->query("SELECT livre.isbn AS id,emprunt.dateEmpreint AS emprunt,emprunt.dateRendu AS rendu,livre.titre  AS title FROM emprunt JOIN livre ON emprunt.isbn = livre.isbn JOIN utilisateur ON emprunt.idUtilisateur = utilisateur.idUtilisateur WHERE utilisateur.utilisateur = $_Session[‘username’]");
				if($res)
				{
					
					 while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
					 {
						 
						echo'
						  <tr>
							<td>'.$row['title'].'</td>
							<td>'.$row['emprunt'].'</td>
							<td>'.$row['rendu'].'</td>
							<td></a></td>
							<td><a href="emprunt.php?isbn='.$row['id'].'">Prolonger</a></td>
						  </tr>';
				    }
		      }
                ?>
                </tbody>
            </table>
            
            
        
        <?php include '../inc/footer.php'; ?>
    </body>
</html>

<?php
    }
?>

<?php

 


include 'inc/footer.php'; ?>
    </body>
</html>


<?php

    include '../inc/db_conn.php';

    session_start();
    
    if(isset($_SESSION['open'])){
        if($_SESSION['open'] == 1){

            $user = $_SESSION['username'];
            $password = $_SESSION['password'];
            $numcarte = $_SESSION['numcarte'];


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

        <title>Espace Utilisateur</title>
    </head>
    <body>

        <?php
        include '../inc/header.php';
        ?>

        <!-- MAIN CONTENT -->
        <?php
         
 
          $emprunt = mysqli_query($link, 'SELECT * FROM emprunt e INNER JOIN utilisateur u ON e.idUtilisateur = u.idUtilisateur INNER JOIN livre l ON e.isbn = l.isbn WHERE u.idUtilisateur = '. $_SESSION['idUtilisateur']);
          //$row1 = mysqli_fetch_array($emprunt, MYSQLI_ASSOC);
          //var_dump($row1);
          
          
          
          
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
                    <th scope="col">Prolongation</th>
                  </tr>
                </thead>
                <tbody>
				<?php

				
				
					
					 while($row = mysqli_fetch_array($emprunt, MYSQLI_ASSOC))
					 {
				?>


						  <tr>
							<td><?php echo $row['titre']; ?></td>
							<td><?php echo $row['dateEmpreint']; ?></td>
            
							<?php 
              if ($row['Prolongation'] == 1){
                echo '<td>' . $row['dateRendu'] . '</td>';
              } ?>
              

          <?php
              if ($row['Prolongation'] == 0){
                echo '<td>Pas encore de prolongation de temps</td>';
              }
							if($row['Prolongation']==1){

								echo '<td>Délai déjà prolongé</td>';
							}
							else{

								echo '<td><a href="emprunt.php?isbn='.$row['isbn'].'">Prolonger</a></td>';
							            
				      }
            }

            echo '</tr>';
            if (isset($_GET['isbn'])){
              if ($row['Prolongation'] == 0){
                $prolongation=date('Y-m-d', strtotime($row['dateRendu']. ' + 30 days'));
                $nouvDate = mysqli_query($link, 'SELECT * FROM emprunt');
                $nouvdate = mysqli_fetch_array($nouvDate, MYSQLI_ASSOC);
                $link->query('UPDATE emprunt SET dateRendu = "'.$prolongation.'", prolongation = 1 WHERE isbn = '. $_GET['isbn'] .' AND idUtilisateur = ' . $_SESSION['idUtilisateur']);
              }
            }
          }
    }
          ?>
                </tbody>
            </table>
    
    </body>
</html>



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
                    <td><a href="client.php?action=update">Modifier <i class="fa fa-pencil"></i></a></td>
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
                    <td><a href="infos.php?item=livres&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=livres&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Auteurs</td>
                    <td></td>
                    <td></td>
                    <td><a href="infos.php?item=auteurs&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=auteurs&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Genres</td>
                    <td></td>
                    <td></td>
                    <td><a href="infos.php?item=genres&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=genres&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Langues</td>
                    <td></td>
                    <td></td>
                    <td><a href="infos.php?item=langues&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=langues&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Rôles</td>
                    <td></td>
                    <td></td>
                    <td><a href="infos.php?item=roles&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=roles&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                  <tr>
                    <td>Editeurs</td>
                    <td></td>
                    <td></td>
                    <td><a href="infos.php?item=editeurs&action=add">Ajouter <i class="fa fa-plus"></i></a></td>
                    <td><a href="infos.php?item=editeurs&action=update">Modifier <i class="fa fa-pencil"></i></a></td>
                  </tr>
                </tbody>
            </table>

        </div>

        <?php include '../inc/footer.php'; ?>
    </body>
</html>

<?php

?>
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
        <link rel="stylesheet" href="./css/index.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
<body>
    <?php
        include 'inc/header.php';
        include 'inc/db_conn.php';
    ?>

    <a>Conditions d'utilisations de vos données : <br>
        <ul>
            <ol>L'utilisation de toutes vos données se font dans le respect de la RGPD et de ces règles de conformité</ol>
            <ol>Vos données d'utilisateur sont sécurisées par le biais d'un chiffrage d'information</ol>
            <ol>Conformément à la loi informatique et libertés du 6 janvier 1978, vous pouvez modifier ou demander la suppression de n'importe lesquelles de vos données</ol>
            <ol>Vous avez la possibilité de renseigner dans la page <b>Contact</b> vos informations de contact désirées (ces données servent seulement à envoyer une réponse si nécessaire) </ol>
            <ol>Les informations qui sont demandées lors d'un emprunt </ol>
            <ol>Nous ne vous demanderons pas des données qui seraient inutiles au service et à la qualité du service que nous vous devons.</ol>
        </ul>
    </a>
    <?php include 'inc/footer.php'; ?>
</body>
</html>
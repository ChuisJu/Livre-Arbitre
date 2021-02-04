<!DOCTYPE html>
<html>

    <head> 
        <meta charset="UTF-8">
        <link rel="icon" type="image/ico" href="img/icon.ico"/> 
        <link rel="stylesheet" href="css/livre.css"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>

    <body>

        <h1  class="titre"> Livre Arbitre </h1>

        <div>
            <?php   
                $link = mysqli_connect('localhost','root','');
                mysqli_select_db('', $link);
                if (!$link) {
                    echo "erreur de connexion à la base de données <br>";
                } else {
                    echo "connexion établie <br>";
                }
                // récupéré la date de retour des livres et ajouter une possibilité de rallonger le temps 
            ?>
            <br>
            <p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p><p>Texte pour tester </p>
                
            
        </div>
    </body>

</html>
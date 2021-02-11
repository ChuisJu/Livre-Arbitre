<!DOCTYPE html>
<html lang="fr">

    <head> 
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-ico" href="img/favicon.ico"/> 
        <link rel="stylesheet" href="css/livre.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
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

                $link = mysqli_connect("localhost", "root", "root", "bibliothek");
                mysqli_select_db('bibliothek', $link);
                if(!$link) {
                    echo "Erreur : Impossible de se connecter à MySQL" . PHP_EOL;
                    echo "Errno de débogage: " . mysqli_connect_errno() . PHP_EOL;
                    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }
        
                $req = "SELECT * FROM livre JOIN editeur e ON e.id=livre.editeur JOIN auteur a ON a.idLivre=livre.isbn JOIN personne p ON p.id=livre.editeur ORDER BY isbn";
                $result = mysqli_query($link,$req);
                
                if($result){
                   // echo "SELECT a retourné". mysqli_num_rows($result)." lignes.<br>";
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo "<div id=livre>";
                        echo "<a" . $row["isbn"] . " class=\"test\" </a>";
                        echo "<img src= images./" . $row ["isbn"] . ">";				
                        echo "<p class=\"test\">";
                        echo " ISBN: " . $row["isbn"] ."<br>" ;
                        echo " Nom : " . $row["titre"] . "<br>";
                        echo " Editeur :"  .$row["libelle"] . "<br>";
                        echo " Annee : " . $row["annee"] . "<br>";
                        echo "</p>";
                        echo "</div>";
                    }
                    mysqli_free_result($result);
                    
                }
                mysqli_close($link);
                //récupéré la date de retour des livres et ajouter une possibilité de rallonger le temps 
                
            ?>
            <br>
            <input href="timeup.php" type="button" value="Modifier la date de retour">
            <table>
            <tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p><tr>Texte pour tester </p>
            </table>
            
        </div>
    </body>

</html>
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
        ?>

        <!-- MAIN CONTENT -->

        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="panel1">
                            <?php 
                            echo "[I M A G E]<br>";
                            echo "Titre : <br>";
                            echo "Auteur : <br>";
                            ?> 
                        </div>
                    </div>
                    <div class="col">
                        <div class="panel2">
                            <?php 
                            echo "[I M A G E]<br>";
                            echo "Titre : <br>";
                            echo "Auteur : <br>";
                            ?> 
                        </div>
                    </div>
                    <div class="col">
                        <div class="panel3">
                            <?php 
                            echo "[I M A G E]<br>";
                            echo "Titre : <br>";
                            echo "Auteur : <br>";
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>
    </body>
</html>

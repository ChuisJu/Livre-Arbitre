<!-- NAVBAR -->

<?php include 'config.php'; ?>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
            <a href="./index.php" class="navbar-brand">Livre Arbitre</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse2">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse2">
                <div class="navbar-nav">
                    
                    <a href='<?php echo $CONFIG['root_path'] . "index.php" ?>' class="nav-item nav-link active">Accueil</a>
                    <a href='<?php echo $CONFIG['root_path'] . "livres.php" ?>' class="nav-item nav-link">Livres</a>
                    <a href='<?php echo $CONFIG['root_path'] . "contact.php" ?>' class="nav-item nav-link">Contact</a>
                </div>
                <form class="form-inline ml-auto">
                <div class="navbar-nav">
                    <a href='<?php echo $CONFIG['root_path'] . "login.php" ?>' class="nav-item nav-link">Espace client</a>
                </div>
                </form>
            </div>
        </nav>

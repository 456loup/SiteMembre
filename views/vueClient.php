<?php
spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\HttpHelper;

?>

<h1> Bienvenue monsieur <?php echo $_SESSION['identifiant'] ?> </h1>
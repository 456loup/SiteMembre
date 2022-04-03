<!DOCTYPE html> 

<body>
    <form method="post" action="index.php">
        <h1> Entrez votre identifiant </h1>
        <input type="text" name="identifiant"/>
        <h1> Entrez votre mot de Passe </h1>
        <input type="text" name="motDePasse"/>
        <button type="submit"> Se Connecter </button>
        <input type="text" style="display:none" name="controller" value="Connection">
        <input type="text" style="display:none" name="action" value="seConnecter">
    </form>
</body>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>QR Code Lamache</title>
        <link rel="stylesheet" href="mytask_login.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body class='backgroundbody'>

    <header class="header">
        <br><br>
        <h1 class="textheader">QR Code Lamache</h1>
    </header>
    <section class='sectionlog'>
        <div class="formulaire">
            <p>les code sont par default ce de vos compte moodle </p>
            <form action="index_post.php" method="post">
                <div class="formulaireform">
                    <label class='labelpseudo' for="pseudo">Nom d'utilisateur : </label><input class="input" type="text" name="pseudo" id="pseudo" /><br /><br>
                </div> 
                <div class="formulaireform"> 
                    <label class='labelpseudo' for="mdp">Mot de passe : </label><input class="input" type="password" name="mdp" id="mdp" /><br /><br>
                </div> 
                <div class="formulaireform">
                    <button class="valbouton" type="submit" name="send" value="send">Se connecter</button>
                </div>
                
            </form><br>
            
        </div>
    </section>
    </body>
</html>
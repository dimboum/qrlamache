<?php 

if(isset($_POST['send']) && !empty($_POST['send'])){
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
        if(isset($_POST['mdp']) && !empty($_POST['mdp'])){

            $pseudo = htmlspecialchars($_POST['pseudo']);

            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=qr_lamache;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            session_start();
            $req = $bdd->prepare('SELECT id, nomutlisateur, mdp, statue FROM user WHERE nomutlisateur = :nomutlisateur ');
            $req->execute(array(
                'nomutlisateur' => $pseudo,
                
                
                
            ));
            $resultat = $req->fetch();
            
            
            
            if($resultat['statue'] == "prof" ){
                
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['nomutlisateur'] = $resultat['nomutlisateur'];
                $_SESSION['statue'] = $resultat['statue'];
                header('Location: prof.php');
            }
            elseif($resultat['statue'] == "1prosn")
            {
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['nomutlisateur'] = $resultat['nomutlisateur'];
                $_SESSION['statue'] = $resultat['statue'];
                header('Location: 1prosn.php');
                
            }
            
            else{
                echo 'Mauvais mot de passe';
            }
        }
        else{
            echo('Veuillez entrer votre mot de passe');
        }
    }
    else{
        echo("Veuillez entrer votre Nom d'utilisateur");
    }
}
else{
    echo('Formulaire non soumit');
}
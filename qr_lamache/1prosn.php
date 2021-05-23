<?php

require './bdd.php';
session_start();


if(isset($bdd) && !empty($bdd)){
    if(isset($_SESSION['statue']) && !empty($_SESSION['statue'])){
    
    
    $sql_select_user = $bdd->prepare('SELECT id, idimage, urlqrcode, classe FROM objet WHERE classe = :classe');
    $sql_select_user->execute(array(
        'classe' => $_SESSION['statue']));
    
}
    else{  
        echo 'champ invalides';
        exit;  
    }
}
else{
     
    echo 'champ invalide';
    exit;
}
?>
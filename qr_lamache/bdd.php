<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=qr_lamache;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
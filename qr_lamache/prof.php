<?php
require './bdd.php';
session_start();
if(isset($_FILES['file'])){
        if(isset($_POST['text'])){

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $extensions = ['jpg', 'png', 'jpeg', 'gif' ];

        $maxSize = 10000000;
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            
            $file = $uniqueName.".".$extension;
            $url = htmlspecialchars($_POST['text']);
            $classe = htmlspecialchars($_SESSION['statue']);
            
            move_uploaded_file($tmpName, './upload/'.$file);
            $req = $bdd->prepare('INSERT INTO objet (idimage, urlqrcode, classe) VALUES (?, ?, ?)');
            $req->execute(array($file, $_POST['text'], $_SESSION['statue']));
            $req->closeCursor();
        }
        
    }
    else{
        echo "Une erreur est survenue";
    }
    


}

?>

<!DOCTYPE html>
<html>
<head>
  <title>QR code</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <form action="prof.php" method="POST" enctype="multipart/form-data">
                <label for="file">Fichier</label>
                <input type="file" name="file">
                <input type="text" name="text">
                <button type="submit">Enregistrer</button>
            </form><br>
            <?php 
                $req = $bdd->query('SELECT idimage FROM objet');
                while($data = $req->fetch()){
                    echo "<img src='./upload/".$data['idimage']."' width='300px' ><br>";
                }
            ?>
        </div>
    </section>
    
    </body>
</html>
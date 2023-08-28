<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COURS 2</h1>
    <?php
        $nom = $prenom = $avatar = "";
        $nomErreur = $prenomErreur = $avatarErreur = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            //CAS #2
            //On vient de recevoir le formulaire
            echo "<h1>POST == TRUE </h1>";
            
            if(empty($_POST['nom'])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }
            else{
                $nom = trojan($_POST['nom']);
            }
            

            $prenom = trojan($_POST['prenom']);
            $avatar = trojan($_POST['avatar']);

            //AFFICHER LE RÉSULTAT DE MON FORM
        }
        if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
            // Cas #1 On veut afficher le formulaire
            echo "<h1>On affiche le formulaire </h1>";
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                Nom : <input type="text" name="nom" maxLength="15" value="<?php echo $nom;?>"><br>
                <p style="color:red;"><?php echo $nomErreur; ?></p>

                prenom : <input type="text" name="prenom" value="<?php echo $prenom;?>"> <br>

                Avatar : <input type="text" name="avatar" value="<?php echo $avatar;?>">

                <input type="submit">
            </form>
        <?php
        }

        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
            
            return $data;
        }

    ?>

    
    

</body>
</html>
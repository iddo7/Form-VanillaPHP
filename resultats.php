<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Resultat</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $avatar = $_POST['avatar'];
        }
    ?>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <h1>
                    <?php 
                        echo $prenom . " " . $nom
                    ?>
                </h1>
                <img src="
                    <?php
                        echo $avatar;
                    ?>
                " class="img-fluid">

            </div>
        </div>
    </div>


</body>
</html>
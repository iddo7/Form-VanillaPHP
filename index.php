<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-5">
                <h1 class="mb-4">Porjet 2</h1>

                <?php 
                    $nom = $prenom = $avatar = "";


                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        // FORM WAS SUBMITTED

                        $inputs = array("username", "password", "passwordXtra", "email", "optionGender", "birthday", "transport");

                        if (anyIsEmpty($inputs)) {
                            echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
                        }

                    }
                    else {
                        ?>
                        <form action="
                            <?php 
                                echo htmlspecialchars($_SERVER['PHP_SELF']);
                            ?>
                        " method="post">
                            <div class="input-group">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-3">
                            </div>
                            <div class="input-group">
                                <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control mb-3">
                                <input type="password" id="passwordXtra" name="passwordXtra" placeholder="Vérifier mot de passe" class="form-control mb-3">
                            </div>
                            <div class="input-group">
                                <input type="email" id="email" name="email" placeholder="Adresse courriel" class="form-control mb-3">
                            </div>
                            <div class="input-group">
                                <a href="https://i.pinimg.com/originals/54/91/69/549169ad62f98b3731dd61558a26e6db.jpg">
                                    <button class="btn btn-dark">Avatar</button>
                                </a>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="optionGender" id="optionMale">
                                    <label class="form-check-label" for="optionMale">Masculin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="optionGender" id="optionFemale">
                                    <label class="form-check-label" for="optionFemale">Féminin</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="birthday">Date de naissance</label>
                                <input type="date" id="birthday" name="birthday" class="form-control mb-3">
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="transport">Moyen de transport</label>
                                <select class="form-select" id="transport">
                                    <option selected>Choose...</option>
                                    <option value="auto">Auto</option>
                                    <option value="autobus">Autobus</option>
                                    <option value="marche">Marche</option>
                                    <option value="velo">Vélo</option>
                                </select>
                            </div>

                                


                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        </form>
                        <?php

                    }
                ?>

                <?php 
                
                    function anyIsEmpty($arrayOfInputs) {
                        $result = false;
                        foreach ($arrayOfInputs as $input) {
                            if (empty($_POST[$input])) {
                                $result = true;
                                break;
                            }
                        }
                    }
                
                ?>


            </div>
        </div>
    </div>
</body>
</html>
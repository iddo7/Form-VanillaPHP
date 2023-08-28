<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Porjet 2</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-5">
                <h1 class="mb-4">Porjet 2</h1>

                <?php 
                    // $username = $password = $passwordXtra = $email = $gender = $birthday = $transport = "";
                    $valuesInputed = array(
                        "username" => "",
                        "password" => "",
                        "passwordXtra" => "",
                        "email" => "",
                        "gender" => "",
                        "birthday" => "",
                        "transport" => "default",
                    );

                    $errorOccured = false;
                    $errorEmpty = '';


                    // FORM WAS SUBMITTED
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $inputs = array("username", "password", "passwordXtra", "email", "optionGender", "birthday", "transport");

                        if (anyIsEmpty($inputs)) {
                            $errorOccured = true;
                            $errorEmpty = 'Tous les champs doivent être remplis';
                        }
                        // ADD ISET() to optionGender and check if value is exactly the one we want

                        for ($i = 0; $i < sizeof($inputs); $i++) {
                            $keys = array_keys($valuesInputed);
                            $valuesInputed[$keys[$i]] = trojan($_POST[$inputs[$i]]);
                        }

                        if (!$errorOccured) {
                            foreach($valuesInputed as $value) {
                                echo $value;
                            }
                        }


                    }
                    if ($_SERVER['REQUEST_METHOD'] != 'POST' || $errorOccured == true) {    // maybe enlever '== true'
                        ?>

                        <form action="
                            <?php 
                                echo htmlspecialchars($_SERVER['PHP_SELF']);
                            ?>
                        " method="post">
                            <div class="input-group">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-3" value="<?php echo $valuesInputed['username'];?>">
                            </div>
                            <div class="input-group">
                                <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control mb-3" value="<?php echo $valuesInputed['password'];?>">
                                <input type="password" id="passwordXtra" name="passwordXtra" placeholder="Vérifier mot de passe" class="form-control mb-3" value="<?php echo $valuesInputed['passwordXtra'];?>">
                            </div>
                            <div class="input-group">
                                <input type="email" id="email" name="email" placeholder="Adresse courriel" class="form-control mb-3" value="<?php echo $valuesInputed['email'];?>">
                            </div>
                            <div class="input-group">
                                <a href="https://i.pinimg.com/originals/54/91/69/549169ad62f98b3731dd61558a26e6db.jpg">
                                    <button class="btn btn-dark">Avatar</button>
                                </a>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="optionGender" id="optionMale" value="male">
                                    <label class="form-check-label" for="optionMale">Masculin</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="optionGender" id="optionFemale" value="female">
                                    <label class="form-check-label" for="optionFemale">Féminin</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="birthday">Date de naissance</label>
                                <input type="date" id="birthday" name="birthday" class="form-control mb-3" value="<?php echo $valuesInputed['birthday'];?>">
                            </div>
                            <div class="input-group">
                                <label class="input-group-text" for="transport">Moyen de transport</label>
                                <select class="form-select" id="transport" name="transport">
                                    <option <?php echo $valuesInputed['transport'] == 'default' ? 'selected' : '' ?>>Choose...</option>
                                    <option <?php echo $valuesInputed['transport'] == 'auto' ? 'selected' : '' ?> value="auto">Auto</option>
                                    <option <?php echo $valuesInputed['transport'] == 'autobus' ? 'selected' : '' ?> value="autobus">Autobus</option>
                                    <option <?php echo $valuesInputed['transport'] == 'marche' ? 'selected' : '' ?> value="marche">Marche</option>
                                    <option <?php echo $valuesInputed['transport'] == 'vélo' ? 'selected' : '' ?> value="velo">Vélo</option>
                                </select>
                            </div>

                            <p class="text-danger">
                                <?php 
                                    if ($errorOccured) {
                                        echo $errorEmpty;
                                    }
                                ?>
                            </p>

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

                        return $result;
                    }

                    function trojan($data){
                        $data = trim($data); //Enleve les caractères invisibles
                        $data = addslashes($data); //Mets des backslashs devant les ' et les  "
                        $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
                        
                        return $data;
                    }
                
                ?>


            </div>
        </div>
    </div>
</body>
</html>
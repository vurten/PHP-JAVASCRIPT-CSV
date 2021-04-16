<?php
$nom = "";
$type = "";
$race = "";
$age = "";
$description = "";
$email = "";
$adresse = "";
$ville = "";
$cp = "";
$id = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["nom"]) || !isset($_POST["type"]) || !isset($_POST["age"]) || !isset($_POST["race"])
          || !isset($_POST["description"]) || !isset($_POST["email"]) || !isset($_POST["adresse"])
          || !isset($_POST["ville"]) || !isset($_POST["cp"]) ) {

      http_response_code(400);
      exit;
    }else {

      $nom = $_POST["nom"];
      $type = $_POST["type"];
      $race = $_POST["race"];
      $age = intval($_POST["age"]);
      $description = $_POST["description"];
      $email = $_POST["email"];
      $adresse = $_POST["adresse"];
      $ville = $_POST["ville"];
      $cp = $_POST["cp"];

      ecrire($id, $nom, $type, $race, $age, $description, $email, $adresse, $ville, $cp);

      header("Location: ./confirmation.php?", true, 303);
      exit;
    }


}

function cptLigne(){
    $f = fopen("../animaux.csv", "r");
    $cpt = 0;
    while (($line = fgetcsv($f)) !== false) {
      $cpt++;
    }
    fclose($f);
    return $cpt;
}

function ecrire($id, $nom, $type, $race, $age, $description, $email, $adresse, $ville, $cp){
    $id = cptLigne();
    $fichier = fopen('../animaux.csv', 'a');
    fwrite($fichier, "X" . $id . "," . $nom . "," . $type . "," . $race . ",". $age . ",". $description . ",".
              $email . ",". $adresse . ",". $ville . ",". $cp . "\n");
    fclose($fichier);
}


 ?>

<!DOCTYPE html>


<html lang="fr">

  <head>
      <meta charset="UTF-8">
      <title> Adoption d'animaux de compagnie </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../CSS/index.css">
      <script src="../JS/traitement.js"></script>
  </head>

  <header>
    <div class="jumbotron">
        <h1>Adopte ton Pitou !
            <img src="../IMG/bandit.png" class="img-fluid" alt="logo"> </img>
        </h1>
    </div>
  </header>

  <body>

    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="./acceuil.php">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./formulaire.php">Mise en Adoption</a>
      </li>
    </ul>
    <br>


    <div class="container">
      <h2>Formulaire pour Adoption de Pitou</h2><br>
      <form action="./formulaire.php" method="post" onsubmit="return valide()">
        <div class="form-group">
          <label for="nom">Nom du Pitou : </label>
          <input type="text" class="form-control" value="<?php echo $nom;?>" id="nom" name="nom">
          <small id="erreur-nom"></small>
        </div>
        <div class="form-group">
          <label for="type">Type du Pitou :</label>
          <input type="text" class="form-control" id="type" value="<?php echo $type;?>" name="type">
          <small id="erreur-type"></small>
        </div>
        <div class="form-group">
          <label for="race">Race du Pitou :</label>
          <input type="text" class="form-control" id="race" value="<?php echo $race;?>" name="race">
          <small id="erreur-race"></small>
        </div>
        <label for="age">&Acirc;ge du Pitou : </label>
        <select class="form-control" id="age" value="<?php echo $age;?>" name="age">
          <?php
            for($i = 0; $i < 31; $i++) {
              if ($i == $age) {
                $selected = "selected='selected'";
              } else {
                $selected = "";
              }
              echo "<option value='{$i}' {$selected}>{$i}</option>";
            }
          ?>
        </select><br>
        <div class="form-group">
          <label for="description">Description du Pitou :</label>
          <textarea class="form-control" id="description" name="description" value="<?php echo $description;?>" rows="4"></textarea>
          <small id="erreur-description"></small>
        </div>
        <div class="form-group">
          <label for="email">Email du Papa Pitou :</label>
          <input type="text" class="form-control" value="<?php echo $email;?>" id="email" name="email">
          <small id="erreur-email"></small>
        </div>

        <div class="form-group">
          <label for="adresse">Addresse du Pitou :</label>
          <input type="text" class="form-control" value="<?php echo $adresse;?>" id="adresse" name="adresse">
          <small id="erreur-adresse"></small>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ville">Ville :</label>
            <input type="text" class="form-control" id="ville" value="<?php echo $ville;?>" name="ville">
            <small id="erreur-ville"></small>
          </div>

          <div class="form-group col-md-6">
            <label for="cp">Code Postal:</label>
            <input type="text" class="form-control" id="cp" value="<?php echo $cp;?>" name="cp">
            <small id="erreur-cp"></small>
          </div>
        </div>

        <input type="submit" class="btn btn-primary" name="envoyer" value="Envoyer">
        <br><br><br>
      </form>
    </div>



  </body>

  </html>

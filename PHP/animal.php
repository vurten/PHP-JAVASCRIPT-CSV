
<?php

function afficher(){
  echo "<strong>Nom du Pitou : </strong>" . str_replace("-", " ",$_GET["nom"]) . "<br>" .
          "<strong>Type du Pitou : </strong>" . str_replace("-", " ",$_GET["type"]) . "<br>" .
          "<strong>Race du Pitou : </strong>" . str_replace("-", " ",$_GET["race"]) . "<br>" .
          "<strong>Age du Pitou : </strong>" . $_GET["age"] . "<br>" .
          "<strong>Description du Pitou : </strong>" . str_replace("-", " ",$_GET["description"]) . "<br>" .
          "<strong>Email du papa Pitou: </strong>" . $_GET["email"] . "<br>" .
          "<strong>Adresse du Pitou : </strong>" . str_replace("-", " ",$_GET["adresse"]) . "<br>" .
          "<strong>Ville du Pitou : </strong>" . str_replace("-", " ",$_GET["ville"]) . "<br>" .
          "<strong>Code Postal du Pitou : </strong>" . str_replace("-", " ",$_GET["cp"]) . "<br>";
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

    <p class="text-center"> <?php afficher();
        echo "<br>";
        echo "<a href='mailto:". $_GET["courriel"]  ."'>Contacter le Pitou !</a>"
        ?>
   </p>




  </body>

  </html>

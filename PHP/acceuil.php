
<?php

$animaux=[];
$erreurMessage = "";

function data(){
    $f = fopen("../animaux.csv", "r");
    $cpt = 0;
    $i = 0;
    while (($line = fgetcsv($f)) !== false) {
        if ($cpt >0){
            foreach ($line as $cell) {
                  $animaux[$i]=[
                    [
                        'id' => $line[0],
                        'nom' => $line[1],
                        'type' => $line[2],
                        'race' => $line[3],
                        'age' => $line[4],
                        'description' => $line[5],
                        'email' => $line[6],
                        'adresse' => $line[7],
                        'ville' => $line[8],
                        'cp' => $line[9]
                    ]
                  ];
                  $i++;
                  break;
              }
        }
    $cpt++;
    }
  fclose($f);
  return $animaux;
}


function afficher($animaux, $nbr){

  return str_replace(" ", "-", "./animal.php?nom=" . trim($animaux[$nbr][0]['nom']) . "&type=" . trim($animaux[$nbr][0]['type'])
      . "&race=" . trim($animaux[$nbr][0]['race']) ."&age=" . trim($animaux[$nbr][0]['age']) . "&description=" .
      trim($animaux[$nbr][0]['description']) . "&email=" . trim($animaux[$nbr][0]['email']) . "&adresse=" .
      trim($animaux[$nbr][0]['adresse']) . "&ville=" . trim($animaux[$nbr][0]['ville']) . "&cp=" .
      trim($animaux[$nbr][0]['cp']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["recherche"])) {

      http_response_code(400);
      exit;
    }else {

      $mot = $_POST["recherche"];

      $resultatRecherche = rechercher(strtolower(trim($mot)));
      if (empty($_POST["recherche"]) || empty($resultatRecherche[0])){
        $erreurMessage = $erreurMessage . "Oups ! on a pas encore ce que vous cherchez... Veuillez rechercher autre chose !";
      }else{

      header("Location: " . afficherRecherche($resultatRecherche), true, 303);
      exit;
    }
  }




}

function afficherRecherche($resultatRecherche){
  return str_replace(" ", "-", "./recherche.php?nom=" . trim($resultatRecherche[0][0]['nom']) . "&type=" . trim($resultatRecherche[0][0]['type'])
      . "&race=" . trim($resultatRecherche[0][0]['race']) ."&age=" . trim($resultatRecherche[0][0]['age']) . "&description=" .
      trim($resultatRecherche[0][0]['description']) . "&email=" . trim($resultatRecherche[0][0]['email']) . "&adresse=" .
      trim($resultatRecherche[0][0]['adresse']) . "&ville=" . trim($resultatRecherche[0][0]['ville']) . "&cp=" .
      trim($resultatRecherche[0][0]['cp']));
}

function rechercher($mot){
    $f = fopen("../animaux.csv", "r");
    $cpt = 0;
    $cptBreak = 0;
    while (($line = fgetcsv($f)) !== false) {
        if ($cpt >0){
            foreach ($line as $cell) {
              for($i =0 ; $i < 10 ; $i++){

                if (strtolower(trim($mot)) == strtolower(trim($line[$i]))){
                  $animaux[0]=[
                    [
                        'id' => $line[0],
                        'nom' => $line[1],
                        'type' => $line[2],
                        'race' => $line[3],
                        'age' => $line[4],
                        'description' => $line[5],
                        'email' => $line[6],
                        'adresse' => $line[7],
                        'ville' => $line[8],
                        'cp' => $line[9]
                    ]
                  ];

                  break;
                  $cptBreak++;
                }
              }
              if($cptBreak > 0){
                break;
              }

              }
              if($cptBreak > 0){
                break;
              }
        }
    $cpt++;
    }
  fclose($f);
  return $animaux;
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
      <form class="form-inline" action="./acceuil.php" method="post" target="_blank">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="recherche" id="recherche" aria-label="Search">
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="Rechercher un Pitou" value="Rechercher un Pitou">
      </form>
    </ul>

    <br>


    <div class="container">
      <?php if (!empty($erreurMessage)) {
          echo "<small style=\"color: red\">{$erreurMessage}</small>";
      }
      ?>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Type</th>
      <th>race</th>
      <th>Lien</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <?php $animaux = data(); ?>
    <?php shuffle($animaux) ?>
    <?php
    echo "<tr>";
    echo "<td> " . $animaux[0][0]['nom'] . "</td>";
    echo "<td> " . $animaux[0][0]['type'] . "</td>";
    echo "<td> " . $animaux[0][0]['race'] . "</td>";
    echo "<td> " . "<a class='card-link' href=" . afficher($animaux,0) . ">En Savoir Plus</a>" . "</td>";
    echo "</tr>\n";
    echo "<tr>";
    echo "<td> " . $animaux[1][0]['nom'] . "</td>";
    echo "<td> " . $animaux[1][0]['type'] . "</td>";
    echo "<td> " . $animaux[1][0]['race'] . "</td>";
    echo "<td> " . "<a class='card-link' href=" . afficher($animaux,1) . ">En Savoir Plus</a>" . "</td>";
    echo "</tr>\n";
    echo "<tr>";
    echo "<td> " . $animaux[2][0]['nom'] . "</td>";
    echo "<td> " . $animaux[2][0]['type'] . "</td>";
    echo "<td> " . $animaux[2][0]['race'] . "</td>";
    echo "<td> " . "<a class='card-link' href=" . afficher($animaux,2) . ">En Savoir Plus</a>" . "</td>";
    echo "</tr>\n";
    echo "<tr>";
    echo "<td> " . $animaux[3][0]['nom'] . "</td>";
    echo "<td> " . $animaux[3][0]['type'] . "</td>";
    echo "<td> " . $animaux[3][0]['race'] . "</td>";
    echo "<td> " . "<a class='card-link' href=" . afficher($animaux,3) . ">En Savoir Plus</a>" . "</td>";
    echo "</tr>\n";
    echo "<tr>";
    echo "<td> " . $animaux[4][0]['nom'] . "</td>";
    echo "<td> " . $animaux[4][0]['type'] . "</td>";
    echo "<td> " . $animaux[4][0]['race'] . "</td>";
    echo "<td> " . "<a class='card-link' href=" . afficher($animaux,4) . ">En Savoir Plus</a>" . "</td>";
    echo "</tr>\n";
    ?>
  </tbody>
</table>
</div>

  </body>

  </html>

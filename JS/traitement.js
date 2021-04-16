
const messVirgule = "il ne faut pas inclure de virgule !";

function valide() {

  return validerNom() && type() &&race() &&description() &&
  email() &&adresse() && ville() &&cp();
}


function virgule(text){
  if(text.includes(',')){
    return true;
  }
  return false;
}

function adresse(){
  var adresse = document.getElementById("adresse").value;

  if (adresse === "" || adresse == null){
    document.getElementById("erreur-adresse").innerHTML = "Veuillez remplir l'adresse";
    document.getElementById("erreur-adresse").style.color = "red";
    return false;

  }else if(virgule(adresse)){
    document.getElementById("erreur-adresse").innerHTML = messVirgule;
    document.getElementById("erreur-adresse").style.color = "red";
    return false;
  }
  return true;
}

function cp(){
  var cp = document.getElementById("cp").value;
  var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;

  if (cp === "" || cp == null){
    document.getElementById("erreur-cp").innerHTML = "Veuillez remplir le code postal";
    document.getElementById("erreur-cp").style.color = "red";
    return false;

  }else if(virgule(cp)){
    document.getElementById("erreur-cp").innerHTML = messVirgule;
    document.getElementById("erreur-cp").style.color = "red";
    return false;
  }else if(!regex.test(cp)){
    document.getElementById("erreur-cp").innerHTML = "Veuillez entrer un code postal canadien valide ex : A1A 1A1 ou A1A-1A1 ou A1A1A1";
    document.getElementById("erreur-cp").style.color = "red";
    return false;
  }

  return true;
}

function ville(){
  var ville = document.getElementById("ville").value;

  if (ville === "" || ville == null){
    document.getElementById("erreur-ville").innerHTML = "Veuillez remplir la ville";
    document.getElementById("erreur-ville").style.color = "red";
    return false;

  }else if(virgule(ville)){
    document.getElementById("erreur-ville").innerHTML = messVirgule;
    document.getElementById("erreur-ville").style.color = "red";
    return false;
  }
  return true;
}

function type(){
  var type = document.getElementById("type").value;

  if (type === "" || type == null){
    document.getElementById("erreur-type").innerHTML = "Veuillez remplir le type";
    document.getElementById("erreur-type").style.color = "red";
    return false;

  }else if(virgule(type)){
    document.getElementById("erreur-type").innerHTML = messVirgule;
    document.getElementById("erreur-type").style.color = "red";
    return false;
  }
  return true;
}

function race(){
  var race = document.getElementById("race").value;

  if (race === "" || race == null){
    document.getElementById("erreur-race").innerHTML = "Veuillez remplir la race";
    document.getElementById("erreur-race").style.color = "red";
    return false;

  }else if(virgule(race)){
    document.getElementById("erreur-race").innerHTML = messVirgule;
    document.getElementById("erreur-race").style.color = "red";
    return false;
  }
  return true;
}

function description(){
  var description = document.getElementById("description").value;

  if (description === "" || description == null){
    document.getElementById("erreur-description").innerHTML = "Veuillez remplir la description";
    document.getElementById("erreur-description").style.color = "red";
    return false;

  }else if(virgule(description)){
    document.getElementById("erreur-description").innerHTML = messVirgule;
    document.getElementById("erreur-description").style.color = "red";
    return false;
  }
  return true;
}

function validerNom(){
  var nom = document.getElementById("nom").value;

  if (nom === "" || nom == null){
    document.getElementById("erreur-nom").innerHTML = "Veuillez remplir le nom";
    document.getElementById("erreur-nom").style.color = "red";
    return false;
  }else if(virgule(nom)) {
    document.getElementById("erreur-nom").innerHTML = messVirgule;
    document.getElementById("erreur-nom").style.color = "red";
    return false;
  } else if(nom.length < 3 || nom.length > 20){
    document.getElementById("erreur-nom").innerHTML = "le nom doit avoir entre 3 et 20 caracteres";
    document.getElementById("erreur-nom").style.color = "red";
    return false;
  }

  return true;
}

function validateEmail(email){
  var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;

  if (regexEmail.test(email)) {
      return true;
  }else {
      return false;
  }
}

function email(){
  var email = document.getElementById("email").value;


  if(email === "" || email == null){
    document.getElementById("erreur-email").innerHTML = "Veuillez remplir l'email !";
    document.getElementById("erreur-email").style.color = "red";
    return false;

  }else if(!validateEmail(email)){
    document.getElementById("erreur-email").innerHTML = "Veuillez entrer un email valide ! example@example.ca";
    document.getElementById("erreur-email").style.color = "red";
    return false;

  }else if(virgule(email)){
    document.getElementById("erreur-email").innerHTML = messVirgule;
    document.getElementById("erreur-email").style.color = "red";
    return false;
  }

  return true;

}

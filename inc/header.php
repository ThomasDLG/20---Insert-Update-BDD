<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <title><?php echo $title; ?></title>
</head>
<body>

<?php


if(!empty($_POST)) {
$nberror = 0;

$prenom = htmlentities($_POST["floatingSurname"]);
$nom = htmlentities($_POST["floatingName"]);
$email = htmlentities($_POST["floatingEmail"]);

if(empty($nom)) {
    $error["Nom"][] = "Veuillez indiquer votre nom";
    $nberror++;
}

if(empty($prenom)) {
    $error["Prenom"][] = "Veuillez indiquer votre prénom";
    $nberror++;
}

if(empty($email)) {
    $error["Email"][] = "Veuillez indiquer votre email";
    $nberror++;
}

if (filter_var($email , FILTER_VALIDATE_EMAIL)) {
    $msgEmail = "Email valide";
} else {
    $error["Mail"][] = "Veuillez indiquer un email valide";
    $nberror++;
}
if($nberror == 0) {

    $log_insert = $log->prepare("INSERT INTO `users` (prenom, nom, email) VALUES (?, ?, ?)");
    $log_insert->execute(array(
        $prenom,
        $nom,
        $email,
    ));

}
}

?>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Envoie d'informations vers la base de données avec PhP</h1>
        <p class="col-lg-10 fs-4">Bootstrap 5.0</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="index.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingSurname" name="floatingSurname" placeholder="Prénom">
            <label for="floatingSurname">Prénom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingName" name="floatingName" placeholder="Nom">
            <label for="floatingName">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEmail" name="floatingEmail" placeholder="name@example.com">
            <label for="floatingEmail">Email</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Enregistrer</button>
          <hr class="my-4">
          <small class="text-muted">Enregistrer vos informations dans le tableau.</small>
        </form>
      </div>
    </div>
  </div>
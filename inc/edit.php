<?php
include("config.php");

$id = $_POST["floatingId"];
$updateprenom = htmlentities($_POST["floatingEditSurname"]);
$updatenom = htmlentities($_POST["floatingEditName"]);
$updateemail = htmlentities($_POST["floatingEditEmail"]);

if(empty($updatenom)) {
    header('location: ../index.php');
exit();
}

if(empty($updateprenom)) {
    header('location: ../index.php');
exit();
}

if(empty($updateemail)) {
    header('location: ../index.php');
exit();
}

if (filter_var($updateemail , FILTER_VALIDATE_EMAIL)) {

} else {
    header('location: ../index.php');
exit();
}

$update = "UPDATE `users` SET prenom='$updateprenom', nom='$updatenom', email='$updateemail' WHERE `id` = $id";
$sth = $log->prepare($update);
$sth->execute();
header('location: ../index.php');
exit();


// $update = $log->prepare("UPDATE `users` SET prenom=:prenom, nom=:nom, email=:email WHERE `id` = $id");

// $update->bindParam(':prenom', $updateprenom);
// $update->bindParam(':nom', $updatenom);
// $update->bindParam(':email', $updateemail);




<?php
include("config.php");
$id = $_GET['id'];
$delete = "DELETE FROM `users` WHERE `id` = $id";
$sth = $log->prepare($delete);
$sth->execute();
header('location: ../index.php');
exit();

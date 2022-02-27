<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$sqlDelete = 'DELETE FROM students WHERE id = ?;';
$prepareStatement = $pdo->prepare($sqlDelete);
$prepareStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($prepareStatement->execute());

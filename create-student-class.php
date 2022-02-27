<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();
try {
    $aStudent = new Student(null, 'Rafael Dom', new DateTimeImmutable('1991-06-19'));

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(null, 'Ann Dom', new DateTimeImmutable('1993-03-23'));

    $studentRepository->save($anotherStudent);

    $connection->commit(); // savar no banco
// $connection->rollBack(); // desfazer transações
} catch (PDOException $error) {
    echo $error->getMessage();
    $connection->rollBack();
}

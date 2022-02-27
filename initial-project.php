<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Rafael Domingues',
    new DateTimeImmutable('1991-06-19')
);

echo $student->age();

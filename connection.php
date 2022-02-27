<?php

$pathDB = __DIR__ . '/database.sqlite';
$pdo = new PDO("sqlite:$pathDB");

echo 'Connected';

$pdo->exec("INSERT INTO phones (area_code, number, student_id) 
    VALUES ('11', '23213453', 1), ('11', '954657839', 1);");

$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY, 
        name TEXT, 
        birth_date TEXT);
    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );    
';

$pdo->exec($createTableSql);

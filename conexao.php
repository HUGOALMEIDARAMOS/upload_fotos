<?php

$host  = "localhost";
$db    = "galeria";
$user  = "hugo";
$pass  = "Hug@2010";
$drive = "mysql:host={$host};dbname={$db}";

try {

    $pdo = new PDO($drive, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

} catch (\Exception $e) {
    throw $e;
}

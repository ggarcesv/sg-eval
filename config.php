<?php
/**
 * Created by PhpStorm.
 * User: arkurogane
 * Date: 29-12-2017
 * Time: 14:24
 */

$dbHost='localhost';
$dbName='cursophp';
$dbUser='root';
$dbPass='';

try
{
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e)
{
    echo $e->getMessage();
}
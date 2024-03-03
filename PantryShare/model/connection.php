<?php

$dsn = "mysql:hose=localhost;dbname=pantryshare";
$username = "root";
$password = "";

try{

    $pdo = new PDO($dsn, $username, $password);
    $db = $pdo;
}
catch(PDOException $e)
{
    echo("Connection Refused");
}

?>
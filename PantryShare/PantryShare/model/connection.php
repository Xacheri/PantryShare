<?php

$dsn = "mysql:hose=localhost;dbname=pantryshare";
$username = "root";
$password = "";

try{

    $pdo = new PDO($dsn, $username, $password);

}
catch(PDOException $e)
{
    echo("Connection Refused");
}

?>
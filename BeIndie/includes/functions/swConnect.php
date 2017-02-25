<?php

$user = "root";
$pw = "";
$server = "localhost";
$db = "beindie";
$conn = @mysqli_connect($server, $user, $pw, $db);

if (mysqli_connect_errno($conn))
{
    echo "Fehler! Es konnte keine Verbindung zur Datenbank hergestellt werden.";
}
else
{
    echo " ";
}

mysqli_set_charset($conn, "utf8");


<?php

$user = "student";
$pw = "pwa";
$server = "localhost";
$db = "beindie";
$conn = @mysqli_connect($server, $user, $pw, $db);

if (mysqli_connect_errno($conn))
{
    echo "Verbindung zu ". $db ."  konnte nicht hergestellt werden.";
}
else
{
    echo "Verbindung hergestellt!";
}

?>
<br/>
<br/>

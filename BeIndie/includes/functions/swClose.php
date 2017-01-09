<br/>
<?php

if(mysqli_close($conn))
{
    echo "Verbindung getrennt!";
}
else
{
    echo "Fehler";
}


<?php

if (isset($_POST['submit'])) {
    $to = "ron.wagner@fh-erfurt.de";
    $from = $_POST['email'];
    $fname = "";
    if (isset($_POST['fname'])) {
        $fname = $_POST['fname'];
    }
    $lname = "";
    if (isset($_POST["lname"])) {
        $lname = $_POST['lname'];
    }
    $subject = $_POST["subject"];
    $subject2 = "Kopie" . $_POST["subject"];
    $message = "Vorname: " . $fname . " Nachname: " . $lname . " hat folgendes geschrieben:" . "\n\n" . $_POST["msg"];
    $message2 = "Eine Kopie Ihrer Nachricht an BeIndie: " . $_POST["msg"];
    
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    
    header('Location: ../../index.php?page=contact&succ=1');
    exit();
}

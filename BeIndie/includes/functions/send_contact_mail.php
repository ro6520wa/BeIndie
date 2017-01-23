<?php

if (isset($_POST['submit'])) {
    $fname = "";
    if (isset($_POST['fname'])) {
        $fname = $_POST['fname'];
    }
    $lname = "";
    if (isset($_POST["lname"])) {
        $lname = $_POST['lname'];
    }
    $name = $fname . " " . $lname;

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'beindie1@gmail.com';                 // SMTP username
    $mail->Password = 'BeIndie1!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($_POST['email'], "BeIndie");
    $mail->addAddress("beindie1@gmail.com", "BeIndie");     // Add a recipient               // Name is optional
    $mail->addReplyTo($_POST['email'], $name);

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["msg"];

    if (!$mail->send()) {
        header('Location: ../../index.php?page=contact');
        exit(1);                                //For debugging: $mail->ErrorInfo;
    } else {
        $mail->clearAddresses();
        $mail->clearReplyTos();
        $mail->Subject = "Deine Anfrage an BeIndie";
        $mail->Body = "Vielen Dank für deine E-Mail. Du erhältst in Kürze eine Antwort. Anbei findest du eine Kopie deiner Nachricht. Bitte antworte nicht auf diese E-Mail! <br/><br/>"
                . $_POST["msg"];
        $mail->addAddress($_POST['email'], $name);
        if (!$mail->send()) {
            header('Location: ../../index.php?page=contact');
            exit(1);
        } else {
            header('Location: ../../index.php?page=contact&succ=1');
            exit();
        }
    }
}
 
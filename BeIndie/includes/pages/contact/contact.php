<?php
    $succ = false;
    if(isset($_GET["succ"])){
        if($_GET["succ"] == "1"){
            $succ = true;
        }
    }
?>

<div id='mail_success' class='<?php if ($succ == true) {echo "show";} ?>'>
        <div id="mail_success_msg" class='<?php if ($succ == true) {echo "show";} ?>'><i class="fa fa-check" aria-hidden="true"></i>
            Vielen Dank! Wir werden dir in Kürze antworten!
        </div>
</div>

<div id="contact_wrap">
    <div id="info_text">
        <img src="images/logo.png" width="150px">
        <p>
        Du hast eine Frage? Schau doch einmal in unser <a href="index.php?page=faq">FAQ</a>. Dort findest du alle häufigen Fragen
        unserer Nutzer. Solltest du selbst dort keine Antwort auf deine Frage finden oder möchtest du uns Feedback geben, 
        schreibe uns gern eine E-Mail, wir werden dir so schnell wie möglich antworten. 
        Dazu musst du uns nur deine E-Mail Adresse und deine Nachricht in das unten stehende Kontaktformular eintragen.
        </p>
    </div>
    <div id="contact_form">
        <fieldset>
            <legend>Kontakt</legend>
            <form id="contact" action="includes/functions/send_contact_mail.php" method="POST" enctype="multipart/form-data">
                <p><label><b>Deine E-Mail*</b></label></p>
                <input type="text" id="email" placeholder="deine@email.de" name="email" required>
                <p><label><b>Dein Vorname</b></label><label class="lname" for="lname"><b>Dein Nachname</b></label></p>
                <input type="text" id="fname" name="fname" placeholder="Vorname">
                <input type="text" id="lname" name="lname" placeholder="Nachname">
                <p><label><b>Betreff*</b></label></p>
                <input type="text" id="subject" placeholder="Betreff" name="subject" required>
                <p><label><b>Deine Nachricht*</b></label></p>
                <textarea  rows="10" cols="50" id="msg" form="contact" placeholder="Deine Nachricht..." maxlength="500" name="msg" required></textarea>
                <p id="reminder">Maximal 500 Zeichen</p>
                <button type="submit" id="submit" name="submit">Absenden</button>
                <p id="warning">Alle mit * gekennzeichneten Felder müssen ausgefüllt werden.</p>
            </form>
        </fieldset>
    </div>
</div>
<script src="js/mail_succ.js" type="text/javascript"></script>
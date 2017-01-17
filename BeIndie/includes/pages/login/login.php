<div class="login_wrap">
    <div id="be_part_text">
        <img src="images/logo.png" width="150px">
        <p>
            Du bist noch nicht registriert? Dann werde jetzt Teil einer stets wachsenden Community aus verschiedensten Menschen, die alle nur 
            das eine wollen: Neue, individuelle Ideen fördern oder präsentieren. Falls du noch Fragen hast bevor du uns betrittst, schau doch mal
            in unser <a href="index.php?page=faq">FAQ</a>, dort sind die häufigsten Fragen unserer Nutzer beantwortet. Solltest du aber dort auch
            nicht finden was du suchst, <a href="index.php?page=contact">kontaktiere</a> uns doch einfach, wir werden so schnell wie möglich auf
            deine Frage antworten.
        </p>
    </div>
    <div id="errormsg"></div>
    <fieldset class="field_login">
        <legend>Einloggen</legend>
        <div class="login">
            <form method="POST" action="check_user.php">
                <label><b>E-Mail</b></label>
                <input type="text" placeholder="E-Mail eingeben..." name="email" class="login_input" required>

                <label><b>Passwort</b></label>
                <input type="password" placeholder="Passwort eingeben..." name="psw" class="login_input" required>
                <button type="submit" class="login_button">Login</button>
            </form>
        </div>
    </fieldset>
    <fieldset class="field_register">
        <legend>Registrieren</legend>
        <div class="register">
            <form method="POST" action="register_user.php">
                <label><b>E-Mail</b></label>
                <input type="text" placeholder="E-Mail eingeben..." name="email" class="register_input" required>
                <label><b>Nutzername</b></label>
                <input type="text" placeholder="E-Mail eingeben..." name="uname" class="register_input" required>
                <label><b>Passwort</b></label>
                <input type="password" placeholder="Passwort eingeben..." name="psw" class="register_input" required>
                <label><b>Passwort wiederholen</b></label>
                <input type="password" placeholder="Passwort eingeben..." name="psw_repeat" class="register_input" required>
                <button type="submit" class="register_button">Registrieren</button>
            </form>
        </div>
    </fieldset>
</div>

<header>
    <div id="nav">
        <div id="navhead">
            <a href="index.php"><img src="images/logo.png" alt="logo"/></a><h3>Think, say, live, create</h3>
        </div>
        <div id="navbar">
            <ul class="topnav" id="myTopnav">
                <li class="<?php if ($page == 'start') {echo "active";} ?>"><a href="index.php">Home</a></li>
                <li class="<?php if ($page == 'about') {echo "active";} ?>"><a href="index.php?page=about">Über uns</a></li>
                <li class="<?php if ($page == 'contact') {echo "active";} ?>"><a href="index.php?page=contact">Kontakt</a></li>
                <li><a href="#">Projekte</a>
                    <ul class="subnav">
                        <li class="<?php if ($page == 'my_projects') {echo "active";} ?>"><a href="index.php?page=my_projects">Meine Projekte</a></li>
                        <li class="<?php if ($page == 'new_projects') {echo "active";} ?>"><a href="index.php?page=new_project">Neues Projekt</a></li>
                    </ul>
                </li>
                <li class="login" onclick="document.getElementById('id01').style.display='block'"><a href="#login"><i class="fa fa-user-o" style="font-size:24px"></i>  Profil</a></li>
            </ul>
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="close" title="Close Modal">&times;</span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="action_page.php">
                        <div class="container">
                            <label><b>E-Mail</b></label>
                            <input type="text" placeholder="E-Mail eingeben..." name="uname" class="modal_input" required>

                            <label><b>Passwort</b></label>
                            <input type="password" placeholder="Passwort eingeben..." name="psw" class="modal_input" required>

                            <button type="submit" class="modal_button">Login</button>
                            <input type="checkbox" checked="checked"> Eingeloggt bleiben
                        </div>
                    </form>
                </div>
        </div>
</header>
<script src="js/login_modal.js" type="text/javascript"></script>
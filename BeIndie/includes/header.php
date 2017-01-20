<?php 
session_start();
$succ_msg = false;
if (isset($_GET["login"])) {
    if($_GET["login"] == "succ"){
        $succ_msg = true;
    }
}
?>
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
                <?php if(isset($_SESSION["username"])) {?>
                    <li id="logout" class='login'><a href="includes/functions/logout.php">Logout</a></li>
                    <li class="login"><a href="index.php?page=user_profile&id=<?=$_SESSION["user_id"]?>"><i class="fa fa-user-o" style="font-size:17px"></i><?=$_SESSION["username"]?></a></li>
                <?php }else {?>
                    <li class="login" onclick="document.getElementById('id01').style.display='block'"><a href="#login">Login</a></li>
                <?php } ?>
            </ul>
            <div id='success' class='<?php if ($succ_msg == true) {echo "show_succ";} ?>'>
                <div id="login_success" class='<?php if ($succ_msg == true) {echo "show_succ";} ?>'><i class="fa fa-check" aria-hidden="true"></i>
                    Du bist nun eingeloggt!
                </div>
            </div>    
            <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="close" title="Close Modal">&times;</span>

                    <!-- Modal Content -->
                    <form class="modal-content animate" action="includes/functions/check_user.php" method="POST">
                        <div class="container">
                            <label><b>E-Mail</b></label>
                            <input type="text" placeholder="E-Mail eingeben..." name="email" class="modal_input" required>

                            <label><b>Passwort</b></label>
                            <input type="password" placeholder="Passwort eingeben..." name="psw" class="modal_input" required>
                            <button type="submit" class="modal_button">Login</button>
                            <p class="new_register">Noch keinen Account? <a href="index.php?page=login">Hier registrieren!</a></p>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</header>
<script src="js/login_modal.js" type="text/javascript"></script>
<script src="js/login_succ.js" type="text/javascript"></script>
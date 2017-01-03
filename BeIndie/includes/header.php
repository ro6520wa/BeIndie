<header>
    <div id="nav">
        <div id="navhead">
            <img src="images/logo.png" alt="logo"/><h3>Think, say, live, create</h3>
        </div>
        <div id="navbar">
            <ul class="topnav" id="myTopnav">
                <li class="<?php if ($page == 'start') {echo "active";} ?>"><a href="index.php">Home</a></li>
                <li class="<?php if ($page == 'about') {echo "active";} ?>"><a href="index.php?page=about">Über uns</a></li>
                <li class="<?php if ($page == 'contact') {echo "active";} ?>"><a href="index.php?page=contact">Kontakt</a></li>
                <li class="<?php if ($page == 'project') {echo "active";} ?>"><a href="index.php?page=projects">Projekte</a></li>
                <li class="login"><a href="#login"><i class="fa fa-user-o" style="font-size:24px"></i></a></li>
                <li class="icon">
                    <a href="javascript:void(0);" onclick="openMenu()">&#9776;</a>
                </li>
            </ul>
        </div>
</header>
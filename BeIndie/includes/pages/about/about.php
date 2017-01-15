<div id="wrapper">
    <div id="content">
        <h1>Über uns</h1>
        <?php
        include ("includes/functions/swConnect.php");
        $current_day = date("d");
        $current_month = date("m");
        $current_year = date("Y");
        $query1 = "select * from employee";
        $result1 = mysqli_query($conn, $query1);

        while ($row = mysqli_fetch_array($result1)) {
            ?>
            <article>
                <img src="<?= $row["e_image"] ?>" width="120" height="180">
                <span>
                    <b>Name: </b> <?= $row["e_firstname"] . " " . $row["e_lastname"] . "<br/>"; ?>
                    <b>Alter: </b> 
                    <?php
                    $date_parts = explode(".", $row["e_birthdate"]);
                    if ($current_month <= $date_parts[1]) {
                        echo ($current_year - $date_parts[2]) - 1;
                    } else if ($date_parts[1] == $current_month && $current_day >= $date_parts[0]) {
                        echo ($current_year - $date_parts[2]);
                    } else if ($current_month > $date_parts[1]) {
                        echo ($current_year - $date_parts[2]);
                    }
                    echo "<br/>";
                    include ("texts/e_texts/" . $row["e_ID"] . ".txt");
                    ?>
                </span>
            </article>
            <?php
        }
        ?>
        <?php include ("includes/functions/swClose.php"); ?>
        <article>
            <img src="images/logo.png" alt="logo" height="35"/>
            <br/>
            <span id="beindie">
                <?php include ("texts/e_texts/beindie.txt"); ?>
            </span>
        </article>
        <!--Otherwise the div wrapper won't lengthen to the bottom of the page somehow-->
        <p class="invis">placeholder</p>
    </div>
</div>

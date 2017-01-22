<div id="wrap_about">
        <div id="beindie">
            <img src="images/logo.png" alt="logo" width="150"/>
            <br/>
            <p id="beindie_txt">
                <?php include ("texts/e_texts/beindie.txt"); ?>
            </p>
        </div>
        <?php
        include ("includes/functions/swConnect.php");
        $current_day = date("d");
        $current_month = date("m");
        $current_year = date("Y");
        $query1 = "select * from employee";
        $result1 = mysqli_query($conn, $query1);

        while ($row = mysqli_fetch_array($result1)) {
            ?>
            <div class="about_e">
                <div class="e_img" style="background-image: url(<?=$row["e_image"]?>)"></div>
                <div class="e_info">
                        <p><b><?= $row["e_firstname"] . " " . $row["e_lastname"]; ?></b></p>
                        <p><b>Alter:
                        <?php
                        $date_parts = explode(".", $row["e_birthdate"]);
                        if ($current_month <= $date_parts[1]) {
                            echo ($current_year - $date_parts[2]) - 1;
                        } else if ($date_parts[1] == $current_month && $current_day >= $date_parts[0]) {
                            echo ($current_year - $date_parts[2]);
                        } else if ($current_month > $date_parts[1]) {
                            echo ($current_year - $date_parts[2]);
                        } ?>
                        </b></p>
                </div>
            </div>
            <div class="e_text"> 
                <p><?php include ("texts/e_texts/" . $row["e_ID"] . ".txt"); ?></p>
            </div>
            <?php
        }
        ?>
        <?php include ("includes/functions/swClose.php"); ?>
</div>

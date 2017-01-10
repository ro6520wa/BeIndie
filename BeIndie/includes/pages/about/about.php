<div id="wrapper">
    <div id="content">
        <h1>Über uns</h1>
        <article>
            <?php
            include ("includes/functions/swConnect.php");
            $query1 = "select * from employee";
            $result1 = mysqli_query($conn, $query1);

            while ($row = mysqli_fetch_array($result1)) 
            {?>
            <b>Name: </b> <?= $row["e_firstname"]. " ". $row["e_lastname"] .  "<br/>";?>
            <b>Geburtsdatum</b> <?php echo$row["e_birthdate"] . "<br/>";
            }?>
            <?php include ("includes/functions/swClose.php"); ?>
        </article>
    </div>
</div>

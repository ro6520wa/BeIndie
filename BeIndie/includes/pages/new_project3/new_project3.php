<?php  
    include ("includes/functions/swConnect.php"); 
    ?>
<form  method="post" action="index.php?page=new_project2">
    <div id="newproject">
        <h1>Wie sollen deine Ünterstützer belohnt werden?</h1>
        <div id = Rewards>
            <h2>Titel</h2>
            <input type="text" placeholder="Titel der Belohnungsstufe">
            <h2>Mindestbetrag</h2>
            <input type="text" placeholder="Mindestbetrag für diese Belohnung">
            <h2>Belohnungsinhalt</h2>
            <textarea id="rewarddesc" name="rewarddesc" rows="10" cols="20"></textarea> 
        </div>
        
    </div>
    <input type="submit" class="next" value="speichern" </button>
    
</form>



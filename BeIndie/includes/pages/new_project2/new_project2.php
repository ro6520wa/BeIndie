<!DOCTYPE html>

<div id="newproject">
    <h1>Ihr Projekt</h1>
    <div id = form>
        
            <h2>Slideshow Bilder</h2> 
           
            <form action="includes/functions/project_form.php?id=<?=$uid?>" method="post" enctype="multipart/form-data">

                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">            
            </form>    
                
        <button type="submit" class="next" onClick="DBupload()"> weiter... </button> 

    </div>
</div>


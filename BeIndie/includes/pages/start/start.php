<?php 
$logged_in = false;
if(isset($_SESSION["username"])){
    $logged_in = true;
}
?>

<div id="head">
    <p class="adtext1">Start something that matters</p>
    <p class="adtext2"><a href="index.php<?php if($logged_in){echo "?page=new_project";}else{echo "?page=login";} ?>">Get started</a> with your own project today.</p>
</div>
<div id="content">
    <div id="searchbar"></div>
    <div id="top-content">
        <div id="table">
            <h2>Projekte suchen...</h2>

            <input type="text" name="search" placeholder="Suchen..." id="search" class="search">
            <button class="filter">Filter</button>
            <div class="filter_panel">
                <table style="border-spacing: 0 5px" style="border-collapse: separate">
                    <th style="text-align: left">
                        <b>Suche Projekte nach:</b>
                    </th>
                    <th style="text-align: left">
                        <div class="cat_filter"><b>Nach Projektkategorie suchen:</b></div>
                    </th>
                    <tr>
                        <td>
                            <div class="inputs"><input type="radio" name="searchfor" class="searchfor" value="project_name" checked><div class="input_text">Projektnamen</div></div>
                            <div class="inputs"><input type="radio" name="searchfor" class="searchfor" value="user_name"><div class="input_text">Nutzernamen</div></div>
                        </td>
                        <td>
                            <div class="first_input_cat"><input type="checkbox" name="category" class="category" value="technology"><div class="input_text">Technologie</div></div>
                            <div class="inputs"><input type="checkbox" name="category" class="category" value="sports"><div class="input_text">Sport</div></div>
                            <div class="inputs"><input type="checkbox" name="category" class="category" value="games"><div class="input_text">Spiele</div></div>
                            <div class="inputs"><input type="checkbox" name="category" class="category" value="beauty"><div class="input_text">Beauty & Kosmetik</div></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="search_result"></div>
            <div id="fixing_stuff">This text is not visible.</div>
        </div>
    </div>
</div>
<script src="js/filter.js" type="text/javascript"></script>
<script src="js/search.js" type="text/javascript"></script>
<script src="js/hover_search.js" type="text/javascript"></script>

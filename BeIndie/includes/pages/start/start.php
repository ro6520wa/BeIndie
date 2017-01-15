<div id="head">
    <p class="adtext1">Start something that matters</p>
    <p class="adtext2">Get started with your own project today.</p>
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
            <div id="display_all">
                <?php
                include ("includes/functions/swConnect.php");
                $query = "SELECT p.project_ID, title, goal, current_status, start_date, end_date, user_name, image_path FROM project p JOIN user u ON p.creator=u.email JOIN project_image pi ON p.project_ID=pi.project_ID GROUP BY p.project_ID";
                $result = mysqli_query($conn, $query);
                while ($output = mysqli_fetch_assoc($result)) {
                    echo "<div class = 'projects_display'>";
                        echo "<div class = 'project_img'>";
                            echo "<a href='index.php?page=projects&q=" . $output["project_ID"] .
                            "'><img src='" . $output["image_path"] . "'></a>";
                            echo "<a class='support_button' href='includes/pages/projects/support_project.php?q=" .$output["project_ID"] . 
                                "'><button type='button'>Unterstützen</button></a>";
                        echo "</div>";
                        echo "<h3 class='project_title'>";
                            echo "<a href='index.php?page=projects&q=" . $output["project_ID"] . "'>" .
                                    $output["title"] . "</a>";
                        echo "</h3>";
                        echo "<p class='project_user'>";
                            echo $output["user_name"];
                        echo "</p>";
                        echo "<div class'percent_goal'>";
                            $percent = number_format((($output["current_status"] / $output["goal"])*100));
                            echo $percent . "%";
                        echo "</div>";
                        echo "<div class='goal_bar'><div class='current_bar' style='width:" .
                                $percent . "%'></div></div>";
                        echo "<div class='project_stats'>";
                            echo "<table>";
                                echo "<tr>";
                                    echo "<th>";
                                        echo $output["current_status"] . "€";
                                    echo "</th>";
                                    echo "<th>";
                                        echo $output["goal"] . "€";
                                    echo "</th>";
                                    echo "<th>";
                                        $datetime1 = new DateTime($output["start_date"]);
                                        $datetime2 = new DateTime($output["end_date"]);
                                        $interval = $datetime1->diff($datetime2);
                                        echo $interval->format('%a Tage');
                                    echo "</th>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>";
                                        echo "Stand";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "Ziel";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "bis zum Ziel";
                                    echo "</td>";
                                echo "</tr>";
                            echo "</table>";
                        echo "</div>";
                    echo "</div>";
                }
        include ("includes/functions/swClose.php");
        ?>
    </div>
    <div id="search_result"></div>
    <div id="fixing_stuff">This text is not visible.</div>
</div>
</div>
</div>
<script src="js/filter.js" type="text/javascript"></script>
<script src="js/search.js" type="text/javascript"></script>
<script src="js/hover_search.js" type="text/javascript"></script>
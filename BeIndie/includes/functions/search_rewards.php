<?php
session_start();
include("swConnect.php");

$uname = "";
$uid = 0;

//check if user is actually logged in(should be when he gets here, so this is probably unnecessary)
if(isset($_SESSION["username"])){
    $uname = $_SESSION["username"];
    $uid = $_SESSION["user_id"];
}else{
    header("Location: ../../index.php?page=login");
    exit(1);
}

$data = explode(".", $_GET["q"]);   //get the data passed by ajax
$amount = $data[0];
$proid = $data[1];
$get_creator = "SELECT email FROM user WHERE user_name='". $uname . "'";    //get the email needed for getting the transactions
$result_creator = mysqli_query($conn, $get_creator);
$output_creator = mysqli_fetch_assoc($result_creator);
$umail = $output_creator["email"];
$query_user_transactions = "SELECT amount FROM transaction WHERE project_ID ='" . $proid . "' && user_email ='" . $umail . "'";     //get all transactions the user has already done on this project
$result_user_transaction = mysqli_query($conn, $query_user_transactions);
$current_amount_donated = 0;
while($row = mysqli_fetch_assoc($result_user_transaction)){
    $current_amount_donated += $row["amount"];      //save the amount the user has already donated for this project
}

$amount += $current_amount_donated;     //add it to what he wants to donate(according to his input)
$query_reward = "SELECT r_title, r_text, min_amount FROM reward WHERE min_amount <= " . $amount . " && project_ID = " . $proid . " ORDER BY min_amount DESC LIMIT 1";
$result_reward = mysqli_query($conn, $query_reward);
$output_string = "";

//if the user has already donated something the message he'll see is potentially different(shows him which reward he will already get)
if($current_amount_donated > 0){
    $query_current_reward = "SELECT r_title, r_text, min_amount FROM reward WHERE min_amount < " . $current_amount_donated . " && project_ID = " . $proid . " ORDER BY min_amount DESC LIMIT 1";
    $result_current_reward = mysqli_query($conn, $query_current_reward);
    $output_current_reward = mysqli_fetch_assoc($result_current_reward);
    $output_string = "<div class='cur_reward'><p class='current_reward'>Du hast dieses Projekt bereits mit <b>" . $current_amount_donated . "€</b> unterstützt. Damit erhältst du folgende Belohnung: </p><p class='reward_title'>" . 
            utf8_encode($output_current_reward["r_title"]) . "</p><p>" . utf8_encode($output_current_reward["r_text"]) . "</p></div>";
    }
$output_reward = mysqli_fetch_assoc($result_reward);
echo $output_string;    //if he already has a reward return it
if($data[0] != 0){      //return the reward he will get when he donates what the input suggests
    echo    "<div class='fut_reward'><p class='get_reward'>Du würdest dieses Projekt mit <b>" . $amount . "€</b> unterstützen. Damit würdest du folgende Belohnung erhalten: </p><p class='reward_title'>" .
            utf8_encode($output_reward["r_title"]) ."</p><p>" . utf8_encode($output_reward["r_text"]) . "</p></div>";
    
}

$query_higher_rewards = "SELECT r_title, r_text, min_amount FROM reward WHERE min_amount > " . $amount . " && project_ID = " . $proid . " ORDER BY min_amount LIMIT 3";
$result_higher_rewards = mysqli_query($conn, $query_higher_rewards);
while($output_higher_rewards = mysqli_fetch_assoc($result_higher_rewards)){         //and return the rewards he can potentially get when donating more (MAX 3)?>      
<article class="higher_reward">
    <p class="pay_more">Wenn du noch <b><?=$output_higher_rewards["min_amount"]-$amount?>€</b> mehr zahlst erhältst du folgende Belohnung</p>
    <p class="reward_title"><?= utf8_encode($output_higher_rewards["r_title"])?></p>
    <p class="reward_text"><?= utf8_encode($output_higher_rewards["r_text"])?></p>
</article>
<?php } ?>
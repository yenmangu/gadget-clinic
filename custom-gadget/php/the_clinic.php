<?php
// IF YOU HAVE CHANGED THE FOLDER STRUCTURE - BE SURE TO UPDATE THE FUNCTIONS.PHP
global $wp_query;
global $wpdb;
$device_id = $wp_query->query_vars['id'];
$result = $wpdb->get_results("SELECT * FROM all_device_repairs WHERE id = $device_id ");
$image_result = $wpdb->get_results("SELECT * FROM newdevices WHERE id = $device_id ");;

//remove object from array
$repair_array = array_shift($result);
$image_array = array_shift($image_result);

//turn removed object into array
$new_image_array = json_decode(json_encode($image_array), true);
$new_repair_array = json_decode(json_encode($repair_array), true);

// variables assigned to array values
$device_name = $new_repair_array["device_name"];
$screen_standard = $new_repair_array["screen_standard"];
$screen_premium = $new_repair_array["screen_premium"];
$screen_original = $new_repair_array["screen_original"];
$back_glass = $new_repair_array["back_glass"];
$battery = $new_repair_array["battery"];
$image = $new_image_array["image"];

// // debugging
// print_r($device);
// print_r($device_name);
// echo "<br>";
// print_r($image);

echo "<style>";
echo "body.repair-body {max-width: 100%; display:flex; flex-direction:column}";
echo "div.device-name {padding-bottom: 40px}";
echo "h3.device-name {width: 100%; text-align: center; padding-bottom: 20px}";
echo "div.image-wrapper {max-width: 300px; padding: 20px}";
echo ".screen-option-wrapper {flex-direction:row; justify-content: space-evenly; padding: 40px 0px 40px 0px}";
echo "h6.repair-h6 {padding-top: 10px; padding-bottom: 10px}";

echo "input.screen-type {margin-right: 10px}";
echo "input.submit-button {margin-top: 20px; margin-bottom: 40px; background-color: #E12929; color: white; max-width: 200px}";
echo "</style>";

echo "<body class='repair-body'>";

echo "<div class='repair-container'>"; // repair-wrapper div 
echo "<div class='device-name'>"; // device-name div
echo "<h3 class='device-name-h3'>Your Device: {$device_name}</h3>";
echo "</div>"; // device-name div close

echo "<h5>Please choose which repairs you would like below</h6>";

echo "<form class='repair-type-form'>";
// each tab for each section
echo "<div class='tab'>Name:";
echo "<div class='screen-option-wrapper'>";
echo "<h6 class='repair-h6'>Standard Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-standard'>";
echo "<label class='repair-type' for 'screen-standard'>Cost {$screen_standard}</label>";
echo "<h6 class='repair-h6'>Premium Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-premium'>";
echo "<label class='repair-type' for 'screen-premium'>Cost {$screen_premium}</label>";
echo "<h6 class='repair-h6'>Apple Manufactured Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-original'>";
echo "<label class='repair-type' for 'screen-original'>Cost {$screen_original}</label>";
echo "</div>";
echo "<div class='repair-option-wrapper'>";
echo "<h6 class='repair-h6'>Back Glass Replacement</h6>";
echo "<input type='checkbox' id='back-glass'>";
echo "<label class='repair-type' for 'back-glass'>Cost {$back_glass}</label>";
echo "</div>";
echo "<div class='repair-option-wrapper'>";
echo "<h6 class='repair-h6'>Battery Replacement</h6>";
echo "<input type='checkbox' id='battery'>";
echo "<label class='repair-type' for 'battery'>Cost {$battery}</label><br>";
echo '</div>';
echo "</div>"; // closing div tab

echo '<div class="tab">Contact Info:';
echo "<p><input placeholder='First name...' oninput='this.className = '''></p>";
echo "<p><input placeholder='Last name...' oninput='this.className = '''></p>";
echo "<p><input placeholder='E-mail...'' oninput='this.className = '''></p>"; // change the quotes
echo "<p><input placeholder='Phone...' oninput='this.className = '''></p>";
// more contact info
echo "<p><input placeholder='Phone...' oninput='this.className = '''></p>"; // change this
echo "</div>"; // closing div tab

echo "<input type='submit' class='submit-button' id='submit-repair' value='Repair My Device'> ";
// back-forward controls
echo "<div style='overflow:auto;'>";
echo "<div style='float:right;'>";
echo "<button type='button' id='prevBtn' onclick='nextPrev(-1)'>Previous</button>";
echo "<button type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>";
echo "</div>";
echo "</div>";
// progress dots

echo "<div style='text-align:center;margin-top:40px;''>";
echo "<span class='step'></span>";
echo "<span class='step'></span>";
echo "<span class='step'></span>";
echo "<span class='step'></span>";
echo "</div>";
echo "</form>";

echo "</body>";

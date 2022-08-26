<?php
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
echo "<head>";
echo "<link rel='stylesheet' href='/custom-gadget/css/styles.css'>";
echo "</head>";
echo "<style>";
echo "body.repair-body {max-width: 100%; display:flex; flex-direction:column}";
echo "div.device-name {padding-bottom: 40px}";
echo "h3.device-name {width: 100%; text-align: center; padding-bottom: 20px}";
echo "div.image-wrapper {max-width: 300px; padding: 20px}";
echo ".screen-option-wrapper {flex-direction: column; justify-content: space-evenly; padding: 40px 0px 40px 0px}";
echo "h6.repair-h6 {padding-top: 10px; padding-bottom: 10px}";
echo "div.screen-option {display:flex; flex-direction: row; align-items: center}";
echo "input[type=radio]+label {margin-right: 2em; line-height: 1em}";
echo "label.repair-type {width: 100%}";
echo "div.repair-option {display: flex; flex-direction: row; align-items: center}";
echo "input.screen-type {margin-right: 10px}";
echo "input.repair-checkbox {margin-right: 0px !important}";
// echo "input.submit-button {margin-top: 20px; margin-bottom: 40px; background-color: #E12929; color: white; max-width: 200px}";
echo "div.form-controls {padding-top:20px}";
echo "button.control-buttons-previous {margin-top:10px}";
echo "button.control-buttons-next {margin-top:10px; color: white}";

echo "</style>";

echo "<body class='repair-body'>";

echo "<div class='repair-container'>"; // repair-wrapper div 
echo "<div class='device-name'>"; // device-name div
echo "<h3 class='device-name-h3'>Your Device: {$device_name}</h3>";
echo "</div>"; // device-name div close

echo "<h5 class='repair-h5' id='repairH5' >Please choose which repairs you would like below</h6>";

echo "<form class='repair-type-form'>";
// each tab for each section
echo "<div class='tab'>";
echo "<div class='screen-option-wrapper'>";
echo "<h6 class='repair-h6'>Standard Screen Replacement</h6>";
echo "<div class ='screen-option'>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-standard'>";
echo "<label class='repair-type' for 'screen-standard'>Cost {$screen_standard}</label>";
echo "</div>";
echo "<h6 class='repair-h6'>Premium Screen Replacement</h6>";
echo "<div class ='screen-option'>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-premium'>";
echo "<label class='repair-type' for 'screen-premium'>Cost {$screen_premium}</label>";
echo "</div>";
echo "<h6 class='repair-h6'>Apple Manufactured Screen Replacement</h6>";
echo "<div class ='screen-option'>";
echo "<input class='screen-type' type='radio' name='screen-type' id='screen-original'>";
echo "<label class='repair-type' for 'screen-original'>Cost {$screen_original}</label>";
echo "</div>";
echo "</div>";
echo "<h6 class='repair-h6'>Back Glass Replacement</h6>";
echo "<div class='repair-option'>";
echo "<input class='repair-checkbox' type='checkbox' id='back-glass'>";
echo "<label class='repair-type' for 'back-glass'>Cost {$back_glass}</label>";
echo "</div>";
echo "<h6 class='repair-h6'>Battery Replacement</h6>";
echo "<div class='repair-option'>";
echo "<input class='repair-checkbox' type='checkbox' id='battery'>";
echo "<label class='repair-type' for 'battery'>Cost {$battery}</label><br>";
echo '</div>';
echo "</div>"; // closing div tab
// contact tab
echo '<div class="tab">Contact Info:';
echo "<p><input placeholder='First name...' oninput='this.className = '' '></p>";
echo "<p><input placeholder='Last name...' oninput='this.className = '' '></p>";
echo "<p><input placeholder='E-mail...'' oninput='this.className = '' '></p>"; // change the quotes
echo "<p><input placeholder='Phone...' oninput='this.className = '' '></p>";
echo "</div>"; // closing div tab

// back-forward controls
echo "<div class='form-controls' style='overflow:auto;'>";
echo "<div class='form-controls-inner' style='float:left;'>";
echo "<button class='control-buttons-previous' type='button' id='prevBtn' onclick='nextPrev(-1)'>Previous</button>";
echo "<button class='control-buttons-next' type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>";
echo "</div>";
echo "</div>";
// progress dots

echo "<div style='text-align:center;margin-top:40px;''>";
echo "<span class='step'></span>";
echo "<span class='step'></span>";
echo "</div>";
echo "</form>";
echo "<script src='/custom-gadget/js/multi-stage-form.js'></script>";
echo "</body>";

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

echo "<style>";
echo "body.repair-body{max-width: 100%; display:flex; flex-direction:column}";
echo "h3.device-name {width: 100%; text-align: center}";
echo "div.image-wrapper {max-width: 300px; padding: 20px}";
echo ".screen-option-wrapper {flex-direction:row; justify-content: space-evenly}";
echo "input.screen-type {margin-right: 10px}";
echo "</style>";

echo "<body class='repair-body'>";

echo "<div class='repair-container'>"; // repair-wrapper div 
echo "<div class='device-name'>"; // device-name div
echo "<h3>Choose Repair For {$device_name}</h3>";
echo "</div>"; // device-name div close
echo "<div class='image-wrapper'>"; // image-wrapper div
echo "<img class='device-image' src='{$image}' alt='{$device_name}'>";
echo "</div>"; // image-wrapper div close
echo "<h6>Please choose which repairs you would like below</h6>";

echo "<form class='repair-type-form'>";

echo "<div class='screen-option-wrapper'>";
echo "<h6>Standard Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' id='screen-standard'>";
echo "<label class='repair-type' for 'screen-standard'>Cost {$screen_standard}</label>";
echo "<h6>Premium Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' id='screen-premium'>";
echo "<label class='repair-type' for 'screen-premium'>Cost {$screen_premium}</label>";
echo "<h6>Apple Manufactured Screen Replacement</h6>";
echo "<input class='screen-type' type='radio' id='screen-original'>";
echo "<label class='repair-type' for 'screen-original'>Cost {$screen_original}</label>";
echo "</div>";
echo "<div class='repair-option-wrapper'>";
echo "<h6>Back Glass Replacement</h6>";
echo "<input type='checkbox' id='back-glass'>";
echo "<label class='repair-type' for 'back-glass'>Cost {$back_glass}</label>";
echo "</div>";
echo "<div class='repair-option-wrapper'>";
echo "<h6>Battery Replacement</h6>";
echo "<input type='checkbox' id='battery'>";
echo "<label class='repair-type' for 'battery'>Cost {$battery}</label>";

echo "</div>";

echo "</form>";

echo "</body>";

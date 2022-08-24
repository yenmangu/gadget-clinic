<?php

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
// } else {
//     $id = "";
// };

$id_var = (get_query_var('id')) ? get_query_var('id') : false;
if ($id_var) {
    $id_var = $id;
};

global $wpdb;

$result = $wpdb->get_results("SELECT * all_device_repairs WHERE id = $id");
$image_result = $wpdb->get_results("SELECT * newdevices WHERE deviceId = $id");

echo "<style>";
echo "body.repair-body{max-width: 100%; display:flex; flex-direction:column}";
echo "h3.device-name {width: 100%; text-align: center}";
echo "div.image-wrapper {max-width: 300px}";
echo ".screen-option-wrapper {flex-direction:row; justify-content: space-evenly}";
echo "</style>";

echo "<body class='repair-body'>";

echo "<div class='repair-container'>"; // repair-wrapper div 
echo "<div class='device-name'>"; // device-name div
echo "<h3>Choose Repair{$result->device_name}</h3>";
echo "</div>"; // device-name div close
echo "<div class='image-wrapper'>"; // image-wrapper div
echo "<img class='device-image' src='{$image_result->image}' alt='{$image_result->deviceName}'>";
echo "</div>"; // image-wrapper div close
echo "<h6>Please choose which repairs you would like below</h6>";

echo "<form class='repair-type-form'>";

echo "<div class='screen-option-wrapper'>";
echo "<h6>Standard Screen Replacement</h6>";
echo "<label class='repair-type' for 'screen-standard'>Cost {$result->screen_standard}</label>";
echo "<input type='radio' id='screen-standard'>";
echo "<h6>Premium Screen Replacement</h6>";
echo "<label class='repair-type' for 'screen-premium'>Cost {$result->screen_premium}</label>";
echo "<input type='radio' id='screen-premium'>";
echo "<h6>Apple Manufactured Screen Replacement</h6>";
echo "<label class='repair-type' for 'screen-original'>Cost {$result->screen_original}</label>";
echo "<input type='radio' id='screen-original'>";
echo "</div>";

echo "<div class='repair-option-wrapper'>";
echo "<h6>Back Glass Replacement</h6>";
echo "<label class='repair-type' for 'back-glass'>Cost {$result->back_glass}</label>";
echo "<input type='checkbox' id='back-glass'>";
echo "</div>";

echo "<div class='repair-option-wrapper'>";
echo "<h6>Battery Replacement</h6>";
echo "<label class='repair-type' for 'battery'>Cost {$result->battery}</label>";
echo "<input type='checkbox' id='battery'>";
echo "</div>";

echo "</form>";

echo "</body>";

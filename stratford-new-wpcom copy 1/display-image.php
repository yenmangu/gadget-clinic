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

$image = $new_image_array["image"];

// // debugging
// print_r($device);
// print_r($device_name);
// echo "<br>";
// print_r($image);

echo "<style>";
echo "body.repair-body {max-width: 100%; max-height: none}";
echo "div.image-wrapper {width:1000px; max-width: 100%; height: 100%; display: flex; padding-top: 100px}";
echo "#device-image {width: 600px}";
echo "</style>";

echo "<body class='repair-body'>";
echo "<div class='image-wrapper'>"; // image-wrapper div
echo "<img class='device-image' id='device-image' src='{$image}' alt='{$device_name}'>";
echo "</div>"; // image-wrapper div close
echo "</body>";

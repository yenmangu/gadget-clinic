<?php


global $wp_query;

global $wpdb;

$device_id = $wp_query->query_vars['device'];

echo "The id of the page, taken from the URL is {$device_id} ";
echo "<br>";

$result = $wpdb->get_results("SELECT * FROM all_device_repairs WHERE id = $device_id ");
$image_result = $wpdb->get_results("SELECT * FROM newdevices WHERE id = $device_id ");;

$repair_array = array_shift($result);
$image_array = array_shift($image_result);

$new_image_array = json_decode(json_encode($image_array), true);
$new_repair_array = json_decode(json_encode($repair_array), true);

$device = $new_repair_array["device_name"];
$image = $new_image_array["image"];

print_r($device);
echo "<br>";
print_r($image);




echo "<div class='image-wrapper'>"; // image-wrapper div
echo "<img class='device-image' src='{$image}' alt='{$device_name}'>";
echo "</div>"; // image-wrapper div close

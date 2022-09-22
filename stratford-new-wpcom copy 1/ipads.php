<?php

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM newdevices WHERE deviceType = 'ipad'");

echo "<style>";
echo "body {font-family: roboto;}";
echo ".all-devices {max-width: 100% !important; display: flex; flex-direction: horizontal; flex-wrap: wrap; justify-content: center; align-items: flex-end}";
echo ".device-wrapper {max-width: 200px;  padding: 10px; text-align: center}";
echo ".device-link-id {text-align: center}";
echo "</style>";

echo "<body>";

echo "<div class='all-devices'>";
foreach ($result as $row) {
    $newUrl = "https://gadgetsclinic.co.uk/home/clinic?id={$row->id}";
    echo "<div class='device-wrapper'> <a class='device-link-id' href='{$newUrl}'><img src='{$row->image}' alt='{$row->deviceName}'></a>
    <a class='device-link-id' href='{$newUrl}'>{$row->deviceName}</a></div>";
}
echo "</div>";

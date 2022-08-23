<?php

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM newdevices WHERE deviceType = 'appleIphone'");

echo "<style>";
echo "body {font-family: roboto;}";
echo ".all-devices {max-width: 100% !important; display: flex; flex-direction: horizontal; flex-wrap: wrap; align-items: flex-end;
        gap: 20px;}";
echo ".device-wrapper {width: 200px; padding: 10px; text-align: center}";
echo ".device-link-id {text-align: center}";
echo "</style></head>";
echo "<body>";

echo "<div class='all-devices'>";
foreach ($result as $row) {
    $newUrl = "https://gadgetsclinic.co.uk/home/clinic?id={$row->id}";
    echo "<div class='device-wrapper'> <a class='device-link-id' href='{$newUrl}'><img src='{$row->image}' alt='{$row->deviceName}'></a>
    <a class='device-link-id' href='{$newUrl}'>{$row->deviceName}</a></div>";

}
echo "</div>";

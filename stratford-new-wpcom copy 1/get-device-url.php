<?php

global $wpdb;
$result = $wpdb->get_devices("SELECT * FROM newdevices");

echo "<style>";
echo "body {font-family: Arial;}";

echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";
echo "<body>";

echo "<div class=\"table_container\"><table>";
echo "<tr><th style=\"padding-left:10px;\">device</th></tr>";
foreach ($result as $device) {
    
    $url = "https://gadgetsclinic.co.uk/home/clinic?id=$device[deviceId]";

    echo "<tr><td><a href='$url'>" . $device->deviceName . "</a></td></tr>";
    
}
echo "</table></div>";

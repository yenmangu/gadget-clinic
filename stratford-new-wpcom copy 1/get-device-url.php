<?php

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM newdevices");

echo "<style>";
echo "body {font-family: Arial;}";

echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";
echo "<body>";

echo "<div class=\"table_container\"><table>";
echo "<tr><th style=\"padding-left:10px;\">device</th></tr>";
foreach ($result as $row) {
    $newUrl = "https://gadgetsclinic.co.uk/home/clinic?id={$row->id}";
    echo "<tr><td><a href='{$newUrl}'>{$row->deviceName}</a></td></tr>";
    echo "<tr><td><img src='{$row->image}' alt=''></td></tr>";
}
echo "</table></div>";

?>

<?php

global $wpdb;
$result = $wpdb->get_results("SELECT * FROM newdevices WHERE deviceType = 'appleIphone'");

echo "<style>";
echo "body {font-family: roboto;}";
echo ".all-devices {max-width: 100% !important; display: flex; flex-direction: horizontal; flex-wrap: wrap;}";
echo ".device-wrapper {width: 200px}";
echo "</style></head>";
echo "<body>";

echo "<div class='all-devices'>";
foreach ($result as $row) {
    $newUrl = "https://gadgetsclinic.co.uk/home/clinic?id={$row->id}";
    echo "<div class='device-wrapper'><img src='{$row->image}' alt='{$row->deviceName}'><a href='{$newUrl}'>{$row->deviceName}</a></div>";
}
echo "</div>";

?>
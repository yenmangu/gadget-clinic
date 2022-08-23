<?php

foreach ($devices as $device) :
    $newUrl = "https://gadgetsclinic.co.uk/home/clinic?id=$device[deviceId]";
    $deviceName = $device['deviceName'];
    $deviceImage = $device['image-url'];



?>
    <div style="width: 200px">
        <a href="<?= $newUrl ?>"><?= $deviceName ?></a>
        <div>
            <img src="<?= $deviceImage ?>" alt="" srcset="">
        </div>
    </div>
<?php
endforeach;
?>


<?php

global $wpdb;
$result = $wpdb->get_results("SELECT Name, Team, Position, Height FROM nbaplayer");

echo "<style>";
echo "body {font-family: Arial;}";

echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";
echo "<body>";

echo "<div class=\"table_container\"><table>";
echo "<tr><th style=\"padding-left:10px;\">Name</th><th>Team</th><th>Position</th></tr>";
foreach ($result as $row) {
    echo "<tr><td>" . $row->Name . "</td><td>" . $row->Team . "</td><td>" . $row->Position . "</tr>";
}
echo "</table></div>";

?>
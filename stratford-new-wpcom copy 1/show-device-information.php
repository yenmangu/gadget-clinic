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
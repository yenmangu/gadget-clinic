<?php
/**
 * The template for displaying all single posts
 * Template Name: SQL
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Varia
 * @since 1.0.0
 */

get_header();
?>
<?php
      require "sql_connect.php";
      $devices = "";
      try {
        $connection = new PDO($dsn, $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connection succesful";
        $sql = "SELECT * FROM newdevices WHERE deviceType = 'samsung' ";
        $devices = $connection -> query ($sql);
        
      } catch (PDOException $error){
        echo $error -> getMessage();

      }	
      
		?>


  <body>
    <div class="choose-container">
      <!-- <h3 class="choose-h3">Device List</h3> -->
      <div class="heading-container">
        <h4 class="choose-h4">Choose Your Samsung Model</h4>
      </div>
      
      <div class="device-container">
      <?php 

        foreach ($devices AS $device): 
        $newUrl = "http://18.168.90.222/home/clinic/gadget-repair?id=$device[deviceId]";
        //$newUrl = "device-repair-service.php?id=$device[deviceId]";
        ?>
          <div class="device-wrapper">
            <div class="device-url-wrapper">
              <a class="device-row-link" href="<?=$newUrl?>">
                <?php echo "$device[deviceName]" ?>
              </a>       
          </div>
        <div class="device-image-wrapper">
          <img src="<?=$device['image-url']?>" alt="<?=$device['deviceName']?>" width="100px";>
        </div>
      </div>

          </div>

      </div>
      <?php endforeach; ?> 
  </body>

<section id="primary" class="content-area">
  <main id="main" class="site-main">




  </main><!-- #main -->
</section><!-- #primary -->


<?php

get_footer();
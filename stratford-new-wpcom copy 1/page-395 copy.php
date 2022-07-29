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
<?php 

foreach ($devices AS $device): 
$newUrl = "http://18.168.90.222/home/clinic/gadget-repair?id=$device[deviceId]";
//$newUrl = "device-repair-service.php?id=$device[deviceId]";
?>
  <div class="device-container">
    <div class="device-url-wrapper">
    <a class="device-row-link" href="<?=$newUrl?>">
      <?php echo "$device[deviceName]" ?>
    </a>
      
    </div>
    <div class="device-image-wrapper">
  
    </div>

  </div>

  <div class="choose-container">
    <!-- <h3 class="choose-h3">Device List</h3> -->
    <div class="heading-container">
      <h4 class="choose-h4">Choose Your Samsung Model</h4>
    </div>
    <div class="table-container">
      <table class="device-table">
        <thead class="column-heads">
          

        </thead>
        <tbody>
          <?php 

          foreach ($devices AS $device): 
					$newUrl = "http://18.168.90.222/home/clinic/gadget-repair?id=$device[deviceId]";
					//$newUrl = "device-repair-service.php?id=$device[deviceId]";
					?>
          <tr class="device-row">
            <td class="device-row-data">
              <a class="device-row-link" href="<?=$newUrl?>">
                <?php echo "$device[deviceName]" ?>
              </a>
            </td>
            <td class="device-image">
              <img src="<?=$device['image-url']?>" alt="<?=$device['deviceName']?>" srcset="" width="100">
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</body>

<section id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>



  </main><!-- #main -->
</section><!-- #primary -->
 
<?php

get_footer();
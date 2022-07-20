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

    <?php
      require "sql_connect.php";
      $devices = "";
      try {
        $connection = new PDO($dsn, $username, $password);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection succesful";
        $sql = "SELECT * FROM newdevices WHERE deviceType = 'appleIphone'";
        $devices = $connection -> query ($sql);
        
      } catch (PDOException $error){
        echo $error -> getMessage();

      }	
      
		?>

    <body>
      <h3 style=>Device List</h3>
      <h4>Choose Your iPhone</h4>

      <table style=>
        <thead>
          <tr>
            <th style=>
            </th>
          </tr>
        </thead>
        <tbody style="margin-left:100px">
          <?php 

          foreach ($devices AS $device): 
					$newUrl = "http://18.168.90.222/home/clinic/gadget-repair?id=$device[deviceId]";
					//$newUrl = "device-repair-service.php?id=$device[deviceId]";
					?>
          <tr style=>
            <td style=>
              <a href="<?=$newUrl?>">
                <?php echo "$device[deviceName]" ?>
              </a>

            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </body>

  </main><!-- #main -->
</section><!-- #primary -->


<?php

get_footer();
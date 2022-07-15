<?php
/**
 * The template for displaying all single posts
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
		include 'sql_connect.php';
		?>

    <body>
      <h3 style=>Device List</h3>

      <table style=>
        <thead>
          <tr>
            <th style=>
              Choose Device
            </th>
          </tr>
        </thead>
        <tbody style=>
          <?php foreach ($devices AS $device): 
					//$newUrl = "http://18.168.90.222$device[slug]";
					$newUrl = "page-device-repair-service.php?id=$device[slug]";
					?>
          <tr style=>
            <td style=>
              <a style=href="<?=$newUrl?>">
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
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

		include 'sql_connect.php';

			// if (isset($_GET['deviceId'])) 
			// {
			// 	$deviceId = $_GET ['deviceId'];
			// }
			// else
			// {
			// 	$deviceId = "";
			// }
			// include 'sql_connect.php'; //db connection
			// $connection = new PDO ($dsn, $username, $password);
			// $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo "connection successful";
			// $sql = "SELECT * 
			// 	FROM newdevices
			// 	WHERE deviceId = $deviceId"; 

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
			// if (isset ($_GET))
     		// require "page-206.php";
			// $id = $_GET["id"];
      
    ?>
  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
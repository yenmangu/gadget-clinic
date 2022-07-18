<?php
/**
 * Template Name: page-214
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
	

	if (isset($_GET['id'])) 
	{
		$id = $_GET ['id'];
	}
	else
	{
		$id = "";
	}
	
	//$url = "http://18.168.90.222/device-repair-service/device?id=$id";
	
	require 'sql_connect.php';

	try {
		$connection = new PDO($dsn, $username, $password);
		$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "connection succesful";
		} catch (PDOException $error){
		echo $error -> getMessage();
		}

	//prevent SQL injection
	$sql = "SELECT * FROM newdevices WHERE deviceId =?";

	$result = $connection -> prepare($sql);

	$result -> bindParam(1, $id);
	$result -> execute();

	$row = $result -> fetch()

	// while ($row = $result -> fetch()) {
	// 	echo $row['deviceName']. "<br>";
	// }

	

	?>
	 
	<div class="deviceName" style="border: 2px solid red; ">
		<h4 class="deviceHeading">
			Services and Repairs for <br>
			
		</h4>
		<h3 class ="deviceSelected"><?=$row['deviceName']?></h3>
	</div>
	<div class="repairOption">
		<p>
			Choose Repair Type
		</p>
		<div class="screenRepair">

		</div>
		<div class="waterDamage">

		</div>
		<div class="batteryReplacement">
			
		</div>
	</div>

  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
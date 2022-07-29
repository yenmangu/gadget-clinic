<head>
	<style>
		.deviceName {
			display: flex;
			flex-direction: column;
			padding-left: 40px;
			padding-top: 50px;
			padding-bottom: 100px;
			gap: 20px;
		}

		.repairOption {
			gap: 50px;
			flex-direction: row-reverse;

		}

		.button {
			margin-top: 20px;
			border-radius: 6px;
			width: 250px;
			/* min-width: 50%; */
			text-align: center;
			background-color: rgba(1, 1, 1, 0);
		}
	</style>
</head>

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
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content/content', 'page');

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) {
				comments_template();
			}

		endwhile; // End of the loop.
		?>

		<?php


		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			$id = "";
		}

		//$url = "http://18.168.90.222/device-repair-service/device?id=$id";

		require 'sql_connect.php';

		try {
			$connection = new PDO($dsn, $username, $password);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "connection succesful";
		} catch (PDOException $error) {
			echo $error->getMessage();
		}

		//prevent SQL injection
		$sql = "SELECT * FROM newdevices WHERE deviceId =?";

		$result = $connection->prepare($sql);

		$result->bindParam(1, $id);
		$result->execute();

		$devices = $result->fetch()

		// while ($row = $result -> fetch()) {
		// 	echo $row['deviceName']. "<br>";
		// }



		?>
		<div class="main-content" id="repair-main">
			<div class="deviceName" ">
		<h4 class=" deviceHeading">
				Services and Repairs for <br>

				</h4>
				<img src="<?= $devices['image-url'] ?>" alt=""></img>
				<h3 class="deviceSelected"><?= $row['deviceName'] ?></h3>
				<div class="repairOption">
					<p>
						Choose Repair Type
					</p>
					<div class="screenRepair repairOption">
						<a href="http://18.168.90.222/home/brand-new-clinic/gadget-repair/screen-replacement?id=<?= $devices['deviceId'] ?>" class="button">
							Screen Replacement
						</a>
						<img class="style-svg" src="/wp-content/uploads/2022/07/icons8-broken-phone-64.png" alt="broken-phone-image">

					</div>
					<div class="waterDamage repairOption">
						<a href="http://18.168.90.222/home/brand-new-clinic/gadget-repair/water-damage?id=<?= $devices['deviceId'] ?>" class="button">
							Water Damage
						</a>
						<img class="style-svg" src="/wp-content/uploads/2022/07/icons8-water-64.png" alt="broken-phone-image">

					</div>
					<div class="batteryReplacement repairOption">
						<a href="http://18.168.90.222/home/brand-new-clinic/gadget-repair/battery-replacement?id=<?= $devices['deviceId'] ?>" class="button">
							Battery Replacement
						</a>
						<img class="style-svg" src="/wp-content/uploads/2022/07/icons8-empty-battery-64.png" alt="broken-phone-image">

					</div>
				</div>
			</div>
			<div class="side-container">
				<div class="content-example">
					<p>example content</p>
					<img src="https://via.placeholder.com/300" alt="">
				</div>
				<div class="content-example">
					<p>example content</p>
					<img src="https://via.placeholder.com/300" alt="">
				</div>
				<div class="content-example">
					<p>example content</p>
					<img src="https://via.placeholder.com/300" alt="">
				</div>
			</div>
		</div>




	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();

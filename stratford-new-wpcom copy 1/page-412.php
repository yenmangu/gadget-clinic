<head>
  <link rel="stylesheet" href="repairs-styles.css">
  <style>
  .main-container {
    display: flex;
    flex-direction: column;
    align-items: left;
    background-color: #34eb89;
    width: 100%;
    height: auto;
    border: 2px solid #da9df2;
    padding: 20 40px;
  }

  .main-title {
    text-align: center;
    padding-bottom: 20px;
  }

  .info-container {
    border: 2px solid #da9df2;
    align-items: flex-start;
    padding: 20 10px;
  }

  .chosen-device {
    color: blue;
  }

  form {
    border: 2px solid #da9df2;
    padding: 20px;
  }

  text-area {
    margin: 10 0px;
    padding-bottom: 20px;
  }

  .reset-button .submit-button {
    margin-top: 20px;
  }
  </style>
</head>

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


// BATTERY REPLACEMENT

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

            $devices = $result -> fetch();
                echo $devices['deviceName'];
            ?>
    <div class="main-container">
      <h1 class="main-title">Gadget Clinic</h1>
      <h2 class="main-repair">Repair or Replace the Battery on your </h2> <br>
      <br>
      <h3><span class="chosen-device"><?=$devices['deviceName']?></span></h3>
      <div class="info-container">
        <p class="repair-info">Some text about battery replacement</p>
        <p class="repair-info">Text about the price of battery replacement for the chosen model</p>
      </div>
      <div class="book-repair">
        <h4>How to book</h4>
        <p class="booking-info">Text about booking</p>
        <p>visit us at the shop</p>
        <p>call this number - xxxxxxx</p>
        <p>fill out the form below to get started for device collection</p>
        <form action="post">
          <label for="Name">Name</label>
          <input type="text" class="name" name="name">
          <label for="Email">Email</label>
          <input type="text" class="email" name="email">
          <p>Repair Type:</p>
          <p>Battery Replacement</p>
          <p>Device</p>
          <p class="chosen-device form-chosen"><?=$devices['deviceName']?> </p>
          <label for="extra-info">Please provide us with any extra information about the device</label>
          <textarea name="extra-info" id="extra-info" cols="30" rows="10"></textarea>
          <input type="submit" name="submit" id="submit" class="submit-button button">
          <input type="reset" name="reset" id="reset" class="reset-button button">
        </form>
      </div>
    </div>
  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
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
// WATER DAMAGE
get_header();
?>

<head>
  <link rel="stylesheet" href="repairs-styles.css">
  <style>
    .repair-main {
      display: flex;
      flex-direction: row;
      gap: 40px;
      padding: 20 50px;
    }
    .repair-form {
      display: flex;
      flex-direction: column;
      align-items: left;
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

    .repair-form-button {
      margin-top: 20px;
    }
  </style>
</head>
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
                echo "connection succesful";
                } catch (PDOException $error){
                echo $error -> getMessage();
                }

            //prevent SQL injection
            $sql = "SELECT * FROM newdevices WHERE deviceId = ? " ;

            $result = $connection -> prepare($sql);

            $result -> bindParam(1, $id);
            $result -> execute();

            $devices = $result -> fetch();
            echo $devices['deviceName'];

            ?>

<div class="repair-main">
  <div class="main-container repair-form" id="battery-form">
    <h1 class="main-title">Gadget Clinic</h1>
    <h2 class="main-repair">Repair or Replace the Battery on your </h2> <br>
    <br>
    <h3><span class="chosen-device"><?= $devices['deviceName'] ?></span></h3>
    <img src="<?= $devices['image-url'] ?>" alt="<?=$devices['deviceName']?>" width="100px"></img>
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
      <form class="repair-form-input" action="post">
        <label for="Name">Name</label> <br>
        <input type="text" class="name" name="name">
        <label for="Email">Email</label> <br>
        <input type="text" class="email" name="email">
        <p>Repair Type:</p>
        <p>Battery Replacement</p>
        <p>Device</p>
        <p class="chosen-device form-chosen"><?= $devices['deviceName'] ?> </p>
        <label for="extra-info">Please provide us with any extra information about the device</label>
        <textarea name="extra-info" id="extra-info" cols="30" rows="10"></textarea>
        <div class="repair-form-button-holder">
          <input type="submit" name="submit" id="submit" class="submit-button button repair-form-button">
          <input type="reset" name="reset" id="reset" class="reset-button button repair-form-button">
        </div>
      </form>
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
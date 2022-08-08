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
// iphone 

get_header();
?>
<?php
require "sql_connect.php";
$devices = "";
try {
  $connection = new PDO($dsn, $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "connection succesful";
  $sql = "SELECT * FROM newdevices WHERE deviceType = 'appleIphone'";
  $devices = $connection->query($sql);
} catch (PDOException $error) {
  echo $error->getMessage();
}

?>

<body>
    <div class="choose-container">
        <!-- <h3 class="choose-h3">Device List</h3> -->
        <div class="heading-container">
            <h4 class="choose-h4">Choose Your iPhone Model</h4>
        </div>
        <div class="table-container">
            <table class="device-table">
                <thead class="column-heads">


                </thead>
                <tbody>
                    <?php

          foreach ($devices as $device) :
            $newUrl = "http://18.168.90.222/home/clinic/gadget-repair?id=$device[deviceId]";
            if (isset($device['image-url'])) {
              $imageUrl = $device['image-url'];
            } else {
              echo "Image does not exist";
            }

          ?>
                    <tr class="device-row">
                        <td class="device-row-data">
                            <a class="device-row-link" href="<?= $newUrl ?>">
                                <?php echo "$device[deviceName]" ?>
                            </a>

                        </td>
                        <td class="device-image">
                            <img src="<?= $device['image-url'] ?>" alt="<?= $device['deviceName'] ?>" srcset=""
                                width="100">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="side-container">
            <div class="content-example">
                <h3>Apple Screen Repairs</h3>
                <br />
                <p>We are a professional mobile device repair service that can fix your screen in a matter of minutes.
                    We specialise in both domestic and commercial
                    repairs for the latest range of Apple products. Our technicians are highly trained, experienced and
                    offer an excellent standard of customer service.
                    <br />
                </p>
                <img src="https://via.placeholder.com/200" alt="">
            </div>
            <div class="content-example">
                <h3>We repair all types of iPhone and iPad screens</h3>
                <br>
                <ul>
                    <li>Cracked screens</li>
                    <li>Fully smashed Screens</li>
                    <li>Water Damage</li>
                    <li>Battery Replacements</li>
                </ul>
                <img src="https://via.placeholder.com/200" alt="">
            </div>
            <div class="content-example">
                <h3>Broken Screen Repairs</h3>
                <br>
                <p>Your screen isn't the only component of your phone that can break. If you're experiencing a problem
                    with your
                    device's hardware, we can fix it for you. We repair broken iPhone screens, and we also work on other
                    smart
                    phones including Samsungs, HTCs and Sony Experias.
                    If your screen is cracked or smashed in any way, don't worry! We can repair it quickly so that it
                    looks brand
                    spanking new again. We'll also make sure all of the other components are working as they should be
                    before
                    handing over our expertly-rebuilt phone to you.
                </p>
                <img src="https://via.placeholder.com/200" alt="">
            </div>

            <div class="content-example">
                <h3>We provide a wide range of repairs on multiple apple devices.</h3>
                <br>
                <p>In addition to our Apple repair services, we also provide a wide range of other services and options
                    for
                    your iPad or iPhone. If you are looking for the highest level of service, look no further than
                    Gadget Solutions Upminster. Our goal is to provide you with the best possible service at
                    affordable prices.</p>
                <img src="https://via.placeholder.com/200" alt="">
            </div>
            <div class="content-example">
                <p>example content</p>
                <img src="https://via.placeholder.com/200" alt="">
            </div>
            <div class="content-example">
                <p>example content</p>
                <img src="https://via.placeholder.com/200" alt="">
            </div>
        </div>

    </div>
</body>
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



    </main><!-- #main -->
</section><!-- #primary -->


<?php

get_footer();
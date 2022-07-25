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
        $sql = "SELECT * FROM newdevices WHERE deviceType = 'ipad' ";
        $devices = $connection -> query ($sql);
        
      } catch (PDOException $error){
        echo $error -> getMessage();

      }	
      
		?>

<body>
  <div class="choose-container">
    <!-- <h3 class="choose-h3">Device List</h3> -->
    <div class="heading-container">
      <h4 class="choose-h4">Choose Your iPad Model</h4>
    </div>
    <div class="table-container">
      <table class="device-table">
        <thead class="column-heads">
          <tr>
            <th>
              <p>device column</p>
            </th>
            <th>
              <p>image column</p>
            </th>
          </tr>

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
            <td>
              <p>image here</p>
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
  <?php
    get_footer();
  
  ?>
</body>
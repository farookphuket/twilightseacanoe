<?php
require("../inc/db.php");

// the tour price
$tour_adult_price = 0;
$tour_child_price = 0;
$tour_discount_price = 0;

$tws_table = "tws_tour";
$tour_table = "tour";
$get_tour_list = "SELECT * FROM `$tws_table`;";
$query = mysqli_query($conn, $get_tour_list);
while ($row = $query->fetch_array()) :



?>

  <div class="col-lg-4 col-md-6">
    <div class="hotel">

      <h3><a href="/tour/detail.php?tour_id=<?php echo $row['id']; ?>">
          <?php echo $row['tour_title']; ?>
        </a></h3>
      <div class="hotel-img">
        <a href="/tour/detail.php?tour_id=<?php echo $row['id']; ?>">

          <img src="<?php echo $row['tour_cover_url']; ?>" alt="<?php echo $row['tour_title']; ?>" class="rounded img-fluid">
        </a>
      </div>

      <div class="stars">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
      </div>
      <div>

        <?php
        $tour_adult_price = $row['adult_price'];
        $tour_child_price = $row['adult_price'];
        $tour_discount_price = $row['discount_percent'];

        if ($tour_adult_price != 0 && $tour_child_price != 0) :

        ?>
          <ul class="list-group">
            <li class="list-group-item">
              <span style="font-size:15px;">Price</span>
              <span style="font-size:15px;">Adult</span>
              <span style="font-size:15px;">
                <?php echo $row['adult_price']; ?>
              </span>
              <span style="font-size:15px;">Child</span>
              <span style="font-size:15px;">
                <?php echo $row['child_price']; ?>
              </span>

              <span style="font-size:15px;">
                Thaibath
              </span>
            </li>
          </ul>
        <?php
        else :
        ?>


          <ul class="list-group">
            <li class="list-group-item">
              <span style="font-size:15px;">Please contact us</span>
            </li>
          </ul>
        <?php
        endif;
        ?>
      </div>

    </div>

  </div>
<?php
endwhile;
?>

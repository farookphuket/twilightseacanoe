<?php
require("../inc/db.php");

$tour_adult_price = 0;
$tour_child_price = 0;
$tour_discount_price = 0;

$tws_table = "tws_tour";
$tour_table = "tour";
$get_tour_list = "SELECT * FROM `$tws_table` WHERE `$tws_table`.id=$tour_id;";
$query = mysqli_query($conn, $get_tour_list);
while ($row = $query->fetch_array()) :
  //var_dump($row)
  $img_url = $row['tour_cover_url'];
?>
  <!-- ======= Hotels Section ======= -->
  <section id="hotels" class="resume" style="margin-top:1.5em;">
    <div class="container">

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-12" style="margin-bottom:1em;">
          <img src="<?php echo $img_url; ?>" class="rounded img-fluid" />
        </div>
        <div class="col-md-4">
          <div class="section-title text-center">
            <p style="font-size:18;text-decoration:underline;font-weight:bold;">
              <?php echo $row["tour_title"]; ?>
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <p>
            <?php echo $row["tour_description"]; ?>
          </p>
        </div>
        <div class="col-md-4">
          <p style="text-align:center;font-size:18px;color:#e32407;font-weight:bold;text-decoration:underline;">
            Price
          </p>
          <?php
          $tour_adult_price = $row['adult_price'];
          $tour_child_price = $row['adult_price'];
          $tour_discount_price = $row['discount_percent'];

          if ($tour_adult_price != 0 && $tour_child_price != 0) :

          ?>
            <ul class="list-group">
              <li class="list-group-item">

                <span style="font-size:16px;">
                  Adult Price
                </span>
                <span style="font-size:16px;color:#e32407;">
                  <?php echo $row['adult_price']; ?>
                </span>
                <span style="font-size:16px;">
                  &nbsp;Thai Bath
                </span>

              </li>
              <li class="list-group-item">
                <span style="font-size:16px;">
                  Child
                </span>
                <span style="font-size:16px;color:#e32407;">
                  <?php echo $row['child_price']; ?>
                </span>
                <span style="font-size:16px;">
                  &nbsp;Thai Bath
                </span>
              </li>
            </ul>

          <?php
          else :
          ?>
            <h3 class="resume-title1"> Contact Us</h3>
          <?php
          endif;
          ?>
        </div>
      </div>
    </div>
  </section><!-- End Hotels Section -->
  <section class="resume">

    <div class="section-title text-center">
      <h2>
        <?php echo $row['tour_title'];
        ?>
      </h2>
    </div>
  </section>
  <?php
  echo $row['tour_detail'];
  ?>
<?php
endwhile;
?>

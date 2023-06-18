<?php
ob_start();
session_start();

$page = "index"; ?>
<?php
include "../inc/db.php";
/*
 * get the meta keyword,title,
 * */
$tour_id = $_GET['tour_id'];
$meta_title = "";
$meta_key = '';
$meta_desc = "";
$tour = "tws_tour";
$seo = "tws_seo";
$pip = "tws_seo_tour";
$get_meta = "SELECT* FROM `$tour` RIGHT JOIN `$pip` ON `$tour`.id=`$pip`.tour_id LEFT JOIN `$seo` ON `$seo`.id=`$pip`.seo_id WHERE `$tour`.id=$tour_id;";
$get_query = mysqli_query($conn, $get_meta);



while ($x1 = $get_query->fetch_array()) :
  $meta_title = $x1['meta_title'];
  $meta_key = $x1['meta_keywords'];
  $meta_desc = $x1['meta_desc'];

endwhile;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <?php require '../master/int.php'; ?>
  <title><?php echo $meta_title; ?></title>
  <meta name="description" content="<?php echo $meta_desc; ?>" />
</head>

<body>
  <main style="min-height:100vh;">
    <!-- ======= Header ======= -->
    <?php require '../master/header.php'; ?>
    <?php
    $tour_id = 0;
    if (isset($_GET['tour_id']) && $_GET['tour_id'] != 0) :
      $tour_id = $_GET['tour_id'];
      require('./tour_detail_embeded.php');
    ?>
    <?php
    endif;
    ?>

    <?php
    require("../forms/booking_form1.php");
    ?>

    <section id="resume" class="resume">
      <div class="container">
        <div class="facts-img">
          <img src="../assets/img/facts-img.png" alt="" class="img-fluid">
        </div>
      </div>
    </section>

  </main><!-- End #main -->





  <?php
  require('../master/footer.php');
  require('../master/script_extra.php');
  ?>

  <script src="../assets/js/main.js"></script>

</body>

</html>

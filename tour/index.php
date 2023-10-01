<?php
ob_start();
session_start();

$page = "index"; ?>
<?php include "../inc/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SEO meta copy to the head of html index file START -->
  <title>Tour Twilight Sea Canoe Phuket </title>
  <meta name="keywords" content="select tour,twilightseacanoe,twilight phuket,better than the original">
  <meta name="description" content="select which tour program is fit your need">
  <!-- SEO meta copy to the head of html index file END -->
  <meta charset="utf-8">

  <?php require '../master/int.php'; ?>


</head>

<body style="height:100vh;">
  <main>
    <!-- ======= Header ======= -->
    <?php require '../master/header.php'; ?>




    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="resume" style="margin-top:2em;">
      <div class="container">
        <div class="section-title text-center">
          <h2>Our <span>Service</span></h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <?php
          require("./tour_list_embeded.php");
          ?>


        </div>
      </div>
    </section><!-- End Hotels Section -->


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

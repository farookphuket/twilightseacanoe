<?php
ob_start();
session_start();

$page = "index"; ?>
<?php include "inc/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <?php require 'master/int.php'; ?>


</head>

<body>
  <main>
    <!-- ======= Header ======= -->
    <?php require 'master/header.php'; ?>

    <!--
      <?php //require 'master/slide.php'; 
      ?>
-->



    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="resume" style="margin-top:2em;">
      <div class="container">
        <div class="section-title text-center">
          <h2>Program <span>Tour</span></h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/y8yPzqByTPc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>

          <!-- run the query to get the info from database START -->

          <div class="col-lg-12">
            <?php require("inc/tour_tinerary.php"); ?>
          </div>
          <!-- run the query to get the info from database END -->


        </div>
      </div>
    </section><!-- End Hotels Section -->

    <?php
    // the form embed
    require("forms/embeded_booking_form.php");
    if (isset($_POST["tour_id"])) :

    ?>

      <section style="margin-top:2em;margin-bottom:2em;" class="resume">
        <div class="container">
          <h2>the form submit</h2>
          <div class="facts-img">
            <p>the form is submiting...</p>
          </div>
          <script>
            const timeO = setTimeout(() => {
              location.href = "cart_x1.php"
            }, 13000)

            timeO()

            clearTimeout(timeO)
          </script>
        </div>
      </section>

    <?php
    endif;
    ?>

    <section id="resume" class="resume">
      <div class="container">
        <div class="facts-img">
          <img src="assets/img/facts-img.png" alt="" class="img-fluid">
        </div>
      </div>
    </section>

  </main><!-- End #main -->





  <?php
  require('master/footer.php');
  require('master/script_extra.php');
  ?>

  <script src="assets/js/main.js"></script>

</body>

</html>

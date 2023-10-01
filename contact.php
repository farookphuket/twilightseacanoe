<?php
ob_start();
session_start();

$page = "index"; ?>
<?php include_once "inc/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- SEO meta copy to the head of html index file START -->
  <title>contact us Twilight Seac canoe Phuket</title>
  <meta name="keywords" content="contact,twilightseacanoe,twilight phuket,better than the original">
  <meta name="description" content="feel free to ask for more information">
  <!-- SEO meta copy to the head of html index file END -->
  <?php

  require_once 'master/int.php';
  ?>


</head>

<body>

  <main>
    <!-- ======= Header ======= -->
    <?php require_once 'master/header.php'; ?>

    <!--
      <?php //require 'master/slide.php'; 
      ?>
-->

    <!-- End Header -->


    <div class="container-fluid" data-aos="fade-up" style="margin-top:6em;">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3950.40503758759!2d98.42896831477985!3d8.060101994196515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMDMnMzYuNCJOIDk4wrAyNSc1Mi4yIkU!5e0!3m2!1sen!2sth!4v1682497096622!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="margin-top:1em;">
    </section><!-- End About Section -->


    <?php //require 'master/gallery.php'; 
    ?>

    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row contact-info">
          <div class="section-title text-center">
            <h2>Contact <span>Us</span></h2>
          </div>

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>54/12 No.21-23 Moo3 Pa Khlok Thalang, Phuket 83110</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+660840533456">+66 (0) 84 053 3456</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <ol class="list-group">
                <li class="list-group-item">
                  <p><a href="mailto:twilightseacanoe@gmail.com">twilightseacanoe@gmail.com</a></p>
                </li>

                <li class="list-group-item">
                  <p><a href="mailto:info@twilightseacanoe.com">info@twilightseacanoe.com</a></p>
                </li>
                <li class="list-group-item">
                  <p><a href="mailto:phuketandamantwilight@gmail.com">phuketandamantwilight@gmail.com</a></p>
                </li>
              </ol>

            </div>
          </div>

        </div>

        <?php require_once 'master/contact_form.php'; ?>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->





  <?php
  require_once('master/footer.php');
  require_once('master/script_extra.php');
  ?>

  <script src="assets/js/main.js"></script>

</body>

</html>

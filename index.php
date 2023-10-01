<?php
ob_start();
session_start();

$page = "index";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">



  <?php
  require_once("./inc/default_meta_tag.php");
  require_once 'master/int.php'; ?>


</head>

<body>
  <main>
    <!-- ======= Header ======= -->
    <?php require_once 'master/header.php'; ?>
    <?php require_once 'master/slide.php'; ?>
    <!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
        </div>
        <div class="row gy-4">
          <!--
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/baa.png) ;" data-aos="fade-up" data-aos-delay="150">
          </div>
-->
          <div class="col-lg-6">
            <div class="video-container">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/tGH-hpo8PVc?si=Lq912QYyU_aqEb6-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <h2>About <span>Us</span></h2>
              <p class="fst-italic">Twilight Seacanoe is a travel agency. We have a team of experts with knowledge of nature, beaches, food, travel to help you enjoy your trip with us.</p>
              <a href="about.php" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              <p>
                <img src="assets/img/line.png" class="img-fluid" alt="">
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">
      <div class="container">
        <div class="section-title text-center">
          <h2>Program <span>Tour</span></h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">



          <?php
          /*
            * get the tour list to show
            * */
          require_once("./inc/db.php");
          $tour_table = "tws_tour";
          $get_tour = "SELECT* FROM `$tour_table`;";
          $sql_1 = mysqli_query($conn, $get_tour);

          while ($tour = $sql_1->fetch_array()) :
            $tour_id = $tour['id'];
          ?>
            <div class="col-lg-4 col-md-6">
              <div class="hotel">
                <div class="hotel-img">

                  <a href="<?php echo "./tour/detail.php?tour_id=$tour_id"; ?>">
                    <img src="<?php echo $tour['tour_cover_url']; ?>" alt="tour program <?php echo $tour_id; ?>" class="rounded img-fluid">
                  </a>
                </div>
                <h3>
                  <a href="<?php echo "./tour/detail.php?tour_id=$tour_id"; ?>">
                    <?php
                    echo $tour['tour_title'];
                    ?>
                  </a>
                </h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <p> </p>
              </div>
            </div>
          <?php
          endwhile;
          ?>


        </div>
      </div>
    </section><!-- End Hotels Section -->

    <?php require_once './master/gallery_embeded.php'; ?>

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




  <!-- Vendor JS Files -->

  <script src="assets/js/main-old.js"></script>

  <?php
  //require './master/footer.php';
  include_once(__DIR__ . "/master/footer.php");
  require_once('master/script_extra.php');
  ?>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/main-old.js"></script>
</body>

</html>

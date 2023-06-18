<?php $page = "index"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- SEO meta copy to the head of html index file START -->
  <title>About us twilight sea canoe dot com</title>
  <meta name="keywords" content="twilightseacanoe,twilight phuket,better than the original">
  <meta name="description" content="we do operate kayaking tour in Phuket Thailand">
  <!-- SEO meta copy to the head of html index file END -->
  <?php

  require 'master/int.php'; ?>

  <!-- =======================================================
  * Template Name: BizPage - v5.11.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body class="page-about">

  <!-- ======= Header ======= -->
  <?php require 'master/header.php'; ?>
  <!-- End Header -->




  <main id="main" style="height:100%;">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">

            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">

        </div>
      </nav>
    </div>
    <!-- ======= My Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title text-center">
          <h2>About <span>Us</span></h2>

          <p>

            Twilight Seacanoe is a tour operater. We have a team of experts with knowledge of nature, beaches, food, travel to help you enjoy your trip with us.
          </p>

          <p>
            the system
            <?php echo PHP_OS; ?>
          </p>
          <p>
            the browser
            <?php echo $_SERVER['HTTP_USER_AGENT'];
            echo "--------";
            $myb = $_SERVER['HTTP_USER_AGENT'];
            print_r($myb);
            echo "<br />";
            echo "the user browser is " . end(explode(" ", $myb));
            ?>
          </p>
        </div>
        <div style="margin-top:8em;">
          <?php
          //$ip = $_SERVER["REMOTE_ADDR"];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
          curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HEADER, FALSE);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $result = curl_exec($ch);
          curl_close($ch);
          $params = json_decode($result);
          echo "Continent Name: " . $params->geoplugin_continentName . "<br>";
          echo "Country Name: " . $params->geoplugin_countryName . "<br>";
          echo "Country Code: " . $params->geoplugin_countryCode . "<br>";
          echo "City Name: " . $params->geoplugin_city;
          echo "<br />your ip " . $ip;
          ?>
        </div>
        <div style="margin-top:4em;">
          <?php
          $query = @unserialize(file_get_contents('http://ip-api.com/php/'));
          if ($query && $query['status'] == 'success') {
            echo 'Hey user from ' . $query['country'] . ', ' . $query['city'] . '!';
          }
          foreach ($query as $data) {
            echo $data . "<br>";
          }
          var_dump($query);
          ?>
        </div>


      </div>
    </section>

    <section id="hotels" class="section-with-bg">
      <div class="container">



        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="hotel"> <img src="images/18823.jpg" alt="Panak Island" class="img-fluid">


            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel"> <img src="images/18821.jpg" alt="Khao Ping Kan" class="img-fluid">


            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel"> <img src="images/19007.jpg" alt="Canoeing" class="img-fluid">




            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <!-- ======= Portfolio Section
    <section id="services" class="services">
      <div class="container">

        <div class="section-title text-center">
          <h2>Program <span>Tour</span></h2>
          
        </div>

        

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="assets/img/t1.jpg" class="img-fluid" alt="">
                <a href="assets/img/t1.jpg" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-plus"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="bx bx-link"></i></a>
              </figure>
<div class="portfolio-info text-center">
                <h4><a href="#">Canoeing</a></h4>
                 
              </div>
               
            </div>
          </div>

          

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="assets/img/t2.jpg" class="img-fluid" alt="">
                <a href="assets/img/t2.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="bx bx-link"></i></a>
              </figure>
<div class="portfolio-info text-center">
                <h4><a href="#">Khao Ping Kan</a></h4>
                
              </div>
              
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="assets/img/t3.jpg" class="img-fluid" alt="">
                <a href="assets/img/t3.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" class="link-details" title="More Details"><i class="bx bx-link"></i></a>
              </figure>
<div class="portfolio-info text-center">
                <h4><a href="#">Panak Island</a></h4>
               
              </div>
              
            </div>
          </div>

          
 </div>

      </div>
    </section>  End Portfolio Section -->

    <!-- End Services Section -->

    <!-- ======= Team Section ======= 
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div><!-- End Team Member  

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div><!-- End Team Member  

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div><!-- End Team Member  

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div><!-- End Team Member  

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= 
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2>Our <span>Team</span></h2>
          
        </div> 

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/team.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/team.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <img src="assets/img/team.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <img src="assets/img/team.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- End Contact Section -->

  </main><!-- End #main -->





  <!-- Vendor JS Files -->
  <?php
  require 'master/footer.php';
  require('master/script_extra.php');
  ?>
  <script src="assets/js/main.js"></script>
</body>

</html>

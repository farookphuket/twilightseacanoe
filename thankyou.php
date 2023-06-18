<?php
session_start();
ob_start();


$client_email = "";
if (isset($_SESSION["client_email"])) :
  $client_email = $_SESSION["client_email"];
endif;

$page = "index";

require "inc/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <!-- SEO meta copy to the head of html index file START -->
  <title>Thank you for choosing us</title>
  <meta name="keywords" content="thank you,twilightseacanoe,twilight phuket,better than the original">
  <meta name="description" content="your booking has been issue please check your email">
  <!-- SEO meta copy to the head of html index file END -->
  <?php require 'master/int.php'; ?>


</head>

<body>
  <main style="height:100vh;">
    <!-- ======= Header ======= -->
    <?php require 'master/header.php'; ?>
    <!-- End Header -->




    <!-- ======= My Resume Section ======= -->
    <section id="cart" class="resume" style="margin-top:4em;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/19007.jpg" class="rounded img-fluid" />
          </div>
          <div class="col-md-6">
            <div>

              <h1 style="margin-top:1em;color:green;">thank you</h1>
              <p>
                thank you for choosing us ,
                your booking information has send to email
                <span style="font-weight:bold;color:blueviolet;font-size:14px;">
                  <?php echo $client_email; ?>
                </span>
                please check your email.
              </p>

            </div>
            <div class="text-end">
              <button class="btn btn-outline-info" onclick="goHome()">back to home page.</button>
              <script>
                function goHome() {
                  alert('will go to home page')
                  let tOut = setTimeout(() => {
                    window.location.href = "/"
                  }, 5000)
                  tOut()
                  clearTimeout(tOut)
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main><!-- End #main -->
  <?php
  require 'master/footer.php';
  require('master/script_extra.php');
  ?>

  <script src="assets/js/main.js"></script>

</body>

</html>

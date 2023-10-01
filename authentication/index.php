<?php

error_reporting(E_ALL & ~E_NOTICE);
require_once("../api/visitor.php");
$v = $visitor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>please login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="images/icons/favicon.ico">

  <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">

  <!--
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
-->

  <link rel="stylesheet" type="text/css" href="../assets/css/login_form_util.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/login_form_main.css">

  <meta name="robots" content="noindex, follow">
</head>

<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('../images/login_form_bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" action="./check_login.php" method="post">
          <span class="login100-form-title p-b-49">
            Login
          </span>
          <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" name="email" placeholder="Type your email">
            <span class="focus-input100" data-symbol=""></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password">
            <span class="focus-input100" data-symbol=""></span>
          </div>
          <div class="text-right p-t-8 p-b-31">
            <a href="#">
              Forgot password?
            </a>
          </div>
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" type="submit">
                Login
              </button>
            </div>
          </div>


          <div class="txt1 text-center p-t-54 p-b-20">
            <span>
              Or go to 
            </span>
          </div>
          <div class="flex-c-m">
            <a href="/index.php" >
                Home
            </a>
          </div>
          <!--
          <div class="flex-col-c p-t-155">
            <span class="txt1 p-b-17">
              Or Sign Up Using
            </span>
            <a href="#" class="txt2">
              Sign Up
            </a>
          </div>
            -->
        </form>
      </div>
    </div>
  </div>
  <div id="dropDownSelect1">


  </div>

  <script src="../assets/vendor/jquery/jquery.js"></script>
  <!--
  <script src="vendor/animsition/js/animsition.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>

  <script src="vendor/countdowntime/countdowntime.js"></script>
    -->

  <script src="../assets/js/login_form_main.js"></script>

  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon="{&quot;rayId&quot;:&quot;7da8118dac7d0c8f&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body>

</html>

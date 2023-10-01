<?php
session_start();
ob_start();

error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login status</title>
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
        <script>
          let redirectToUrl = "/authentication"
          let myTime = 0
        </script>
        <?php
        require_once("../api/user.php");

        $email = $_POST["email"];
        $pass = $_POST["password"];

        $x = $checkUser($email, $pass);
        //$y = $setUserDefaultURL(1);

        // the redirect url
        $redirectToUrl = $x["url"];

        if (isset($_SESSION["USER_HAS_LOGIN_KEY"])) :
          echo "welcome status for ".$_SESSION["NAME"]."<br />";
          //echo "<br />the token " . $_SESSION["USER_TOKEN"];

        ?>
          <p style="color:green;font-weight:bold;font-size:2em;">
            <?php echo $x["msg"]; ?>
          </p>
          <script>
            redirectToUrl = "<?php echo $redirectToUrl; ?>"
            myTime = setTimeout(() => {
              window.location.pathname = "<?php echo $redirectToUrl; ?>"
              //alert(`we will go to ${redirectToUrl}`)
            }, 4500)
            //console.log(`we will go ${redirectToUrl}`);
            myTime()
            clearTimeout(myTime);
          </script>
        <?php

        else :

        ?>
          <p style="color:red;font-weight:bold;font-size:2em;">
            <?php echo $x["msg"]; ?>
          </p>
          <script>
            redirectToUrl = "<?php echo $redirectToUrl; ?>"
            myTime = setTimeout(() => {
              window.location.pathname = "<?php echo $redirectToUrl; ?>"
            }, 4500)
            //console.log(`we will go ${redirectToUrl}`);
            myTime()
            clearTimeout(myTime);
          </script>
        <?php
        endif;
        // echo "<br /> the code is work now <br />";
        // echo "<hr />";
        // var_dump($x);

        ?>
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

    <!--
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
-->

</body>

</html>

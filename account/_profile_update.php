<?php
require_once("./auth_user.php");


$api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
$env_file = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
require_once($api);
require_once($env_file);

if (!isset($_POST["update_profile"]) || $_POST["update_profile"] != $_SESSION["USER_ID"]) :
?>
  <script>
    location.pathname = "/account/profile.php"
  </script>
<?php
  die();
endif;

  $profile_user = [
  "name" => $_POST["name"], 
  "first_name" => $_POST["first_name"], 
  "last_name" => $_POST["last_name"], 
  "avatar" => $_POST["avatar"], 
  "nick_name" => $_POST["nick_name"], 
  "email" => $_POST["email"], 
  "comment" => $_POST["comment"]
  ];

  $update = $accountUpdateProfile($profile_user);



?>
<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once("./components/head-tag.php");
  ?>
  <title><?php echo $_SESSION["NAME"]; ?>'s profile Account Manage</title>
  <meta name="keywords" content="account profile">
  <meta name="description" content="Account profile">

</head>

<body>

  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <div class="wrapper">

    <!-- Sidebar left START -->
    <?php include_once("./components/sidebar-left.php"); ?>
    <!-- Sidebar left END -->

    <div class="main-panel">

      <?php include_once("./components/sidebar-fix.php"); ?>
      <!-- 
    END of sidebar style
-->

      <!-- Topnav START -->
      <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <?php include_once("./components/topnav.php"); ?>
      </nav>

      <div class="content">
        <div class="container-fluid">
          <div class="row">

                <div class="col-lg-12"> 
                  <?php 
                  echo $update["msg"]; ?>
                </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <?php
          $footer = $_SERVER["DOCUMENT_ROOT"] . '/account/components/footer.php';
          require_once($footer);
          ?>
        </div>
      </footer>
    </div>
  </div>

  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>

</body>


<script src="<?php echo $jquery; ?>" type="text/javascript"></script>
<script src="<?php echo $popper; ?>" type="text/javascript"></script>
<script src="<?php echo $bootstrap; ?>" type="text/javascript"></script>
<script src="<?php echo $bt_switch; ?>"></script>

<script src="<?php echo $jq_sharrre; ?>"></script>

<script src="<?php echo $bt_notify; ?>"></script>

<script src="<?php echo $light_bt; ?>" type="text/javascript"></script>

<script src="<?php echo $demo_js; ?>"></script>


<script type="text/javascript">
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    //demo.initDashboardPageCharts();
  let msg = "<?php echo $update["msg"];?>"
    demo.showNotification('top', 'center', `${msg}`, 2)
    //demo.showNotification();

    // go back to profile page
    let Time = setTimeout(()=>{
    location.pathname = "/account/profile.php"
    },4000)
    Time()
    clearTimeout(Time)
  });
</script>

</html>

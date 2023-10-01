<?php
require_once("./auth_user.php");

$api = $_SERVER["DOCUMENT_ROOT"] . '/api/account.php';
require_once($api);
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
  <title>Staff add result</title>
  <meta name="keywords" content="Staff management  | create new staff operation!!">
  <meta name="description" content="Staff management | create new staff operation!!">

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
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">เพิ่มพนักงานใหม่</h4>
                  <p class="card-category">
                    &nbsp;
                  </p>
                </div>
                <div class="card-body ">

                  <div style="margin-top:1.5em;">
                    <?php
                    $name = $_POST["name"];
                    $fName = $_POST["fName"];
                    $lName = $_POST["lName"];
                    $nName = $_POST["nName"];
                    $email = $_POST["email"];
                    $pay_rate = $_POST["pay_rate"];
                    $pay_extra = $_POST["pay_extra"];
                    $tax_rate = $_POST["tax_rate"];

                    $position = $_POST["position"];
                    $joined_at = $_POST["joined_at"];
                    $birthday = $_POST["birthday"];
                    $sex = $_POST["sex"];

                    $comment = $_POST["comment"];

                    $staff = [
                      "name" => $name,
                      "email" => $email,
                      "nName" => $nName, // nick_name
                      "fName" => $fName,
                      "lName" => $lName,

                      "position" => $position, 
                      "sex" => $sex, 
                      "birthday" => $birthday, 
                      "joined_at" => $joined_at, 

                      "pay_rate" => $pay_rate,
                      "pay_extra" => $pay_extra,
                      "tax_rate" => $tax_rate,
                      "comment" => $comment
                    ];
                    $create = $createNewStaff($staff);

                    $msg = $create["msg"];
                    $error_msg = "";
                    $error = $create["error"];
                    if ($error == 1) :
                      $showMsg = "<span style='border:2px solid red;padding:1.05em;'>" . $msg . "</span>";
                      $error_msg = $msg;
                    else :

                      $showMsg = "<span style='border:2px solid green;padding:1em;'>" . $msg . "</span>";
                    endif;

                    echo "<hr />";
                    echo "<pre style='border:2px solid red;margin-top:2em;padding:1.3em;'>";
                    var_dump($create);
                    echo "</pre>";
                    echo "<hr style='margin-bottom:2em;'/>";
                    ?>
                  </div>
                </div>
                <div class="card-footer ">
                  <div>
                    <?php echo $showMsg; ?>
                  </div>
                </div>
              </div>
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

  <!--
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7e4f63f2da4fee31","version":"2023.4.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>
    -->
</body>

<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>

<script src="./assets/js/plugins/bootstrap-switch.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

<script src="./assets/js/plugins/chartist.min.js"></script>

<script src="./assets/js/plugins/jquery.sharrre.js"></script>

<script src="./assets/js/plugins/bootstrap-notify.js"></script>

<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>

<script src="./assets/js/demo.js"></script>
<?php
//$error_msg = "this is Error!!";
$_GET["error_msg"] = $error_msg;
if ($error == 1) :
?>

  <script type="text/javascript">
    $(document).ready(function() {
      demo.showNotification('top', 'center', "<?php echo $_GET["error_msg"]; ?>", "red")
      //demo.showNotification();

    });
  </script>
<?php endif; ?>

</html>

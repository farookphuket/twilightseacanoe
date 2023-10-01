<?php
require_once("./auth_user.php");

$api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
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
  $env_file = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
  require_once($env_file);
  ?>
  <title>Daily payment</title>
  <meta name="keywords" content="daily payment">
  <meta name="description" content="daily payment">

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
                  <h4 class="card-title">Daily report has been submited</h4>
                  <p class="card-category">
                    รายการได้ถูกบันทึกแล้ว!
                  </p>
                </div>
                <div class="card-body ">
                  <div>
                    <?php

                    /* ==================== SUBMIT FORM ===================
* when this form submit will handle 3 things 
* 1. create/insert new daily report to table "tws_workdays"
* 2. get the insert id from "tws_workdays" table to link to "tws_staff_workday" table 
* 3. create/insert new data to "tws_daily_pay" table
*
**/

                    /* ============= INSERT DATA to "tws_workdays" table
 * */


                    $field_1 = $_POST["pay_list"];
                    $field_2 = $_POST["price"];

                    $pay_data = [];

                    $wd_data = [
                      "tour_day" => $_POST["tour_day"]." ".date("H:i:s"),
                      "tour_name" => $_POST["tour_name"],
                      "boat_count" => $_POST["boat_count"],
                      "work_report" => $_POST["work_report"]
                    ];

                    $newWork = $saveWorkDay($wd_data);
                      echo"<br />";
var_dump($newWork);
                      echo"<hr />";
                      echo"the tour day is ".$wd_data["tour_day"]."<br />";
                      echo"insert id ".$newWork["insert_id"]."<br />";
                      echo $newWork["msg"]."<br />";
                      echo"<br />";

                    $staff_id_array = $_POST["staff_id"];
                    $x1 = [];
                    $staff["staff_id"] = 0;
                    foreach ($staff_id_array as $id) :
                      $staff["staff_id"] = $id;
                      $staff["tour_day"] = $wd_data["tour_day"];
                      $staff["work_id"] = $newWork["insert_id"];
                      $x1 =  $staffComeToWorkToday($staff);
                      echo "<br />";
                      var_dump($x1);
                      echo "<br />";
                      echo "<hr />";
                      echo "the checkbox $id <br />";
                    endforeach;


                    foreach ($field_1 as $key => $p) :
                      if ($p != "") :

                        $pay_data = [
                          "pay_list" => $p,
                          "price" => $field_2[$key]
                        ];
                        // $xp = $createNewPay($pay_data);
                        echo "the list " . $p . " price " . $field_2[$key] . "<br />";

                        echo "<hr />";
                      //var_dump($pay_data);
                      endif;
                    endforeach;

                    ?>

                  </div>
                </div>
                <div class="card-footer ">
                  <pre>
                    </pre>
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

</html>

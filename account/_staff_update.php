<?php require_once("./auth_user.php"); // this line must be on the top of file

$account_env = $_SERVER["DOCUMENT_ROOT"] . "/account/account_env.php";
require_once($account_env);


// components 
$components_dir = $_SERVER["DOCUMENT_ROOT"] . "/account/components";

$head_tag = $components_dir . "/head-tag.php";

$account_api = $_SERVER["DOCUMENT_ROOT"] . "/api/account.php";
require_once($account_api);




$name = $_POST["name"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$nName = $_POST["nName"];
$email = $_POST["email"];

$position = $_POST["position"];
$joined_at = $_POST["joined_at"];
$birthday = $_POST["birthday"];
$sex = $_POST["sex"];

$pay_rate = $_POST["pay_rate"];
$pay_extra = $_POST["pay_extra"];
$tax_rate = $_POST["tax_rate"];
$comment = $_POST["comment"];

$updateStaffData = [
  "name" => $name,
  "email" => $email,
  "nName" => $nName, // nick_name
  "fName" => $fName,
  "lName" => $lName,

  "sex" => $sex, 
  "position" => $position, 
  "birthday" => $birthday, 
  "joined_at" => $joined_at, 

  "pay_rate" => $pay_rate,
  "pay_extra" => $pay_extra,
  "tax_rate" => $tax_rate,
  "comment" => $comment
];
$update = $updateStaff($updateStaffData, $_POST["staff_id"]);


// get the staff
$staff = $getAllStaff();
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
  require_once($head_tag);
  ?>
  <title>Updating...</title>
  <meta name="keywords" content="Staff updating...">
  <meta name="description" content="Staff updating...">

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
                  <h4 class="card-title">บันทึกข้อมูลแล้ว</h4>
                  <p class="card-category">data has been successfully updated</p>
                </div>
                <div class="card-body ">
                  <div style="margin-top:1.5em;">

                  </div>
                </div>
                <div class="card-footer ">
                  <pre>
                      <?php
                      echo "the staff id is " . $_POST["staff_id"];
                      var_dump($update); ?>
                    </pre>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">รายชื่อพนักงาน</h4>
                  <p class="card-category">All staffs including Taxes</p>
                </div>
                <div class="card-body ">

                  <div class="table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                      <?php //var_dump($staff);
                      while ($row = $staff["staff"]->fetch_array()) :
                        $edit_id = $row["user_id"];
                      ?>
                        <tr>
                          <th>Name</th>

                          <td>
                            <?php echo $row["name"]; ?>
                          </td>
                          <th>ชื่อเล่น</th>
                          <td><?php echo $row["nick_name"]; ?></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><?php echo $row["email"]; ?></td>
                        </tr>
                        <tr>
                          <th>ค่าแรงรายวัน</th>
                          <td>
                            <?php echo $row["pay_rate"]; ?>
                          </td>
                          <th>ค่าแรงเพิ่มเติม</th>
                          <td><?php echo $row["pay_extra"]; ?></td>
                          <th>หักภาษี
                            <span style="color:blue;font-weight:bold;">คิดเป็น %</span>
                          </th>
                          <td><?php echo $row["tax_rate"]; ?>%</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <th>Manage</th>
                          <td>
                            <div class="text-right">
                              <button class="btn btn-primary" id="btnEdit" data-id="<?php echo $edit_id; ?>" type="button">แก้ไข</button>
                            </div>
                          </td>
                        </tr>
                      <?php
                      endwhile;
                      ?>
                    </table>
                  </div>


                </div>
                <div class="card-footer ">
                  &nbsp;
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

<script>
      // Facebook Pixel Code Don't Delete
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

      try{
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      }catch(err) {
        console.log('Facebook Track Error:', err);
      }
    </script>
-->

  <!--
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7e4f63f2da4fee31","version":"2023.4.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script>
    -->
</body>

<!--
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
-->

<script src="<?php echo $jquery; ?>" type="text/javascript"></script>
<script src="<?php echo $popper; ?>" type="text/javascript"></script>
<script src="<?php echo $bootstrap; ?>" type="text/javascript"></script>
<script src="<?php echo $bt_switch; ?>"></script>
<!--
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
-->
<!--
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
-->

<!--
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
-->

<!--
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
-->

<!--
<script src="./assets/js/plugins/chartist.min.js"></script>
  -->
<!--
<script src="./assets/js/plugins/jquery.sharrre.js"></script>
-->

<!--
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
-->

<!--
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
-->
<script src="<?php echo $jq_sharrre; ?>"></script>

<script src="<?php echo $bt_notify; ?>"></script>

<script src="<?php echo $light_bt; ?>" type="text/javascript"></script>

<script src="<?php echo $demo_js; ?>"></script>

<script>
  $(document).ready(function() {
    $("#btnEdit").click(function(id) {
      let edit_id = $(this).attr("data-id")
      let urlTo = "/account/edit-staff.php?edit=true&staff_id=" + encodeURIComponent(edit_id)
      // redirect to edit page
      window.location = urlTo

    })
  })
</script>
<?php if ($update["error"] != 1) :
?>
  <script>
    $(document).ready(function() {
      demo.showNotification("top", "right", "<?php echo $update["msg"]; ?>", 2)
      let mTime = setTimeout(() =>
        window.location.pathname = "/account/staff.php", 4500)
      mTime()
      clearTimeout(mTime)
    })
  </script>
<?php endif; ?>

</html>
